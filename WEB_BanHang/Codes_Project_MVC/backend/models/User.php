<?php
require_once 'models/Model.php';
class User extends Model {
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $phone;
    public $address;
    public $email;
    public $avatar;
    public $jobs;
    public $last_login;
    public $facebook;
    public $status;
    public $permission;
    public $created_at;
    public $updated_at;
    public $fullname;

    public $str_search;

    public function __construct() {
        parent::__construct();
        if (isset($_GET['username']) && !empty($_GET['username'])) {
            $username = addslashes($_GET['username']);
            $this->str_search .= " AND users.username LIKE '%$username%'";
        }
    }

    public function getAll() {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users ORDER BY updated_at DESC, created_at DESC");
        $obj_select->execute();
        $users = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }
    public function getDetailUCustomer(){
        $obj_select = $this->connection
            ->prepare("SELECT username,fullname,phone, address, email FROM customers ORDER BY updated_at DESC, created_at DESC");
        $obj_select->execute();
        $customerDetail = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $customerDetail;
    }

    public function getAllPagination($params = []) {
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users WHERE TRUE $this->str_search
              ORDER BY created_at DESC
              LIMIT $start, $limit");

        $obj_select->execute();
        $users = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public function setLastLogin($username)
    {
        $obj_set = $this->connection
            ->prepare("UPDATE users SET last_login=:last_login WHERE username = $username");
        $arr_set = [
            ':last_login' => $this->last_login,
        ];
        return $obj_set->execute($arr_set);
    }

    public function getTotal() {
        $obj_select = $this->connection
            ->prepare("SELECT COUNT(id) FROM users WHERE TRUE $this->str_search");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }
    public function countUserTotal() {
        $obj_select = $this->connection
            ->prepare("SELECT COUNT(id) FROM customers WHERE TRUE $this->str_search");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function getById($id) {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users WHERE id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function getIdByEmail($email) {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users WHERE email = '$email'");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function getByIdCustomer($id) {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM customers WHERE id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByUsername($username) {
        $obj_select = $this->connection
            ->prepare("SELECT COUNT(id) FROM users WHERE username='$username'");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function getUserByEmail($email) {
        $obj_select = $this->connection
            ->prepare("SELECT COUNT(id) FROM users WHERE email='$email'");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function insert() {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO users(username, password, first_name, last_name, phone, address, email, avatar, jobs, facebook, status,permission)
VALUES(:username, :password, :first_name, :last_name, :phone, :address, :email, :avatar, :jobs, :facebook, :status, :permission)");
        $arr_insert = [
            ':username' => $this->username,
            ':password' => $this->password,
            ':first_name' => $this->first_name,
            ':last_name' => $this->last_name,
            ':phone' => $this->phone,
            ':address' => $this->address,
            ':email' => $this->email,
            ':avatar' => $this->avatar,
            ':jobs' => $this->jobs,
            ':facebook' => $this->facebook,
            ':status' => $this->status,
            ':permission' =>$this->permission,
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function update($id) {
        $obj_update = $this->connection
            ->prepare("UPDATE users SET first_name=:first_name, last_name=:last_name, phone=:phone, 
            address=:address, email=:email, avatar=:avatar, jobs=:jobs, facebook=:facebook, status=:status,permission=:permission, updated_at=:updated_at WHERE id = $id");
        $arr_update = [
            ':first_name' => $this->first_name,
            ':last_name' => $this->last_name,
            ':phone' => $this->phone,
            ':address' => $this->address,
            ':email' => $this->email,
            ':avatar' => $this->avatar,
            ':jobs' => $this->jobs,
            ':facebook' => $this->facebook,
            ':status' => $this->status,
            ':permission' => $this->permission,
            ':updated_at' => $this->updated_at,
        ];
        $obj_update->execute($arr_update);

        return $obj_update->execute($arr_update);
    }
    public function updatePassword($id) {
        $obj_update = $this->connection
            ->prepare("UPDATE users SET password=:password, updated_at=:updated_at WHERE id = $id");
        $arr_update = [
            ':password' => $this->password,
            ':updated_at' => $this->updated_at,
        ];
        $obj_update->execute($arr_update);

        return $obj_update->execute($arr_update);
    }
    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM users WHERE id = $id");
        return $obj_delete->execute();
    }

    public function getUserByUsernameAndPassword($username, $password) {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users WHERE username=:username AND password=:password LIMIT 1");
        $arr_select = [
            ':username' => $username,
            ':password' => $password,
        ];
        $obj_select->execute($arr_select);

        $user = $obj_select->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function getUserByUserPassword($email) {
        $obj_select = $this->connection
            ->prepare("SELECT password FROM users WHERE email=:email LIMIT 1");
        $arr_select = [
            ':email' => $email,
        ];
        $obj_select->execute($arr_select);

        $userPassword = $obj_select->fetch(PDO::FETCH_ASSOC);

        return $userPassword;
    }

    public function getUserByUserUsername($email) {
        $obj_select = $this->connection
            ->prepare("SELECT username FROM users WHERE email=:email LIMIT 1");
        $arr_select = [
            ':email' => $email,
        ];
        $obj_select->execute($arr_select);

        $userUsername = $obj_select->fetch(PDO::FETCH_ASSOC);

        return $userUsername;
    }
    public function getIdByUsername($username) {
        $obj_select = $this->connection
            ->prepare("SELECT id FROM users WHERE username=:username LIMIT 1");
        $arr_select = [
            ':username' => $username,
        ];
        $obj_select->execute($arr_select);

        $id = $obj_select->fetch(PDO::FETCH_ASSOC);

        return $id;
    }

    public function insertRegister() {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO users(username, password, status)
VALUES(:username, :password, :status)");
        $arr_insert = [
            ':username' => $this->username,
            ':password' => $this->password,
            ':status' => $this->status,
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function getAllCustomer(){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM customers ORDER BY updated_at DESC, created_at DESC");
        $obj_select->execute();
        $customers = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $customers;
    }

}