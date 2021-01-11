<?php
require_once 'models/Model.php';
class Contact extends Model
{
    public $id;
    public $fullName;
    public $phone;
    public $email;
    public $address;
    public $description;
    public function insertContact(){
        $obj_insert = $this->connection->prepare("insert into contacts(`fullName`, `phone`, `email`, `address`, `description`)
           values (:fullName , :phone , :email, :address, :description)");

        $arr_insert = [
          'fullName' => $this->fullName,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'description' => $this->description
        ];
        return $obj_insert->execute($arr_insert);
    }
}