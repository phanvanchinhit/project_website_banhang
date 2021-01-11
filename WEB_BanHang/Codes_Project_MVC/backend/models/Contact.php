<?php
require_once 'models/Model.php';

class Contact extends Model
{
    public $id;
    public $fullName;
    public $phone;
    public $address;
    public $email;
    public $description;
    public $created_at;
    public $updated_at;
    public $contactStatus;


    public function getAllContact(){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM contacts ORDER BY updated_at DESC, created_at DESC");
        $obj_select->execute();
        $contacts = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $contacts;
    }

    public function getByIdContact($id) {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM contacts WHERE id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id) {
        $obj_update = $this->connection
            ->prepare("UPDATE contacts SET fullName=:fullName, phone=:phone, 
            address=:address, email=:email, description=:description, contactStatus=:contactStatus,updated_at=:updated_at WHERE id = $id");
        $arr_update = [
            ':fullName' => $this->fullName,
            ':phone' => $this->phone,
            ':address' => $this->address,
            ':email' => $this->email,
            ':description' => $this->description,
            ':contactStatus' =>$this->contactStatus,
            ':updated_at' => $this->updated_at,
        ];
        $obj_update->execute($arr_update);

        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM contacts WHERE id = $id");
        return $obj_delete->execute();
    }

    public function countContactTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM contacts where contactStatus = 0");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }
}