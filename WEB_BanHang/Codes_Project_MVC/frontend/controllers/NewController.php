<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';
require_once 'models/Order.php';
require_once 'models/Neww.php';
class NewController extends Controller
{
    public function index(){
        $new_model = new Neww();

        //lấy tổng số bản ghi đang có trong bảng products
        $count_total = $new_model->countTotal();
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
            'limit' => 4,
            'query_string' => 'page',
            'controller' => 'new',
            'action' => 'index',
            'full_mode' => false,
            'query_additional' => $query_additional,
            'page' => isset($_GET['page']) ? $_GET['page'] : 1
        ];
        $news = $new_model->getAllPagination($arr_params);
        $pagination = new Pagination($arr_params);
        $newTops = $new_model->getNewTop();

        $pages = $pagination->getPagination();

        //lấy danh sách category đang có trên hệ thống để phục vụ cho search
        $category_model = new Category();
        //$categories = $category_model->getAll();
        $categories = $category_model->getAllCategoryNew();

        $this->content = $this->render('views/news/index.php', [
            'news' => $news,
            'pages' => $pages,
            'categories' => $categories,
            'newTops' => $newTops,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=new');
            exit();
        }

        $id = $_GET['id'];
        $new_model = new Neww();
        $new = $new_model->getById($id);
        $newTops = $new_model->getNewTop();
        $category_model = new Category();
        $categories = $category_model->getAllCategoryNew();
        $category_news = $new_model->getAllNew();

        $this->content = $this->render('views/news/detail.php', [
            'new' => $new,
            'newTops' => $newTops,
            'categories' => $categories,
            'category_news' => $category_news,
        ]);
        require_once 'views/layouts/main.php';
    }

}