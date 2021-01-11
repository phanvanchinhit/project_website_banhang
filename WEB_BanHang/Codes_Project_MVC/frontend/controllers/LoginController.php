<?php
require_once 'models/Customer.php';
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
    public function render($file, $variables = []) {
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

    public function login() {
        //nếu user đã đăngn hập r thì ko cho truy cập lại trang login, mà chuenr hướng tới backend
        if (isset($_SESSION['user'])) {
            header('Location: index.php');
            exit();
        }
        if (isset($_POST['submit'])) {
//            die;
            $username = $_POST['username'];
            //do password đang lưu trong CSDL sử dụng cơ chế mã hóa md5 nên cần phải thêm
//            hàm md5 cho password
            $password = md5($_POST['password']);
            //validate
            if (empty($username)) {
                $this->error = 'Username không được để trống';
            }
            elseif (empty($password)){
                $this->error =' Password không được để trống';
            }
            $user_model = new Customer();
            if (empty($this->error)) {
                $user = $user_model->getUserByUsernameAndPassword($username, $password);
                if (empty($user)) {
                    $this->error = 'Sai username hoặc password';
                } else {
                    $_SESSION['success'] = 'Đăng nhập thành công';
                    //tạo session user để xác định user nào đang login
                    $_SESSION['user'] = $user;
                    header("Location: index.php");
                    exit();
                }
            }
        }
        $this->content = $this->render('views/customers/login.php');

        require_once 'views/layouts/main.php';
    }
    public function logout() {

        unset($_SESSION['user']['username']);
        $_SESSION['success'] = 'Logout thành công';
        header('Location: index.php');
        exit();
    }
    /**
     * Đăng ký tài khoản mới, mặc định tất cả các user đều có quyền admin
     */
    public function register() {

        if (isset($_POST['submit'])) {
            $customer_model = new Customer();
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $customer = $customer_model->getCustomerByUsername($username);
            //check validate
            if (empty($fullname)) {
                $this->error = 'Không được để trống các trường Fullname';
            }elseif (empty($username)){
                $this->error = 'Không được để trống trường Username';
            }elseif (empty($password)){
                $this->error = 'Không được để trống trường Password';
            }elseif (empty($password_confirm)){
                $this->error = 'Không được để trống trường Confirm Password';
            } else if ($password != $password_confirm) {
                $this->error = 'Password nhập lại chưa đúng';
            } else if (!empty($customer)) {
                $this->error = 'Username này đã tồn tại';
            }
            //xử lý lưu dữ liệu khi không có lỗi
            if (empty($this->error)) {

                $customer_model->username = $username;
                //chú ý password khi lưu vào bảng users sẽ được mã hóa md5 trước khi lưu
                //do đang sử dụng cơ chế mã hóa này cho quy trình login
                $customer_model->password = md5($password);
                $customer_model->fullname = $fullname;
                $customer_model->phone = $phone;
                $customer_model->email = $email;
                $customer_model->address = $address;
                $is_insert = $customer_model->insertRegister();
                if ($is_insert) {
                    $_SESSION['success'] = 'Đăng ký thành công';
                } else {
                    $_SESSION['error'] = 'Đăng ký thất bại';
                }
                header('Location: index.php?controller=login&action=login');
                exit();
            }
        }

        $this->content = $this->render('views/customers/register.php');
        require_once 'views/layouts/main.php';
    }

    public function detail() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID ko hợp lệ';
            $url_redirect = $_SERVER['SCRIPT_NAME'] . '/';
            header("Location: $url_redirect");
            exit();
        }

        $id = $_GET['id'];
        $customer_model = new Customer();
        $customer = $customer_model->getById($id);

        $this->content = $this->render('views/customers/detail.php', [
            'user' => $customer
        ]);
        require_once 'views/layouts/main.php';
    }
}