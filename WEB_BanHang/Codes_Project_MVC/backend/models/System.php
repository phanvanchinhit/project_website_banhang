<?php
require_once 'models/Model.php';
class System extends Model
{
    public $id;
    public $slidebar;
    public $created_at;
    public $updated_at;
    public $phone;
    public $zalo;
    public $email;
    public $map;
    public $company;
    public $address;
    public $logo;
    public $favicon;


    public function getAllSlide(){
        $obj_select = $this->connection->prepare("select * from system_images ORDER BY updated_at DESC, created_at DESC");
        $obj_select->execute();
        $slideBar = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $slideBar;
    }

    public function insert() {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO system_images(`slidebar`)VALUES(:slidebar)");
        $arr_insert = [
            ':slidebar' =>$this->slidebar,
        ];
        return $obj_insert->execute($arr_insert);
    }
    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM system_images WHERE id = $id");
        return $obj_delete->execute();
    }
    public function deleteContact($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM system_contacts WHERE id = $id");
        return $obj_delete->execute();
    }
    public function getById($id) {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM system_images WHERE id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function getByIdContact($id) {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM system_contacts WHERE id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id) {
        $obj_update = $this->connection
            ->prepare("UPDATE system_images SET slidebar=:slidebar, updated_at=:updated_at WHERE id = $id");
        $arr_update = [
            ':slidebar' => $this->slidebar,
            ':updated_at' => $this->updated_at,
        ];
        $obj_update->execute($arr_update);

        return $obj_update->execute($arr_update);
    }

    public function getAllContact(){
        $obj_select = $this->connection->prepare("select * from system_contacts ORDER BY updated_at DESC, created_at DESC");
        $obj_select->execute();
        $contacts = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $contacts;
    }

    public function insertContact() {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO system_contacts (phone, zalo, email, map,logo,favicon, company, address)VALUES(:phone, :zalo, :email, :map,:logo,:favicon, :company, :address)");
        $arr_insert = [
            ':phone' =>$this->phone,
            ':zalo' =>$this->zalo,
            ':email' =>$this->email,
            ':map' =>$this->map,
            ':logo' =>$this->logo,
            ':favicon' => $this->favicon,
            ':company' =>$this->company,
            ':address' =>$this->address,
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function updateContact($id) {
        $obj_update = $this->connection
            ->prepare("UPDATE system_contacts SET phone=:phone,zalo=:zalo,email=:email,map=:map,logo=:logo, favicon=:favicon,company=:company,address=:address,updated_at=:updated_at WHERE id = $id");
        $arr_update = [
            ':phone' => $this->phone,
            ':zalo' => $this->zalo,
            ':email' => $this->email,
            ':map' => $this->map,
            ':logo' =>$this->logo,
            ':favicon' => $this->favicon,
            ':company' => $this->company,
            ':address' => $this->address,
            ':updated_at' => $this->updated_at,
        ];
        $obj_update->execute($arr_update);

        return $obj_update->execute($arr_update);
    }
}