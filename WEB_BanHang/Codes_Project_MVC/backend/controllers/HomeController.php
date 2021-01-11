<?php
/**
 * Created by PhpStorm.
 * User: PHAN CHINH
 * Date: 30/10/2020
 * Time: 21:17
 */
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Product.php';
require_once 'models/Order.php';
require_once 'models/User.php';
require_once 'models/Contact.php';

class HomeController extends Controller
{
    public function index(){
        $order_model = new Order();
        $user_model = new User();
        $product_model = new Product();
        $contact_model = new Contact();
        $countContact = $contact_model->countContactTotal();
        $countProduct = $product_model->countTotal();
        $countOrder = $order_model->countOrderTotal();
        $countUser = $user_model->countUserTotal();
        $customerDetail = $user_model->getDetailUCustomer();
        $this->content = $this->render('views/homes/index.php',[
            'countOrder' => $countOrder,
            'countUser' => $countUser,
            'countProduct' =>$countProduct,
            'customerDetail' => $customerDetail,
            'countContact' => $countContact,
        ]);
        require_once 'views/layouts/main.php';
    }

}