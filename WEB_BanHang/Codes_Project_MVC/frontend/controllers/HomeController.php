<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/PaginationAllProduct.php';

class HomeController extends Controller {
  public function index() {
      // Đưa sản phẩm ra views
      $params = [];
      if (isset($_POST['submitSearch'])){
          $query_search_home='';
          if (isset($_POST['search'])){
              $search_home = $_POST['search'];
              $title_str = $search_home;
              $query_search_home = " AND (products.title LIKE '%$title_str%')";
          }
          $params['query_search_home'] = $query_search_home;
      }
      $category_model = new Category();
      $services = $category_model->getAllCustomerService();
      $categoriesss = $category_model->getAll();
      $categoriesHome = $category_model->getAll();
      $category_child_homes = $category_model->getAllChild();
      $category_childss = $category_model->getAllChild();
      $slideBars = $category_model->getAllSlide();
      $slideTop = $category_model->getOneIdTop();
      $newTops = $category_model->getNewTop();
      $productCategory = $category_model->getProductByCategory();

    $product_model = new Product();
    $products = $product_model->getProductInHomePage();
    $productSearches = $product_model->getAllSearchHome($params);
    $categories = $category_model->getNameAll();
    $this->content = $this->render('views/homes/index.php', [
        'categories' => $categories,
        'products' => $products,
        'newTops' => $newTops,
        'productSearches'  => $productSearches,
        'slideBars' => $slideBars,
        'slideTop' =>$slideTop,
        'productCategory' => $productCategory,
        'categoriesHome' => $categoriesHome,
        'category_child_homes' => $category_child_homes,
        'services' => $services,
    ]);

    // ĐƯa danh mục sản phẩm ra view
    require_once 'views/layouts/main.php';
  }

    public function detail()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=home');
            exit();
        }

        $id = $_GET['id'];
        $category_model = new Category();
        $count_total = $category_model->countTotal($id);

        $params = [
            'id' => $id,
            'total' => $count_total,
            'limit' => 12,
            'query_string' => 'page',
            'controller' => 'home',
            'action' => 'detail',
            'full_mode' => false,
            'page' => isset($_GET['page']) ? $_GET['page'] : 1
        ];
        $products = $category_model->getAllPagination($params);
        $pagination = new PaginationAllProduct($params);
        $pages = $pagination->getPagination();

        //lấy danh sách category đang có trên hệ thống để phục vụ cho search
        $category_model = new Category();
        $services = $category_model->getAllCustomerService();
        $categoriesss = $category_model->getAll();
        $categoriesHome = $category_model->getAll();
        $category_child_homes = $category_model->getAllChild();
        $category_childss = $category_model->getAllChild();
        $slideBars = $category_model->getAllSlide();
        $slideTop = $category_model->getOneIdTop();
        $newTops = $category_model->getNewTop();
        $productCategory = $category_model->getProductByCategory();
        $category_child_name = $category_model->getAllChildNameById($id);

        $product_model = new Product();
        //$products = $product_model->getProductInHomePage();
        $productSearches = $product_model->getAllSearchHome($params);
        $categories = $category_model->getNameAll();
        $this->content = $this->render('views/homes/detail.php', [
            'categories' => $categories,
            'products' => $products,
            'newTops' => $newTops,
            'productSearches'  => $productSearches,
            'slideBars' => $slideBars,
            'slideTop' =>$slideTop,
            'productCategory' => $productCategory,
            'categoriesHome' => $categoriesHome,
            'category_child_homes' => $category_child_homes,
            'services' => $services,
            'pages' => $pages,
            'category_child_name' =>$category_child_name,
        ]);
        require_once 'views/layouts/main.php';
    }

}