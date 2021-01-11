<?php
require_once 'models/Service.php';

class Service extends Model
{
    public function getAllService(){
        $obj_select = $this->connection->prepare("select * from customer_service ORDER BY updated_at DESC, created_at DESC");
        $obj_select->execute();
        $services = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $services;
    }
    public function insert() {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO customer_service (category,phone, zalo, email)VALUES(:category,:phone, :zalo, :email)");
        $arr_insert = [
            ':category' => $this->category,
            ':phone' =>$this->phone,
            ':zalo' =>$this->zalo,
            ':email' =>$this->email,
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function getServiceById($id) {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM customer_service WHERE id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id) {
        $obj_update = $this->connection
            ->prepare("UPDATE customer_service SET category=:category,phone=:phone,zalo=:zalo,email=:email,updated_at=:updated_at WHERE id = $id");
        $arr_update = [
            ':category' =>$this->category,
            ':phone' => $this->phone,
            ':zalo' => $this->zalo,
            ':email' => $this->email,
            ':updated_at' => $this->updated_at,
        ];
        $obj_update->execute($arr_update);

        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM customer_service WHERE id = $id");
        return $obj_delete->execute();
    }

}