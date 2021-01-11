<?php
require_once 'controllers/Controller.php';
require_once 'models/Contact.php';
class ContactController extends Controller
{
    public function index(){
        $contact_model = new Contact();
        $contactNews = $contact_model->countContactTotal();
        $contacts = $contact_model->getAllContact();
        $this->content = $this->render('views/contacts/index.php', [
            'contacts' => $contacts,
        ]);

        require_once 'views/layouts/main.php';
    }

    public function detail() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header("Location: index.php?controller=contact");
            exit();
        }
        $id = $_GET['id'];
        $contact_model = new Contact();
        $contacts = $contact_model->getByIdContact($id);

        $this->content = $this->render('views/contacts/detail.php', [
            'contacts' => $contacts
        ]);

        require_once 'views/layouts/main.php';
    }

    public function update() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header("Location: index.php?controller=contact");
            exit();
        }

        $id = $_GET['id'];
        $contact_model = new Contact();
        $contacts = $contact_model->getByIdContact($id);
        if (isset($_POST['submit'])) {
            $fullName = $_POST['fullName'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $description =$_POST['description'];
            $contactStatus = $_POST['contactStatus'];

            //xử lý validate
            if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email không đúng định dạng';
            }

            //xủ lý lưu dữ liệu khi biến error rỗng
            if (empty($this->error)) {
                $contact_model->fullName = $fullName;
                $contact_model->phone = $phone;
                $contact_model->address = $address;
                $contact_model->email = $email;
                $contact_model->description = $description;
                $contact_model->contactStatus = $contactStatus;
                $is_update = $contact_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=contact');
                exit();
            }
        }

        $this->content = $this->render('views/contacts/update.php', [
            'contacts' => $contacts
        ]);

        require_once 'views/layouts/main.php';
    }

    public function delete() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=contact');
            exit();
        }

        $id = $_GET['id'];
        $contact_model = new Contact();
        $is_delete = $contact_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=contact');
        exit();
    }

}