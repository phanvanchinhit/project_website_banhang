<?php
require_once 'controllers/Controller.php';
require_once 'models/Contact.php';

class ContactController extends Controller
{
    public function index(){
        if (isset($_POST['submit'])){
            $contact_model = new Contact();
            $fullName = $_POST['fullName'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $description = $_POST['description'];
            if (empty($fullName)){
                $this->error = "Trường tên không được để trống !";
            }
            elseif (empty($phone)){
                $this->error = "Số điện thoại không được để trống !";
            }
            elseif (empty($email)){
                $this->error = 'Email không được để trống !';
            }
            elseif (!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $this->error = 'Định dạng email chưa đứng';
            }
            elseif (empty($address)){
                $this->error = 'Địa chỉ không được để trống';
            }

            if (empty($this->error)){
                $contact_model->fullName = $fullName;
                $contact_model->phone = $phone;
                $contact_model->email = $email;
                $contact_model->address = $address;
                $contact_model->description = $description;
                $is_insert = $contact_model->insertContact();
                if ($is_insert){
                    $_SESSION['success'] ='Gửi thông tin thành công !';
                }
                else{
                    $_SESSION['error'] ='Gửi thông tin lỗi !';
                }
                header("Location: index.php");
                exit();
            }
        }

        $this->content = $this->render('views/contacts/index.php');
        require_once 'views/layouts/main.php';
    }
}