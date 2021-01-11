<?php
require_once 'models/Model.php';
class Product extends Model {

    public $str_search = '';

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND products.title LIKE '%{$_GET['title']}%'";
        }
        if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
            $this->str_search .= " AND products.category_id = {$_GET['category_id']}";
        }
    }

  public function getProductInHomePage($params = []) {
    $str_filter = '';
    if (isset($params['category'])) {
      $str_category = $params['category'];
      $str_filter .= " AND categories.id IN $str_category";
    }
    if (isset($params['price'])) {
      $str_price = $params['price'];
      $str_filter .= " AND $str_price";
    }
    //do cả 2 bảng products và categories đều có trường name, nên cần phải thay đổi lại tên cột cho 1 trong 2 bảng
    $sql_select = "SELECT products.*, category_child.name 
          AS category_name FROM products
          INNER JOIN category_child ON products.category_child_id = category_child.id
          WHERE products.status = 1 $str_filter";

    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();

    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }

  /**
   * Lấy thông tin sản phẩm theo id
   * @param $id
   * @return mixed
   */
  public function getById($id)
  {
    $obj_select = $this->connection
      ->prepare("SELECT products.*, category_child.name AS category_name FROM products 
          INNER JOIN category_child ON products.category_child_id = category_child.id WHERE products.id = $id");

    $obj_select->execute();
    $product =  $obj_select->fetch(PDO::FETCH_ASSOC);
    return $product;
  }
  public function getProductTop(){
      $obj_select = $this->connection
          ->prepare("select id,avatar,title from products LIMIT 15");
      $obj_select->execute();
      $productTop = $obj_select->fetchAll(PDO::FETCH_ASSOC);
      return $productTop;
  }
  public function getAllSearchHome($params =[]){
      $query_search_home = '';
      if (isset($params['query_search_home'])){
          $query_search_home = $params['query_search_home'];
      }
      $sql_select_all = "select products.*, category_child.name as category_name from products
                    inner join category_child on products.category_child_id = category_child.id where products.status = 1 $query_search_home";
      // + Tạo đối tượng truy vấn
      $obj_select_all = $this->connection->prepare($sql_select_all);
      // Thực thi đối tượng truy vấn
      $obj_select_all->execute();
      //Lấy ra mảng đối tượng product
      $productSearches = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
      return $productSearches;

  }

  public function getAllFilter($params = []){
    $query_category_id = '';
    // luôn phải kiểm tra tồn tại mảng theo key
    if (isset($params['query_category_id'])){
        $query_category_id = $params['query_category_id'];
    }
    $query_price = '';
    if(isset($params['query_price'])){
        $query_price = $params['query_price'];
    }
    $query_search ='';
    if (isset($params['query_search'])){
        $query_search = $params['query_search'];
    }
    $sql_select_all = "select products.*, category_child.name as category_name from products
                    inner join category_child on products.category_child_id = category_child.id where products.status = 1 $query_category_id $query_price $query_search";
    // + Tạo đối tượng truy vấn
    $obj_select_all = $this->connection->prepare($sql_select_all);
    // Thực thi đối tượng truy vấn
    $obj_select_all->execute();
    //Lấy ra mảng đối tượng product
    $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
  public function getAllPagination($arr_params)
  {
    $limit = $arr_params['limit'];
    $page = $arr_params['page'];
    $start = ($page - 1) * $limit;
    $obj_select = $this->connection
        ->prepare("SELECT products.*, category_child.name AS category_name FROM products 
                    INNER JOIN category_child ON category_child.id = products.category_child_id
                    WHERE TRUE $this->str_search
                    ORDER BY products.updated_at DESC, products.created_at DESC
                    LIMIT $start, $limit
                    ");

    $arr_select = [];
    $obj_select->execute($arr_select);
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

    return $products;
  }
    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE TRUE $this->str_search");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }
}

