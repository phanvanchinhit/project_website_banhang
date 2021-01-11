<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';
require_once 'models/Order.php';
require_once 'models/System.php';
class SystemController extends Controller
{
    public function index(){
        $slide_model = new System();

        $slideBars = $slide_model->getAllSlide();

        $this->content = $this->render('views/systems/slides/index.php',[
            'slideBars' =>$slideBars,
        ]);

        require_once 'views/layouts/main.php';
    }

    public function create()
    {
        $slide_model = new System();
        if (isset($_POST['submit'])) {
            if ($_FILES['slidebar']['error'] == 0) {
                $extension = pathinfo($_FILES['slidebar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $allow_extensions = ['png', 'jpg', 'jpeg', 'gif'];
                $file_size_mb = $_FILES['slidebar']['size'] / 1024 / 1024;
                $file_size_mb = round($file_size_mb, 2);
                if (!in_array($extension, $allow_extensions)) {
                    $this->error = 'Phải upload avatar dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được lớn hơn 2Mb';
                }
            }

            if (empty($this->error)) {
                $filename = '';
                //xử lý upload ảnh nếu có
                if ($_FILES['slidebar']['error'] == 0) {
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }

                    $filename = time() . '-slide-' . $_FILES['slidebar']['name'];
                    move_uploaded_file($_FILES['slidebar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                $slide_model->slidebar = $filename;
                $is_insert = $slide_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = 'Insert dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Insert dữ liệu thất bại';
                }
                header('Location: index.php?controller=system');
                exit();
            }
        }
        $this->content = $this->render('views/systems/slides/create.php');

        require_once 'views/layouts/main.php';
    }

    public function update() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header("Location: index.php?controller=system&action=index");
            exit();
        }

        $id = $_GET['id'];
        $slide_model = new System();
        $slideBar = $slide_model->getById($id);
        if (isset($_POST['submit'])) {
            if ($_FILES['slidebar']['error'] == 0) {
                $extension = pathinfo($_FILES['slidebar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $allow_extensions = ['png', 'jpg', 'jpeg', 'gif'];
                $file_size_mb = $_FILES['slidebar']['size'] / 1024 / 1024;
                $file_size_mb = round($file_size_mb, 2);
                if (!in_array($extension, $allow_extensions)) {
                    $this->error = 'Phải upload avatar dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được lớn hơn 2Mb';
                }
            }

            //xủ lý lưu dữ liệu khi biến error rỗng
            if (empty($this->error)) {
                $filename = $slideBar['slidebar'];
                //xử lý upload ảnh nếu có
                if ($_FILES['slidebar']['error'] == 0) {
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    //xóa file ảnh đã update trc đó
                    @unlink($dir_uploads . '/' . $filename);
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }

                    $filename = time() . '-slide-' . $_FILES['slidebar']['name'];
                    move_uploaded_file($_FILES['slidebar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                //lưu password dưới dạng mã hóa, hiện tại sử dụng cơ chế md5
                $slide_model->slidebar = $filename;
                $slide_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $slide_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=system&action=index');
                exit();
            }
        }

        $this->content = $this->render('views/systems/slides/update.php', [
            'slideBar' => $slideBar
        ]);

        require_once 'views/layouts/main.php';
    }

    public function delete() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=system&action=index');
            exit();
        }

        $id = $_GET['id'];
        $slide_model = new System();
        $is_delete = $slide_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=system&action=index');
        exit();
    }

    public function indexContact(){
        $contact_model = new System();

        $contacts = $contact_model->getAllContact();

        $this->content = $this->render('views/systems/contacts/indexContact.php',[
            'contacts' =>$contacts,
        ]);

        require_once 'views/layouts/main.php';
    }

    public function createContact() {
        $contact_model = new System();
        if (isset($_POST['submit'])) {
            $phone = $_POST['phone'];
            $zalo = $_POST['zalo'];
            $email = $_POST['email'];
            $map = $_POST['map'];
            $company = $_POST['company'];
            $address = $_POST['address'];
            //xử lý validate
            if (empty($phone)) {
                $this->error = 'Phone không được để trống';
            } else if (empty($zalo)) {
                $this->error = 'Zalo không được để trống';
            } else if (empty($email)){
                $this->error = 'Email không được để trống';
            } else if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email không đúng định dạng';
            } else if (empty($map)){
                $this->error = 'Map không được để trống';
            } else if ($_FILES['logo']['error'] == 0) {
                $extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $allow_extensions = ['png', 'jpg', 'jpeg', 'gif'];
                $file_size_mb = $_FILES['favicon']['size'] / 1024 / 1024;
                $file_size_mb = round($file_size_mb, 2);
                if (!in_array($extension, $allow_extensions)) {
                    $this->error = 'Phải upload avatar dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được lớn hơn 2Mb';
                }
            }else if ($_FILES['favicon']['error'] == 0) {
                $extension = pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $allow_extensions = ['png', 'jpg', 'jpeg', 'gif'];
                $file_size_mb = $_FILES['favicon']['size'] / 1024 / 1024;
                $file_size_mb = round($file_size_mb, 2);
                if (!in_array($extension, $allow_extensions)) {
                    $this->error = 'Phải upload avatar dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được lớn hơn 2Mb';
                }
            } else if (empty($company)){
                $this->error = 'Company không được để trống';
            } else if (empty($address)){
                $this->error = 'Address không được để trống';
            }

            //xủ lý lưu dữ liệu khi biến error rỗng
            if (empty($this->error)) {
                $filename = '';
                //xử lý upload ảnh nếu có
                if ($_FILES['logo']['error'] == 0) {
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }

                    $filename = time() . '-logo-' . $_FILES['logo']['name'];
                    move_uploaded_file($_FILES['logo']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                $filename2 = '';
                //xử lý upload ảnh nếu có
                if ($_FILES['favicon']['error'] == 0) {
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }

                    $filename2 = time() . '-favicon-' . $_FILES['favicon']['name'];
                    move_uploaded_file($_FILES['favicon']['tmp_name'], $dir_uploads . '/' . $filename2);
                }
                $contact_model->phone = $phone;
                $contact_model->zalo = $zalo;
                $contact_model->email = $email;
                $contact_model->map = $map;
                $contact_model->logo = $filename;
                $contact_model->favicon = $filename2;
                $contact_model->company = $company;
                $contact_model->address = $address;
                $is_insert = $contact_model->insertContact();
                if ($is_insert) {
                    $_SESSION['success'] = 'Insert dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Insert dữ liệu thất bại';
                }
                header('Location: index.php?controller=system&action=indexContact');
                exit();
            }
        }

        $this->content = $this->render('views/systems/contacts/createContact.php');

        require_once 'views/layouts/main.php';
    }

    public function updateContact() {

        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header("Location: index.php?controller=system&action=indexContact");
            exit();
        }

        $id = $_GET['id'];
        $contact_model = new System();
        $contacts = $contact_model->getByIdContact($id);
        if (isset($_POST['submit'])) {
            $phone = $_POST['phone'];
            $zalo = $_POST['zalo'];
            $email = $_POST['email'];
            $map = $_POST['map'];
            $company = $_POST['company'];
            $address = $_POST['address'];
            //xử lý validate
            if (empty($phone)) {
                $this->error = 'Phone không được để trống';
            } else if (empty($zalo)) {
                $this->error = 'Zalo không được để trống';
            } else if (empty($email)){
                $this->error = 'Email không được để trống';
            } else if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email không đúng định dạng';
            } else if (empty($map)){
                $this->error = 'Map không được để trống';
            }else if ($_FILES['logo']['error'] == 0) {
                $extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $allow_extensions = ['png', 'jpg', 'jpeg', 'gif'];
                $file_size_mb = $_FILES['favicon']['size'] / 1024 / 1024;
                $file_size_mb = round($file_size_mb, 2);
                if (!in_array($extension, $allow_extensions)) {
                    $this->error = 'Phải upload avatar dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được lớn hơn 2Mb';
                }
            }else if ($_FILES['favicon']['error'] == 0) {
                $extension = pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $allow_extensions = ['png', 'jpg', 'jpeg', 'gif'];
                $file_size_mb = $_FILES['favicon']['size'] / 1024 / 1024;
                $file_size_mb = round($file_size_mb, 2);
                if (!in_array($extension, $allow_extensions)) {
                    $this->error = 'Phải upload avatar dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được lớn hơn 2Mb';
                }
            } else if (empty($company)){
                $this->error = 'Company không được để trống';
            } else if (empty($address)){
                $this->error = 'Address không được để trống';
            }

            //xủ lý lưu dữ liệu khi biến error rỗng
            if (empty($this->error)) {
                $filename = '';
                //xử lý upload ảnh nếu có
                if ($_FILES['logo']['error'] == 0) {
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }

                    $filename = time() . '-logo-' . $_FILES['logo']['name'];
                    move_uploaded_file($_FILES['logo']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                $filename2 = '';
                //xử lý upload ảnh nếu có
                if ($_FILES['favicon']['error'] == 0) {
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }

                    $filename2 = time() . '-favicon-' . $_FILES['favicon']['name'];
                    move_uploaded_file($_FILES['favicon']['tmp_name'], $dir_uploads . '/' . $filename2);
                }
                $contact_model->phone = $phone;
                $contact_model->zalo = $zalo;
                $contact_model->email = $email;
                $contact_model->map = $map;
                $contact_model->logo = $filename;
                $contact_model->favicon = $filename2;
                $contact_model->company = $company;
                $contact_model->address = $address;
                $contact_model->updated_at = date('Y-m-d H:i:s');
                $is_insert = $contact_model->updateContact($id);
                if ($is_insert) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=system&action=indexContact');
                exit();
            }
        }

        $this->content = $this->render('views/systems/contacts/updateContact.php',[
            'contacts' => $contacts,
        ]);

        require_once 'views/layouts/main.php';
    }

    public function deleteContact() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=system&action=indexContact');
            exit();
        }

        $id = $_GET['id'];
        $slide_model = new System();
        $is_delete = $slide_model->deleteContact($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=system&action=indexContact');
        exit();
    }

}