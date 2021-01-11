<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';
class ProductController extends Controller {

  public function detail() {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID ko hợp lệ';
      $url_redirect = $_SERVER['SCRIPT_NAME'] . '/';
      header("Location: $url_redirect");
      exit();
    }

    $id = $_GET['id'];
    $product_model = new Product();
    $product = $product_model->getById($id);
    $productTop = $product_model->getProductTop();
      $category_model = new Category();
      $services = $category_model->getAllCustomerService();
      $productCategory = $category_model->getProductByCategory();
      $categoriesHome = $category_model->getAll();
      $newTops = $category_model->getNewTop();
      $category_child_homes = $category_model->getAllChild();

    $this->content = $this->render('views/products/detail.php', [
      'product' => $product,
        'productTop' => $productTop,
        'productCategory' => $productCategory,
        'categoriesHome' => $categoriesHome,
        'category_child_homes' => $category_child_homes,
        'services' => $services,
        'newTops' => $newTops,
    ]);
    require_once 'views/layouts/main.php';
  }

  public function filter(){
        //Mangr chứa các tham số liên quan đến filter
        $params = [];
        if (isset($_POST['filter'])){
            // Khai báo 2 chuỗi chứa câu truy vấn cho category_id và price
            $query_category_id = '';
            $query_price = '';
            $query_search='';
            if (isset($_POST['title'])) {
                $title = $_POST['title'];
                $title_str = $title;
                $query_search = " AND (products.title LIKE '%$title_str%')";
            }
            // XỬ lý tạo câu truy vấn cho category_id, nếu user chọn thì mới xử lý
            if (isset($_POST['child_categories'])){
                // Cấu truy vấn cần có dạng : Category_id IN (1,2,3);
                $category_child = $_POST['child_categories'];
                $category_id_str = implode(',',$category_child);
                $query_category_id = " AND (products.category_child_id IN ($category_id_str))";
            }
            //Xử lý truwognf lọc giá
            //Nếu tích thì mới xử lý
            if (isset($_POST['prices'])){
                $prices = $_POST['prices'];
                foreach ($prices AS $price){
                    switch ($price){
                        case 1:
                            $query_price .=" OR (products.price BETWEEN 0 AND 5000000)";
                            break;
                        case 2:
                            $query_price .=" OR (products.price BETWEEN 5000000 AND 10000000)";
                            break;
                        case 3:
                            $query_price .=" OR (products.price BETWEEN 10000000 AND 20000000)";
                            break;
                        case 4:
                            $query_price .=" OR (products.price BETWEEN 20000000 AND 25000000)";
                            break;
                        case 5:
                            $query_price .=" OR (products.price BETWEEN 25000000 AND 30000000)";
                            break;
                        case 6:
                            $query_price .=" OR (products.price > 30000000)";
                            break;
                    }
                }
                // xử lý cắt bỏ chuỗi or ban đầu dùng hàm substr
                // cắt chuỗi từ vị trí thứ 3 đến hết
                $query_price = substr($query_price,3);

                // Nối thêm từ And đầu chuỗi
                $query_price = "AND ($query_price)";
            }
            $params['query_search'] = $query_search;
            $params['query_category_id'] = $query_category_id;
            $params['query_price'] = $query_price;
        }
      $product_model = new Product();
      $count_total = $product_model->countTotal();
      //        xử lý phân trang
      $query_additional = '';
      if (isset($_GET['title'])) {
          $query_additional .= '&title=' . $_GET['title'];
      }
      if (isset($_GET['category_id'])) {
          $query_additional .= '&category_id=' . $_GET['category_id'];
      }
      $arr_params = [
          'total' => $count_total,
          'limit' => 5,
          'query_string' => 'page',
          'controller' => 'product',
          'action' => 'filter',
          'full_mode' => false,
          'query_additional' => $query_additional,
          'page' => isset($_GET['page']) ? $_GET['page'] : 1
      ];
      if (isset($_GET['page'])&& is_numeric($_GET['page'])){
          $page = $_GET['page'];
          $start = ($page -1) * $params['limit'];
          $params['start'] = $start;
      }
      //xử lý phân trang
//      $products = $product_model->getAllPagination($arr_params);
//      $pagination = new Pagination($arr_params);
//      $pages = $pagination->getPagination();

        // Lấy ra danh sách toàn bộ sản phẩm đang có trên hệ thống
        $product_models = new Product();
        $products = $product_models->getAllFilter($params);
        //$category_childs = $product_model->getByIdAll();
        // Lấy ra toàn bộ danh mục đang có để hiện thị cho phần lọc

        $category_model = new Category();
        $categories = $category_model->getAll();
        $category_childs = $category_model->getAllChild();
        //Gọi view và layout đẻ hieenjt hị
        $this->content = $this->render('views/products/filter.php',[
            'products' => $products,
            'category_childs' => $category_childs,
//            'pages' => $pages,
            'categories' => $categories,
        ]);

        require_once 'views/layouts/main.php';
  }
}