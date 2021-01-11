<?php
//models/Category
require_once 'models/Model.php';
class Category extends Model {
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
    }

  //khai báo các thuộc tính cho model trùng với các trường
//    của bảng categories
  public $id;
  public $name;
  public $avatar;
  public $description;
  public $status;
  public $created_at;
  public $updated_at;
  // khai thêm trường category_id cua r bảng category_child;
  public $category_id;

  //insert dữ liệu vào bảng categories
  public function insert() {
    $sql_insert = "INSERT INTO categories(`name`, `avatar`, `description`, `status`) VALUES (:name, :avatar, :description, :status)";
    //cbi đối tượng truy vấn
    $obj_insert = $this->connection
        ->prepare($sql_insert);
    //gán giá trị thật cho các placeholder
    $arr_insert = [
        ':name' => $this->name,
        ':avatar' => $this->avatar,
        ':description' => $this->description,
        ':status' => $this->status
    ];
    return $obj_insert->execute($arr_insert);
}

    public function insertNew() {
        $sql_insert = "INSERT INTO category_news(`name`, `avatar`, `description`, `status`) VALUES (:name, :avatar, :description, :status)";
        //cbi đối tượng truy vấn
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        //gán giá trị thật cho các placeholder
        $arr_insert = [
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':description' => $this->description,
            ':status' => $this->status
        ];
        return $obj_insert->execute($arr_insert);
    }

  /**
   * LẤy thông tin danh mục trên hệ thống
   * @param $params array Mảng các tham số search
   * @return array
   */
  public function getAll($params = []) {
//    echo "<pre>";
//    print_r($params);
//    echo "</pre>";
    //tạo 1 chuỗi truy vấn để thêm các điều kiện search
    //dựa vào mảng params truyền vào
    $str_search = 'WHERE TRUE';
    //check mảng param truyền vào để thay đổi lại chuỗi search
    if (isset($params['name']) && !empty($params['name'])) {
      $name = $params['name'];
      //nhớ phải có dấu cách ở đầu chuỗi
      $str_search .= " AND `name` LIKE '%$name%'";
    }
    if (isset($params['status'])) {
      $status = $params['status'];
      $str_search .= " AND `status` = $status";
    }
    //tạo câu truy vấn
    //gắn chuỗi search nếu có vào truy vấn ban đầu
    $sql_select_all = "SELECT products.*, category_child.name as category_child_name, categories.name AS category_name FROM category_child
          INNER JOIN categories ON category_child.category_id = categories.id 
          INNER JOIN products ON category_child.id = products.category_child_id $str_search";
    //cbi đối tượng truy vấn
    $obj_select_all = $this->connection
      ->prepare($sql_select_all);
    $obj_select_all->execute();
    $categories = $obj_select_all
      ->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
  }
    public function getAllCategory() {
    $sql_select_all = "SELECT * FROM categories WHERE `status` = 1";
    $obj_select_all = $this->connection->prepare($sql_select_all);
    $obj_select_all->execute();
    $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
    }
    public function getAllCategoryChild() {
        $sql_select_all = "SELECT * FROM category_child WHERE `status` = 1";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

  public function getById($id) {
    $sql_select_one = "SELECT * FROM categories WHERE id = $id";
    $obj_select_one = $this->connection
      ->prepare($sql_select_one);
    $obj_select_one->execute();
    $category = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    return $category;
  }
    public function getAllCategoryNew() {
        $sql_select_all = "SELECT * FROM category_news WHERE `status` = 1";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

  /**
   * Lấy category theo id truyền vào
   * @param $id
   * @return array
   */
  public function getCategoryById($id)
  {
    $obj_select = $this->connection
      ->prepare("SELECT * FROM categories WHERE id = $id");
    $obj_select->execute();
    $category = $obj_select->fetch(PDO::FETCH_ASSOC);

    return $category;
  }

    public function getCategoryNewById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM category_news WHERE id = $id");
        $obj_select->execute();
        $category = $obj_select->fetch(PDO::FETCH_ASSOC);

        return $category;
    }

  /**
   * Update bản ghi theo id truyền vào
   * @param $id
   * @return bool
   */
  public function update($id)
  {
    $obj_update = $this->connection->prepare("UPDATE categories SET `name` = :name, `avatar` = :avatar, `description` = :description, `status` = :status, `updated_at` = :updated_at 
         WHERE id = $id");
    $arr_update = [
      ':name' => $this->name,
      ':avatar' => $this->avatar,
      ':description' => $this->description,
      ':status' => $this->status,
      ':updated_at' => $this->updated_at,
    ];

    return $obj_update->execute($arr_update);
  }

    public function updateNew($id)
    {
        $obj_update = $this->connection->prepare("UPDATE category_news SET `name` = :name, `avatar` = :avatar, `description` = :description, `status` = :status, `updated_at` = :updated_at 
         WHERE id = $id");
        $arr_update = [
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':description' => $this->description,
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
        ];

        return $obj_update->execute($arr_update);
    }

  /**
   * Xóa bản ghi theo id truyền vào
   * @param $id
   * @return bool
   */
  public function delete($id)
  {
    $obj_delete = $this->connection
      ->prepare("DELETE FROM categories WHERE id = $id");
    $is_delete = $obj_delete->execute();
    //để đảm bảo toàn vẹn dữ liệu, sau khi xóa category thì cần xóa cả các product nào đang thuộc về category này
    $obj_delete_product = $this->connection
      ->prepare("DELETE FROM products WHERE category_id = $id");
    $obj_delete_product->execute();

    return $is_delete;
  }

    public function deleteNew($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM category_news WHERE id = $id");
        $is_delete = $obj_delete->execute();
        //để đảm bảo toàn vẹn dữ liệu, sau khi xóa category thì cần xóa cả các product nào đang thuộc về category này
        $obj_delete_product = $this->connection
            ->prepare("DELETE FROM news WHERE category_id = $id");
        $obj_delete_product->execute();

        return $is_delete;
    }

  /**
   * Lấy tổng số bản ghi trong bảng categories
   * @return mixed
   */
  public function countTotal()
  {
    $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM categories");
    $obj_select->execute();

    return $obj_select->fetchColumn();
  }

    public function countTotalCategoryNew()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM category_news");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

  public function getAllPagination($params = [])
  {
    $limit = $params['limit'];
    $page = $params['page'];
    $start = ($page - 1) * $limit;
    $obj_select = $this->connection
      ->prepare("SELECT * FROM categories LIMIT $start, $limit");

//    do PDO coi tất cả các param luôn là 1 string, nên cần sử dụng bindValue / bindParam cho các tham số start và limit
//        $obj_select->bindParam(':limit', $limit, PDO::PARAM_INT);
//        $obj_select->bindParam(':start', $start, PDO::PARAM_INT);
    $obj_select->execute();
    $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);

    return $categories;
  }

    public function getAllPaginationCategoryNew($params = [])
    {
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT * FROM category_news LIMIT $start, $limit");

//    do PDO coi tất cả các param luôn là 1 string, nên cần sử dụng bindValue / bindParam cho các tham số start và limit
//        $obj_select->bindParam(':limit', $limit, PDO::PARAM_INT);
//        $obj_select->bindParam(':start', $start, PDO::PARAM_INT);
        $obj_select->execute();
        $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }

  // Category_child
    public function countTotalChild()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM category_child");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }
    public function insertChild() {
        $sql_insert = "INSERT INTO category_child(`category_id`,`name`, `avatar`, `description`, `status`) VALUES (:category_id,:name, :avatar, :description, :status)";
        //cbi đối tượng truy vấn
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        //gán giá trị thật cho các placeholder
        $arr_insert = [
            ':category_id' => $this->category_id,
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':description' => $this->description,
            ':status' => $this->status
        ];
        return $obj_insert->execute($arr_insert);
    }
    public function getByIdChild($id) {
        $sql_select_one = "SELECT * FROM category_child WHERE id = $id";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $obj_select_one->execute();
        $category_child = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $category_child;
    }

    public function getCategoryByIdChild($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT category_child.*, categories.name AS category_name FROM category_child 
          INNER JOIN categories ON category_child.category_id = categories.id WHERE category_child.id = $id");

        $obj_select->execute();
        $category_child =  $obj_select->fetch(PDO::FETCH_ASSOC);
        return $category_child;
    }
    public function updateChild($id)
    {
        $obj_update = $this->connection->prepare("UPDATE category_child SET `name` = :name, `category_id` =:category_id, `avatar` = :avatar, `description` = :description, `status` = :status, `updated_at` = :updated_at 
         WHERE id = $id");
        $arr_update = [
            ':name' => $this->name,
            ':category_id' => $this->category_id,
            ':avatar' => $this->avatar,
            ':description' => $this->description,
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
        ];

        return $obj_update->execute($arr_update);
    }
    public function deleteChild($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM category_child WHERE id = $id");
        $is_delete = $obj_delete->execute();
        //để đảm bảo toàn vẹn dữ liệu, sau khi xóa category thì cần xóa cả các product nào đang thuộc về category này
        $obj_delete_product = $this->connection
            ->prepare("DELETE FROM products WHERE category_child_id = $id");
        $obj_delete_product->execute();
        return $is_delete;
    }
    public function getAllPaginationChild($params = [])
    {
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT category_child.*, categories.name AS category_name FROM category_child 
                    INNER JOIN categories ON categories.id = category_child.category_id
                    WHERE TRUE $this->str_search
                    ORDER BY category_child.updated_at DESC, category_child.created_at DESC
                    LIMIT $start, $limit");
        $obj_select->execute();
        $category_child = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $category_child;
    }
}