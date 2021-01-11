<?php
$year = '';
$username = '';
$jobs = '';
$avatar = '';

if(!isset($_SESSION))
{
    session_start();
}
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']['username'];
    $jobs = $_SESSION['user']['jobs'];
    $avatar = $_SESSION['user']['avatar'];
    $permission = $_SESSION['user']['permission'];
    $year = date('Y', strtotime($_SESSION['user']['created_at']));
}
$permission_text ='';
if ($permission == 1 || $permission == 0){
    $permission_text = 'disabled';
}
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php?controller=home&action=index" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        <li class="dropdown user user-menu" style="margin-top: 10px">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="assets/uploads/<?php echo $avatar; ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $username; ?></span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <img src="assets/uploads/<?php echo $avatar; ?>" class="img-circle" alt="User Image">

                    <p>
                        <?php echo $username . ' - ' . $jobs; ?>
                        <!--Phan VĂn Chính - Web Developer-->
                        <small>Thành viên từ năm <?php echo $year; ?></small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                        <a href="index.php?controller=user&action=logout" class="btn btn-default btn-flat">Sign
                            out</a>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="https://i.imgur.com/exAeqpn.png" alt="Logo" class="brand-image img-circle"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="assets/uploads/<?php echo $avatar; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $username; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="index.php?controller=home&action=index" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="nav-icon fas fa-th"></i> <span style="padding-right: 82px ">Danh mục</span></></a>
                        <div class="dropdown-menu" style="width: 100%; padding: 0; border-radius: 10px">
                            <a class="dropdown-item" style="color: white; background: #494E54; padding: 10px 20px" href="index.php?controller=category&action=index"><i class="fas fa-th-list" style="padding-right: 5px"></i>  Danh mục cha</a>
                            <a class="dropdown-item" style="color: white; background: #494E54;padding: 10px 20px" href="index.php?controller=category&action=indexChild"><i class="fas fa-list-alt" style="padding-right: 5px"></i>  Danh mục con</a>
                        </div>
                    </li>
                </li>
                <li class="nav-item has-treeview">
                    <a href="index.php?controller=product&action=index" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Sản phẩm
                            <span class="badge badge-info right"><?php echo $this->countProductTotal?></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <span style="padding-right: 82px ">
                            Đơn hàng
                            <span class="badge badge-danger right" style="float: right"><?php echo $this->orderNews?></span>
                        </span>
                    </a>
                    <div class="dropdown-menu" style="width: 100%; padding: 0; border-radius: 10px">
                        <a class="dropdown-item" style="color: white; background: #494E54; padding: 10px 20px" href="index.php?controller=order&action=index"><i class="fas fa-shopping-basket" style="padding-right: 5px"></i>
                            Đơn hàng
                            <span class="badge badge-dark right" style="float: right"><?php echo $this->orderOld?></span>
                        </a>
                        <a class="dropdown-item" style="color: white; background: #494E54;padding: 10px 20px" href="index.php?controller=order&action=indexOrderNew"><i class="fas fa-shopping-bag" style="padding-right: 5px"></i>
                            Đơn hàng mới
                            <span class="badge badge-danger right" style="float: right"><?php echo $this->orderNews?></span>
                        </a>
                    </div>
                </li>
                </li>
                <li class="nav-item">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="nav-icon fas fa-edit"></i> <span style="padding-right: 99px ">Bài viết</span></i></a>
                        <div class="dropdown-menu" style="width: 100%; padding: 0; border-radius: 10px">
                            <a class="dropdown-item" style="color: white; background: #494E54; padding: 10px 20px" href="index.php?controller=category&action=indexNew"><i class="fas fa-layer-group" style="padding-right: 5px"></i>&nbsp;Danh mục</a>
                            <a class="dropdown-item" style="color: white; background: #494E54; padding: 10px 20px" href="index.php?controller=new&action=index"><i class="fas fa-paste" style="padding-right: 5px"></i>
                                Bài viết
                                <span class="badge badge-warning right" style="float: right"><?php echo $this->countNewTotal?></span>
                            </a>
                        </div>
                    </li>
                </li>
                <li class="nav-item has-treeview">
                    <a href="index.php?controller=user&action=index" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Thành viên
                            <span class="badge badge-light right" style="float: right"><?php echo $this->userTotal?></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="index.php?controller=customer&action=index" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Khách hàng
                            <span class="badge badge-secondary right" style="float: right"><?php echo $this->customerTotal?></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="index.php?controller=contact&action=index" class="nav-link">
                        <i class="nav-icon far fa-comments"></i>
                        <p>
                            Liên hệ
                            <span class="badge badge-warning right" style="float: right"><?php echo $this->contactNews?></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="index.php?controller=service&action=index" class="nav-link">
                        <i class="nav-icon fas fa-life-ring"></i>
                        <p>
                            Hỗ trợ trực tuyến
                            <span class="badge badge-light right" style="float: right"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " <?php echo $permission_text;?> data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="nav-icon fas fa-cog"></i> <span style="padding-right: 88px ">Hệ thống</span></i></a>
                        <div class="dropdown-menu" style="width: 100%; padding: 0; border-radius: 10px">
                            <a class="dropdown-item" style="color: white; background: #494E54; padding: 10px 20px" href="index.php?controller=system&action=index"><i class="fas fa-layer-group" style="padding-right: 5px"></i>&nbsp;Slide Main</a>
                            <a class="dropdown-item" style="color: white; background: #494E54; padding: 10px 20px" href="index.php?controller=system&action=indexContact"><i class="fas fa-paste" style="padding-right: 5px"></i> Contacts</a>
                        </div>
                    </li>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?controller=home&action=index">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Messaeg Wrapper. Contains messaege error and success -->
<div class="message-wrap content-wrap content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($this->error)): ?>
            <div class="alert alert-danger">
                <?php
                echo $this->error;
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>
        <!--        <div class="alert alert-danger">Lỗi validate</div>-->
        <!--        <p class="alert alert-success">Thành công</p>-->
    </section>
</div>
