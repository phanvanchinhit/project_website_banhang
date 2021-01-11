<?php
require_once 'controllers/Controller.php';
require_once 'models/Service.php';

class ServiceController extends Controller
{
    public function index(){
        $service_model = new Service();
        $services = $service_model->getAllService();
        $this->content = $this->render('views/customer_services/index.php',[
            'services' =>$services,
        ]);
        require_once 'views/layouts/main.php';
    }
    public function create() {
        $service_model = new Service();
        if (isset($_POST['submit'])) {
            $category = $_POST['category'];
            $phone = $_POST['phone'];
            $zalo = $_POST['zalo'];
            $email = $_POST['email'];
            //xử lý validate
            if (empty($category)) {
                $this->error = 'Name không được để trống';
            } else if (empty($phone)) {
                $this->error = 'Phone không được để trống';
            }else if (empty($zalo)) {
                $this->error = 'Zalo không được để trống';
            } else if (empty($email)){
                $this->error = 'Email không được để trống';
            }
            //xủ lý lưu dữ liệu khi biến error rỗng
            if (empty($this->error)) {
                $service_model->category = $category;
                $service_model->phone = $phone;
                $service_model->zalo = $zalo;
                $service_model->email = $email;
                $is_insert = $service_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = 'Insert dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Insert dữ liệu thất bại';
                }
                header('Location: index.php?controller=service&action=index');
                exit();
            }
        }

        $this->content = $this->render('views/customer_services/create.php');

        require_once 'views/layouts/main.php';
    }
    public function update() {

        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header("Location: index.php?controller=service&action=index");
            exit();
        }

        $id = $_GET['id'];
        $service_model = new Service();
        $services = $service_model->getServiceById($id);
        if (isset($_POST['submit'])) {
            $category = $_POST['category'];
            $phone = $_POST['phone'];
            $zalo = $_POST['zalo'];
            $email = $_POST['email'];
            //xử lý validate
            if (empty($category)) {
                $this->error = 'Name không được để trống';
            } else if (empty($phone)) {
                $this->error = 'Phone không được để trống';
            }else if (empty($zalo)) {
                $this->error = 'Zalo không được để trống';
            } else if (empty($email)){
                $this->error = 'Email không được để trống';
            }
            //xủ lý lưu dữ liệu khi biến error rỗng
            if (empty($this->error)) {
                $service_model->category = $category;
                $service_model->phone = $phone;
                $service_model->zalo = $zalo;
                $service_model->email = $email;
                $service_model->updated_at = date('Y-m-d H:i:s');
                $is_insert = $service_model->update($id);
                if ($is_insert) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=service&action=index');
                exit();
            }
        }

        $this->content = $this->render('views/customer_services/update.php',[
            'services' => $services,
        ]);

        require_once 'views/layouts/main.php';
    }

    public function delete() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=service&action=index');
            exit();
        }

        $id = $_GET['id'];
        $service_model = new Service();
        $is_delete = $service_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=service&action=index');
        exit();
    }

}