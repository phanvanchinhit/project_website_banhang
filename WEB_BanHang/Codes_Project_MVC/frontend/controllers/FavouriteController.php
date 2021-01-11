<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
class FavouriteController extends Controller
{
    public function add()
    {

        $product_id = $_GET['product_id'];
        // Gọi model để lấy ra thông tin sản phẩm theo id trên
        $product_model = new Product();
        $product = $product_model->getById($product_id);

        $favs = [
            'name' => $product['title'],
            'price' => $product['price'],
            'avatar' => $product['avatar'],
            'quantity' => 1
        ];
        // Khi click thêm vào giỏ, sẽ có 2 trường hợp xảy ra:
        // Nếu giỏ hàng chưa từng tồn tại trước đó, thì cần khởi tạo
        //giỏ hàng và thêm sản phẩm mới vào giỏ
        if (!isset($_SESSION['favs'])) {
            $_SESSION['favs'][$product_id] = $favs;
        }

        else {
            if (!array_key_exists($product_id, $_SESSION['favs'])) {
                //$_SESSION['favs'][$product_id]['quantity']++;
                $_SESSION['favs'][$product_id] = $favs;
            }
//            else {
//                $_SESSION['favs'][$product_id] = $favs;
//            }
        }
    }
    public function index()
    {
        // Lấy tất cả ản phẩm
        $product_model = new Product();
        $products = $product_model->getProductInHomePage();
        // Lấy tất cả danh mục
        $category_model = new Category();
        $categories = $category_model->getNameAll();
        // Xử lý cập nhật sản phẩm yêu thích
        if (isset($_POST['submit'])) {
            //Xử lý thêm trường hợp nếu nhập số lượng là số âm thì sẽ
            //ko xủ lý update
            foreach ($_SESSION['favs'] AS $product_id => $favs) {
                if ($_POST[$product_id] < 0) {
                    $_SESSION['error'] = 'Số lượng phải > 0';
                    header('Location: index.php');
                    exit();
                }
            }
            //Lặp giỏ hàng, truy cập phần tử mảng theo id, r set
            //lại số lượng tương ứng từ form gửi lên
            foreach ($_SESSION['favs'] AS $product_id => $favs) {
                $_SESSION['favs'][$product_id]['quantity'] = $_POST[$product_id];
            }
            $_SESSION['success'] = 'Cập nhật thành công';
        }

        //Lấy  nội dung view views/carts/index.php
        $this->content = $this->render('views/favourites/index.php',[
            'categories' => $categories,
            'products' => $products
        ]);
        // Gọi layout để hiển thị nội dung view trên
        require_once 'views/layouts/main.php';

    }
    public function delete() {

        //Do trong rewrite đã có regex bắt buộc id phải là số, nên ko
        //cần validate bằng PHP nữa
        $product_id = $_GET['id'];
        //Xử lý xóa
        unset($_SESSION['favs'][$product_id]);
        //Sau mỗi lần xóa cần kiểm tra nếu xóa hết sp trong giỏ thì
        //cần xóa yeeu thichs
        if (empty($_SESSION['favs'])) {
            unset($_SESSION['favs']);
        }
        $_SESSION['success'] = "Bỏ thích sản phẩm $product_id thành công";
        header("Location: san-pham-yeu-thich.html");
        exit();
    }
}