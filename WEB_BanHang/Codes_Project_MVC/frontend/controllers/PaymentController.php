<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
require_once 'helpers/Helper.php';

class PaymentController extends Controller {
    public function index() {
        //Xử lý submit form
//        +debuye
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";
        //Kiểm tra nếu user submit form thì mới xử lý
        if (isset($_POST['submit'])){
            //gán biến
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            $method = $_POST['method'];
            // Validate form:
            if (empty($fullname) || empty($address) || empty($mobile) || empty($email)){
                $this->error = 'Các trường không được để trống';
            }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->error = 'Email chưa đúng định dạng';
            }
            // Xử lý lư thông tin đơn hàng chỉ khi không có lỗi xảy ra

            if (empty($this->error)){
                // Lưu lại thông tin đơn hàng vào bảng orders và order_datial theeo thư
                // tự orders-> orders-details
                // Lư vào bảng orders
                $order_model = new Order();
                //+ Gán các giá trị của form cho các thuộc tính vừa khởi tạo
                $order_model->fullname = $fullname;
                $order_model->address = $address;
                $order_model->mobile = $mobile;
                $order_model->note = $note;
                $order_model->email = $email;

                // + Tính tổng giá trị đơn hàng để lưu vào thuộc tính price_total, Lặp giỏ hàng , cộng dồn Thành tiền
                $price_total = 0;
                foreach ($_SESSION['cart'] AS $cart){
                    $total_item = $cart['price'] * $cart['quantity'];
                    $price_total += $total_item;
                }
                $order_model->price_total = $price_total;
                // Mặc định trạng tháy ban đầu của đơn hàng là chưa thanh toán
                $order_model->payment_status  = 0;
                //+ Gọi phuoqwng thức insert của model
                $order_id = $order_model->insert();
                //var_dump($order_id);
//                + Tiếp tục lưu vào bảng order_detail, xử ly lư ngay vong lặp cuae mảng giỏ hàng
                foreach ($_SESSION['cart'] AS $product_id => $cart){
                    //+ Khởi tạo đối tượng từ model OrderDetail
                    $order_detail_model = new OrderDetail();
                    $order_detail_model->order_id = $order_id;
                    $order_detail_model->product_id = $product_id;
                    $order_detail_model->quantity = $cart['quantity'];
                    //+ gọi phương thucws insert của model
                    $is_insert = $order_detail_model->insert();
                    var_dump($is_insert);

                }
                // + Gửi mail cho khách hàng về thông tin đơn hàng
                //+ Sử dung phương thức static sendMail của class Helper
                // + Khai báo các giá trị để chuẩn bị truyền vào phương thức sendMail
                $subject = "Công ty năng lượng Á Châu - Thông tin bảo mật";
                $username  = 'phanvanchinhit@gmail.com';
//                truy cập myacount.google.com
                $password = 'rnondjmjwtyrslxo';

                // Nôi dung mail, lấy thông tin mail mẫu về bán hàngtại đường dẫn views
                $info_customer = [
                    'fullname' => $fullname,
                    'mobile' => $mobile,
                    'address' => $address,
                    'email' => $email
                ];

                $body = $this->render('views/payments/mail_template_order.php',[
                    'info_customer' => $info_customer,
                    'order_id' => $order_id
                ]);
                Helper::sendMail($email,$subject,$body,$username,$password);
                // Dựa vào phương thức thanh toán mad user chọn : nếu là trực tuyến -> thanh
                // toán quan ngân lượng , nếu là COD thì chuyển hướng về trang cẩm ơn
                // Thanh toán trực tuysn

                // sau khi gửi mail sẽ xóa session giỏ hàng
                unset($_SESSION['cart']);
                if ($method == 0){
                    //tạo SESION chứa thông tin tương ứng mà nganluong yeu cầu
                    $_SESSION['nganluong_info'] = [
                        'price_total' => $price_total,
                        'fullname' => $fullname,
                        'email' => $email,
                        'mobile' => $mobile,
                    ];
                    header("Location: thanh-toan-online.html");
                    exit();
                }
                else{
                    header("Location: cam-on.html");
                    exit();
                }
            }
        }

        //Lấy nội dung view tương ứng
        $this->content = $this->render('views/payments/index.php');
        //gọi layout để hiện thị nội dung view
        require_once 'views/layouts/main.php';
    }

    public function thank(){
        $this->content = $this->render('views/payments/thank.php');
        require_once 'views/layouts/main.php';
    }

    public function online() {
        // gọi view ngân lượng ra để hiện thị, lưu ý view của trang sẽ không sử
        //lý trên trang của mình
        $view_online = $this->render('libraries/nganluong/index.php');
        echo $view_online;
        // + Xóa session sau khi sử dụng
        unset($_SESSION['nganluong_info']);

    }

}