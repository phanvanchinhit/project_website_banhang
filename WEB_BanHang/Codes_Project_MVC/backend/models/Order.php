<?php
/**
 * Created by PhpStorm.
 * User: PHAN CHINH
 * Date: 31/10/2020
 * Time: 10:33
 */
require_once 'models/Model.php';
class Order extends Model
{
    public $str_search = '';

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND products.title LIKE '%{$_GET['title']}%'";
        }
        if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
            $this->str_search .= " AND products.category_id = {$_GET['category_id']}";
        }
    }
    public function getAllFilter($params = []){
        $query_order_id = '';
        // luôn phải kiểm tra tồn tại mảng theo key
        if (isset($params['query_order_id'])){
            $query_order_id = $params['query_order_id'];
        }
        $query_order_status = '';
        if(isset($params['query_order_status'])){
            $query_order_status = $params['query_order_status'];
        }
        $query_order_fromdate ='';
        if (isset($params['query_order_fromdate'])){
            $query_order_fromdate = $params['query_order_fromdate'];
        }
        $query_order_todate ='';
        if (isset($params['query_order_todate'])){
            $query_order_todate = $params['query_order_todate'];
        }
        $sql_select_all = "select * from orders
                     where $query_order_id $query_order_status $query_order_fromdate $query_order_todate";
        // + Tạo đối tượng truy vấn
        $obj_select_all = $this->connection->prepare($sql_select_all);
        // Thực thi đối tượng truy vấn
        $obj_select_all->execute();
        //Lấy ra mảng đối tượng product
        $order_filter = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $order_filter;
    }

    public function getAllPagination($arr_params)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT * FROM orders 
                        WHERE TRUE $this->str_search
                        ORDER BY orders.created_at DESC
                        LIMIT $start, $limit
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $orders = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $orders;
    }

    public function countOrderTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM orders WHERE TRUE $this->str_search");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("select orders.* from orders WHERE orders.id = $id");

        $obj_select->execute();
        $orderDetail = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $orderDetail;
    }
    public function getByIdInfoOrder($id){
        $obj_select = $this->connection
            ->prepare("select order_details.product_id as product_id, order_details.quantity as order_quantity,products.title as product_name,products.avatar as product_avatar, products.price AS product_price from order_details 
            inner join orders on orders.id = order_details.order_id
            inner join products on order_details.product_id = products.id WHERE orders.id = $id");

        $obj_select->execute();
        $orderDetailProducts = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $orderDetailProducts;
    }

    public function getAllOrder(){
        $obj_select = $this->connection->prepare("select orders.* from orders where true $this->str_search ORDER BY id DESC");
        $obj_select->execute();
        $orderDetails = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $orderDetails;
    }

    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE orders SET fullname=:fullname, mobile=:mobile, email=:email, address=:address,note=:note,
            price_total=:price_total, payment_status=:payment_status, updated_at=:updated_at WHERE id = $id
");
        $arr_update = [
            ':fullname' => $this->fullname,
            ':mobile' => $this->mobile,
            ':email' => $this->email,
            ':address' => $this->address,
            ':note' => $this->note,
            ':price_total' => $this->price_total,
            ':payment_status' => $this->payment_status,
            ':updated_at' => $this->updated_at,
        ];
        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM orders WHERE id = $id");
        return $obj_delete->execute();
    }

    public function deleteProductOrder($product_id){
        $obj_delete = $this->connection
            ->prepare("delete from order_details where product_id = $product_id");
        return $obj_delete->execute();
    }

    public function getOrderNew(){
        $obj_select = $this->connection->prepare("select * from orders where payment_status = 0 ORDER BY id DESC");
        $obj_select->execute();
        $orderNews = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $orderNews;
    }
    public function countOrderTotalNew()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM orders WHERE payment_status = 0");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }
    public function countOrderTotalOld()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM orders");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }
}