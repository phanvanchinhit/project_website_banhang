<?php
require_once 'models/Model.php';
class Order extends Model {
    // khai báo các thuoc tính cho model chính ladf các trương tương ứng trong bangrt orders
    public $id;
    public $fullname;
    public $mobile;
    public $address;
    public $email;
    public $note;
    public $price_total;
    public $payment_status;

    public function insert() {
        // Lưu ý phương thuiwcs này sẽ trả về id của chính order vừa insert, thay vì trả về true/false
        //như thông thường vì liên quan đến việc lưu vào bảng order_detail nữa
        // + Tạo câu truy vấn
        $sql_insert = "insert into orders(`fullname`,`address`,`mobile`,`email`,`note`,`price_total`,`payment_status`) values (:fullname, :address,:mobile,:email,:note,:price_total,:payment_status)" ;
        // + Tạo đối tượng truy vấn;
        $obj_insert = $this->connection->prepare($sql_insert);
        // + Tạo mảng để chứa giá trị thật cho tham số câu truy vấn
        $arr_insert = [
            ':fullname' => $this->fullname,
            ':address' => $this->address,
            ':mobile' => $this->mobile,
            ':email' => $this->email,
            ':note' => $this->note,
            ':price_total' => $this->price_total,
            ':payment_status' => $this->payment_status
        ];
//        + Thực thi đối tượng truy vấn
        // gán kết quả trả về như thông thường
        $obj_insert->execute($arr_insert);
        //Laays id vừa insert: luôn làm sau khi execute;
        $order_id = $this->connection->lastInsertId();
        return $order_id;

    }

}