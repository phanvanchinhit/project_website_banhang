<?php
require_once 'models/User.php';
require_once 'helpers/Helper.php';

class LoginController
{
    //chứa nội dung view
    public $content;
    //chứa nội dung lỗi validate
    public $error;

    /**
     * @param $file string Đường dẫn tới file
     * @param array $variables array Danh sách các biến truyền vào file
     * @return false|string
     */
    public function render($file, $variables = [])
    {
        //Nhập các giá trị của mảng vào các biến có tên tương ứng chính là key của phần tử đó.
        //khi muốn sử dụng biến từ bên ngoài vào trong hàm
        extract($variables);
        //bắt đầu nhớ mọi nội dung kể từ khi khai báo, kiểu như lưu vào bộ nhớ tạm
        ob_start();
        //thông thường nếu ko có ob_start thì sẽ hiển thị 1 dòng echo lên màn hình
        //tuy nhiên do dùng ob_Start nên nội dung của nó đã đc lưu lại, chứ ko hiển thị ra màn hình nữa
        require_once $file;
        //lấy dữ liệu từ bộ nhớ tạm đã lưu khi gọi hàm ob_Start để xử lý, lấy xong rồi xóa luôn dữ liệu đó
        $render_view = ob_get_clean();

        return $render_view;
    }

    public function login()
    {
        $cookie_name = 'userCookie';
        $cookie_time = (3600 * 24 * 30);
        //nếu user đã đăngn hập r thì ko cho truy cập lại trang login, mà chuenr hướng tới backend
        if (isset($_SESSION['user'])) {
            header('Location: index.php?controller=home&action=index');
            exit();
        }
        if (isset($_POST['submit'])) {
//            die;
            $username = $_POST['username'];
            //do password đang lưu trong CSDL sử dụng cơ chế mã hóa md5 nên cần phải thêm
//            hàm md5 cho password
            $password = md5($_POST['password']);
            //validate
            if (empty($username) || empty($password)) {
                $this->error = 'Username hoặc password không được để trống';
            }
            $user_model = new User();
            if (empty($this->error)) {
                $user = $user_model->getUserByUsernameAndPassword($username, $password);
                if (empty($user)) {
                    $this->error = 'Đăng nhập không thành công !';
                } else {
                    $_SESSION['success'] = 'Đăng nhập thành công';
                    //tạo session user để xác định user nào đang login
                    $_SESSION['user'] = $user;
                    header("Location: index.php?controller=home");
                    exit();
                }
            }
        }
        $this->content = $this->render('views/users/login.php');

        require_once 'views/layouts/main_login.php';
    }

    /**
     * Đăng ký tài khoản mới, mặc định tất cả các user đều có quyền admin
     */

    public function confirm()
    {
        //nếu user đã đăngn hập r thì ko cho truy cập lại trang login, mà chuenr hướng tới backend
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header("Location: index.php?controller=login&action=login");
            exit();
        }
        $user_model = new User();

        $id = $_GET['id'];
        if (isset($_POST['submit'])) {

            $email  = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $userEmail = $user_model->getUserByEmail($email);
            if (empty($password)) {
                $this->error = 'Password không được để trống';
            } else if ($confirmPassword != $password) {
                $this->error = 'Password không trùng khớp';
            }else if (empty($userEmail)) {
                $this->error = 'Email này không tồn tại trong CSDL';
            }

            if (empty($this->error)) {
                $user_model->password = md5($password);
                $is_update = $user_model->updatePassword($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Thay đổi password thành công';
                } else{
                    $_SESSION['error'] = 'Thay đổi password thất bại';
                }
                header('Location: index.php?controller=login&action=login');
                exit();
            }
        }

        $this->content = $this->render('views/users/confirm.php');

        require_once 'views/layouts/main_login.php';
    }

    public function forgot()
    {

        if (isset($_POST['confirm'])) {
            $user_model = new User();
            $email = $_POST['email'];
            $maPass = $_POST['maPass'];
            $userEmail = $user_model->getUserByEmail($email);
            //check validate
            if (empty($email)) {
                $this->error = 'Không được để trống Email !!!';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email chưa đúng định dạng';
            } else if (empty($userEmail)) {
                $this->error = 'Email này không tồn tại trong CSDL';
            }
            //xử lý lưu dữ liệu khi không có lỗi
            if (empty($this->error)) {

                $userPassword = $user_model->getUserByUserPassword($email);
                foreach ($userPassword as $valuee) {
                    $strPass = substr($valuee, 1, 8);
                }
                $text = '@123/+';
                $strPass .= $text;

                $subject = "Công ty năng lượng Á Châu - Thông tin bảo mật";
                $username = 'phanvanchinhit@gmail.com';
//                truy cập myacount.google.com
                $password = 'rnondjmjwtyrslxo';

                // Nôi dung mail, lấy thông tin mail mẫu về bán hàngtại đường dẫn views
                $info_customer = [
                    'email' => $email
                ];

                $body = $this->render('views/users/mail_confirm_password.php', [
                    'info_customer' => $info_customer,
                    'strPass' => $strPass,
                ]);
                Helper::sendMail($email, $subject, $body, $username, $password);
                // Dựa vào phương thức thanh toán mad user chọn : nếu là trực tuyến -> thanh
                // toán quan ngân lượng , nếu là COD thì chuyển hướng về trang cẩm ơn
                // Thanh toán trực tuysn


            }

        }
        if (isset($_POST['submit'])) {
            $user_model = new User();
            $email = $_POST['email'];
            $maPass = $_POST['maPass'];
            if (empty($this->error)) {
                $userPassword = $user_model->getUserByUserPassword($email);
                $emailById = $user_model->getIdByEmail($email);
                $id = $emailById['id'];
                var_dump($id);
                foreach ($userPassword as $valuee) {
                    $strPass = substr($valuee, 1, 8);
                }
                $text = '@123/+';
                $strPass .= $text;
                //var_dump($strPass);
            }
            if ($maPass == $strPass) {
                $_SESSION['success'] = 'Xác nhận tài khoản thành công';
                header("Location: index.php?controller=login&action=confirm&email=$email&id=$id");
                exit();
            } else {
                $_SESSION['error'] = 'Mã xác nhận không đúng';
            }
        }

        $this->content = $this->render('views/users/forgot.php');
        require_once 'views/layouts/main_login.php';
    }
}