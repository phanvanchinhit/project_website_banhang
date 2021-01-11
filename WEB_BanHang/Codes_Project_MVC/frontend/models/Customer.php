<?php
require_once 'models/Model.php';
class Customer extends Model {
    public $id;
    public $username;
    public $password;
    public $fullname;
    public $phone;
    public $address;
    public $email;
    public $created_at;
    public $updated_at;

    public $str_search;

    public function __construct() {
        parent::__construct();
        if (isset($_GET['username']) && !empty($_GET['username'])) {
            $username = addslashes($_GET['username']);
            $this->str_search .= " AND users.username LIKE '%$username%'";
        }
    }



    public function getTotal() {
        $obj_select = $this->connection
            ->prepare("SELECT COUNT(id) FROM customers WHERE TRUE $this->str_search");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function getById($id) {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM customers WHERE id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function getCustomerByUsername($username) {
        $obj_select = $this->connection
            ->prepare("SELECT COUNT(id) FROM customers WHERE username='$username'");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function insert() {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO customers(username, password, fullname , phone, address, email)
VALUES(:username, :password, :fullname, :phone, :address, :email)");
        $arr_insert = [
            ':username' => $this->username,
            ':password' => $this->password,
            ':fullname' => $this->fullname,
            ':phone' => $this->phone,
            ':address' => $this->address,
            ':email' => $this->email,
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function update($id) {
        $obj_update = $this->connection
            ->prepare("UPDATE customers SET username=:username,password=:password, fullname=:fullname, phone=:phone, 
            address=:address, email=:email , updated_at=:updated_at WHERE id = $id");
        $arr_update = [
            ':username' => $this->username,
            ':password' => $this->password,
            ':fullname' => $this->fullname,
            ':phone' => $this->phone,
            ':address' => $this->address,
            ':email' => $this->email,
            ':updated_at' => $this->updated_at,
        ];
        $obj_update->execute($arr_update);

        return $obj_update->execute($arr_update);
    }
    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM customers WHERE id = $id");
        return $obj_delete->execute();
    }

    public function detail($id){
        $sql_select_all = "SELECT * FROM customers WHERE id = $id";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $detail_customer = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $detail_customer;
    }

    public function getUserByUsernameAndPassword($username, $password) {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM customers WHERE username=:username AND password=:password LIMIT 1");
        $arr_select = [
            ':username' => $username,
            ':password' => $password,
        ];
        $obj_select->execute($arr_select);

        $customers = $obj_select->fetch(PDO::FETCH_ASSOC);

        return $customers;
    }

    public function insertRegister() {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO customers(username, password , fullname , phone , address, email)
VALUES(:username, :password ,:fullname, :phone, :address, :email)");
        $arr_insert = [
            ':username' => $this->username,
            ':password' => $this->password,
            ':fullname' => $this->fullname,
            ':phone' => $this->phone,
            ':address' => $this->address,
            ':email' => $this->email
        ];
        return $obj_insert->execute($arr_insert);
    }

}