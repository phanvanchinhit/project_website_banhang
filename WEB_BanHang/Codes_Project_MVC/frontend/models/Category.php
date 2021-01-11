<?php
require_once 'models/Model.php';
class Category extends Model {

  public function getAllSlide(){
      $sql_select_all = "SELECT * FROM system_images";
      $obj_select_all = $this->connection->prepare($sql_select_all);
      $obj_select_all->execute();
      $slideBar = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
      return $slideBar;
  }

  public function getAll() {
    $sql_select_all = "SELECT * FROM categories WHERE `status` = 1";
    $obj_select_all = $this->connection->prepare($sql_select_all);
    $obj_select_all->execute();
    $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
  }
    public function getAllCustomerService() {
        $sql_select_all = "SELECT * FROM customer_service ";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $services = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $services;
    }

    public function countTotal($id)
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE category_child_id = $id");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

  public function getProductByCategory(){
      $sql_select_all = "select products.*, category_child.name as category_name, category_child.id from products
                    inner join category_child on products.category_child_id = category_child.id where products.status = 1";
      $obj_select_all = $this->connection->prepare($sql_select_all);
      $obj_select_all->execute();
      $productCategory = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
      return $productCategory;
  }
    public function getNewTop(){
        $obj_select = $this->connection
            ->prepare("select * from news LIMIT 5");
        $obj_select->execute();
        $productTop = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $productTop;
    }
    public function getOneIdTop(){
        $obj_select = $this->connection
            ->prepare("select * from system_images LIMIT 1");
        $obj_select->execute();
        $slideTop = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $slideTop;
    }

    public function getAllChild() {
        $sql_select_all = "SELECT * FROM category_child WHERE `status` = 1";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $category_childs = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $category_childs;
    }
    public function getAllChildNameById($id) {
        $sql_select_all = "SELECT * FROM category_child WHERE id = $id";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $category_child_name = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $category_child_name;
    }

    public function getNameAll() {
        $sql_select_all = "SELECT categories.name, categories.avatar FROM categories WHERE `status` = 1";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
    public function getAllCategoryNew() {
        $sql_select_all = "SELECT * FROM category_news WHERE `status` = 1";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function getSystemContact(){
        $sql_select_all = "SELECT * FROM system_contacts";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $systemContact = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $systemContact;
    }

    public function getAllPagination($params = [])
    {
        $limit = $params['limit'];
        $page = $params['page'];
        $id = $params['id'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("select products.*, category_child.name as category_name, category_child.id from products
                    inner join category_child on products.category_child_id = category_child.id where category_child_id = $id LIMIT $start, $limit");

//    do PDO coi tất cả các param luôn là 1 string, nên cần sử dụng bindValue / bindParam cho các tham số start và limit
//        $obj_select->bindParam(':limit', $limit, PDO::PARAM_INT);
//        $obj_select->bindParam(':start', $start, PDO::PARAM_INT);
        $obj_select->execute();
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }
}