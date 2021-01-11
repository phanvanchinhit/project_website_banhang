<?php
/**
 * Created by PhpStorm.
 * User: PHAN CHINH
 * Date: 04/11/2020
 * Time: 15:53
 */
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Product.php';
require_once 'models/Order.php';
require_once 'models/User.php';
require_once 'models/Pagination.php';

class OrderController extends  Controller
{
    public function index(){
        $params = [];
        if (isset($_POST['search'])){
            $query_order_id = '';
            $query_order_status = '';
            $query_order_fromdate='';
            $query_order_todate='';
            if (isset($_POST['fullname'])) {
                $order_id = $_POST['fullname'];
                $order_id_str = $order_id;
                $query_order_id = " (orders.fullname LIKE '%$order_id_str%')";
            }
            // XỬ lý tạo câu truy vấn cho category_id, nếu user chọn thì mới xử lý
            if (isset($_POST['payment_status'])){
                $payment_status = $_POST['payment_status'];
                if ($payment_status == 5){
                    $query_order_status ='';
                }else{
                    $query_order_status = " AND (orders.payment_status = $payment_status)";
                }

            }
            if (isset($_POST['fromDate'])){
                $order_fromDate = $_POST['fromDate'];
                if ($order_fromDate != ''){
                    $query_order_fromdate = "AND (orders.created_at >= '$order_fromDate')";
                }else{
                    $query_order_fromdate ='';
                }

            }
            if (isset($_POST['toDate'])){
                $order_toDate = $_POST['toDate'];
                if ($order_toDate != ''){
                    $query_order_todate = "AND (orders.created_at <= '$order_toDate')";
                }else{
                    $query_order_todate ='';
                }

            }
            $params['query_order_id'] = $query_order_id;
            $params['query_order_status'] = $query_order_status;
            $params['query_order_fromdate'] = $query_order_fromdate;
            $params['query_order_todate'] = $query_order_todate;
        }
        $order_model = new Order();
        $count_order_total = $order_model->countOrderTotal();
        //        xử lý phân trang
        $query_additional = '';
        if (isset($_GET['order_id'])) {
            $query_additional .= '&order_id=' . $_GET['order_id'];
        }
        if (isset($_GET['payment_status'])) {
            $query_additional .= '&payment_status=' . $_GET['payment_status'];
        }
        $arr_params = [
            'total' => $count_order_total,
            'limit' => 10,
            'query_string' => 'page',
            'controller' => 'order',
            'action' => 'index',
            'full_mode' => false,
            'query_additional' => $query_additional,
            'page' => isset($_GET['page']) ? $_GET['page'] : 1
        ];
        if (isset($_GET['page'])&& is_numeric($_GET['page'])){
            $page = $_GET['page'];
            $start = ($page -1) * $arr_params['limit'];
            $params['start'] = $start;
        }
//        xử lý phân trang
        $orders = $order_model->getAllPagination($arr_params);
        $pagination = new Pagination($arr_params);
        $pages = $pagination->getPagination();
        $order_filters = $order_model->getAllFilter($params);
        //$orders = $order_model->getAllOrder();


        $this->content = $this->render('views/orders/allOrders/index.php',[
            'orders' => $orders,
            'order_filters' => $order_filters,
            'pages' =>$pages
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=order');
            exit();
        }

        $id = $_GET['id'];
        $order_model = new Order();
        $orderDetail = $order_model->getById($id);
        $orderDetailProducts = $order_model->getByIdInfoOrder($id);
        $this->content = $this->render('views/orders/allOrders/detail.php', [
            'orderDetail' => $orderDetail,
            'orderDetailProducts' => $orderDetailProducts
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=order');
            exit();
        }

        $id = $_GET['id'];
        $order_model = new Order();
        $is_delete = $order_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=order');
        exit();
    }
    public function deleteProductOrder(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=order');
            exit();
        }

        $product_id = $_GET['id'];
        $order_model = new Order();
        $is_delete = $order_model->deleteProductOrder($product_id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa sản phẩm thành công';
        } else {
            $_SESSION['error'] = 'Xóa sản phẩm thất bại';
        }
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit();
        }
        /*header('Location: index.php?controller=order&action=update&id');
        exit();*/
    }
    public function update()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=order');
            exit();
        }

        $id = $_GET['id'];
        $order_model = new Order();
        $orderDetail = $order_model->getById($id);
        $orderDetailProducts = $order_model->getByIdInfoOrder($id);
        //xử lý submit form
        if (isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $phone = $_POST['mobile'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $note = $_POST['note'];
            $price_total = $_POST['price_total'];
            $payment_status = $_POST['payment_status'];
            //xử lý validate
            if (empty($fullname)) {
                $this->error = 'Không được để trống title';
            }
            //nếu ko có lỗi thì tiến hành save dữ liệu
            if (empty($this->error)) {
                //save dữ liệu vào bảng products
                $order_model->fullname = $fullname;
                $order_model->mobile = $phone;
                $order_model->email = $email;
                $order_model->address = $address;
                $order_model->note = $note;
                $order_model->price_total = $price_total;
                $order_model->payment_status = $payment_status;
                $order_model->updated_at = date('Y-m-d H:i:s');

                $is_update = $order_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=order');
                exit();
            }
        }

        //lấy danh sách category đang có trên hệ thống để phục vụ cho search

        $this->content = $this->render('views/orders/allOrders/update.php', [
            'orderDetail' => $orderDetail,
            'orderDetailProducts' =>$orderDetailProducts
        ]);
        require_once 'views/layouts/main.php';
    }

    public function indexOrderNew(){

        $order_model = new Order();
        $orders = $order_model->getOrderNew();

        $this->content = $this->render('views/orders/newOrders/index.php',[
            'orders' => $orders,
        ]);
        require_once 'views/layouts/main.php';
    }

}