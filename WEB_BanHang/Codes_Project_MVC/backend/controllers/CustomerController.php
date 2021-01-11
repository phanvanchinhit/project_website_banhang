<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/System.php';
require_once 'models/User.php';
class CustomerController extends Controller
{
    public function index(){
        $customer_model = new User();
        $customers = $customer_model->getAllCustomer();
        $this->content = $this->render('views/customers/index.php', [
            'customers' => $customers,
        ]);

        require_once 'views/layouts/main.php';
    }

    public function detail() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header("Location: index.php?controller=customer");
            exit();
        }
        $id = $_GET['id'];
        $customer_model = new User();
        $customers = $customer_model->getByIdCustomer($id);

        $this->content = $this->render('views/customers/detail.php', [
            'customers' => $customers,
        ]);

        require_once 'views/layouts/main.php';
    }
}