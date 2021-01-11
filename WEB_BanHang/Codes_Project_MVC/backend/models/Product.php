<?php
require_once 'models/Model.php';

class Product extends Model
{

    public $id;
    public $category_child_id;
    public $title;
    public $avatar;
    public $price;
    public $amount;
    public $summary;
    public $content;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $status;
    public $created_at;
    public $updated_at;
    /*
     * Chuỗi search, sinh tự động dựa vào tham số GET trên Url
     */
    public $str_search = '';

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND products.title LIKE '%{$_GET['title']}%'";
        }
        if (isset($_GET['category_child_id']) && !empty($_GET['category_child_id'])) {
            $this->str_search .= " AND products.category_child_id = {$_GET['category_child_id']}";
        }
        if (isset($_GET['category_parent_id']) && !empty($_GET['category_parent_id'])) {
            $this->str_search .= " AND products.category_parent_id = {$_GET['category_parent_id']}";
        }
    }

    /**
     * Lấy thông tin của sản phẩm đang có trên hệ thống
     * @return array
     */
    public function getAll()
    {
        $obj_select = $this->connection
            ->prepare("SELECT products.*, category_child.name AS category_name FROM products 
                        INNER JOIN category_child ON category_child.id = products.category_child_id
                        WHERE TRUE $this->str_search
                        ORDER BY products.created_at DESC
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    /**
     * Lấy thông tin của sản phẩm đang có trên hệ thống
     * @param array Mảng các tham số phân trang
     * @return array
     */
    public function getAllPagination($arr_params)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT products.*, category_child.name as category_child_name, categories.name AS category_name FROM category_child
          INNER JOIN categories ON category_child.category_id = categories.id 
          INNER JOIN products ON category_child.id = products.category_child_id
          WHERE TRUE $this->str_search
          ORDER BY products.updated_at DESC, products.created_at DESC LIMIT $start, $limit");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    /**
     * Tính tổng số bản ghi đang có trong bảng products
     * @return mixed
     */
    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE TRUE $this->str_search");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

    /**
     * Insert dữ liệu vào bảng products
     * @return bool
     */
    public function insert()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO products(category_child_id, title, avatar, price, amount, summary, content, seo_title, seo_description, seo_keywords, status) 
                                VALUES (:category_child_id, :title, :avatar, :price, :amount, :summary, :content, :seo_title, :seo_description, :seo_keywords, :status)");
        $arr_insert = [
            ':category_child_id' => $this->category_child_id,
            ':title' => $this->title,
            ':avatar' => $this->avatar,
            ':price' => $this->price,
            ':amount' => $this->amount,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':seo_title' => $this->seo_title,
            ':seo_description' => $this->seo_description,
            ':seo_keywords' => $this->seo_keywords,
            ':status' => $this->status,
        ];
        return $obj_insert->execute($arr_insert);
    }

    /**
     * Lấy thông tin sản phẩm theo id
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT products.*, category_child.name as category_child_name, categories.name AS category_name FROM category_child
          INNER JOIN categories ON category_child.category_id = categories.id 
          INNER JOIN products ON category_child.id = products.category_child_id WHERE products.id = $id");

        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE products SET category_child_id=:category_child_id, title=:title, avatar=:avatar, price=:price,amount=:amount,
            summary=:summary, content=:content, seo_title=:seo_title, seo_description=:seo_description, seo_keywords=:seo_keywords, status=:status, updated_at=:updated_at WHERE id = $id
");
        $arr_update = [
            ':category_child_id' => $this->category_child_id,
            ':title' => $this->title,
            ':avatar' => $this->avatar,
            ':price' => $this->price,
            ':amount' => $this->amount,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':seo_title' => $this->seo_title,
            ':seo_description' => $this->seo_description,
            ':seo_keywords' => $this->seo_keywords,
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
        ];
        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM products WHERE id = $id");
        return $obj_delete->execute();
    }
}