<!-- Preloader Start -->
<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/logo.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <style>
        .flag img{
            /*width: 10%;*/
            width: auto;
        }
        @media (max-width: 991px) {
            .d-xl-block{
                width: max-content;
            }
        }
        @media (min-width: 992px) and (max-width: 1200px) {
            .d-xl-block{
                width: max-content;
            }
        }
        @media (max-width: 767px) {
            .logoHeader a img{
                width: 16% !important;
            }
        }



    </style>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top top-bg d-none d-lg-block">
                <div class="container-fluid">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left d-flex">
                                <div class="flag">
                                    <img src="https://i.imgur.com/lFknA5V.png" width="10%" alt="" height="30">
                                </div>
                                <div class="select-this">
                                    <form action="#">
                                        <div class="select-itms">
                                            <select name="select" id="select1">
                                                <option value="">VN</option>
                                                <option value="">TQ</option>
                                                <option value="">CDA</option>
                                                <option value="">USD</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <ul class="contact-now">
                                    <li>+84<?php echo $this->systemContact['0']['phone'];?></li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul>
                                    <?php
                                    if (isset($_SESSION['user'])) {
                                        $id = $_SESSION['user']['id'];
                                        $userDetailLink = "detail_customer/$id.html";
                                    }
                                    ?>
                                    <li><a href="<?php echo $userDetailLink;?>">Tài khoản</a></li>
                                    <li><a href="contact.html">Hỗ trợ</a></li>
                                    <li><a href="danh-sach-san-pham.html">Mua sắm</a></li>
                                    <li><a href="gio-hang-cua-ban.html">Giỏ hàng</a></li>
                                    <li><a href="thanh-toan.html">Thanh toán</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3 logoHeader" >
                            <div class="logo">
                                <a href="index.php"> <img src="../backend/assets/uploads/<?php echo $this->systemContact['0']['logo']?>" height="40" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7 col-md-7 col-sm-5">
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation" style="margin-left: 10px">
                                        <li><a href="index.php">Trang chủ</a></li>
                                        <li><a href="#">Danh mục</a>
                                            <ul class="submenu">
                                                <?php foreach ($this->categoriesss AS $category):?>
                                                <li><a href="danh-sach-san-pham.html"> <?php echo $category['name']?></a>
                                                    <ul class="submenu_child">
                                                        <?php foreach ($this->category_childss AS $category_child):?>
                                                            <?php if ($category['id'] == $category_child['category_id']): ?>
                                                            <br>
                                                                <li>
                                                                    <a href="index.php?controller=home&action=detail&id=<?php echo $category_child['id']?>" style="padding: 0px 10px 12px 10px !important; font-size: 14px;">
                                                                        <?php echo $category_child['name'];?>
                                                                    </a>
                                                                </li>
                                                            <?php endif;?>
                                                        <?php endforeach;?>
                                                    </ul>
                                                </li>
                                                <?php endforeach;?>
                                            </ul>
                                        </li>
                                        <li class="hot"><a href="danh-sach-san-pham.html">Sản phẩm</a>
                                        </li>
                                        <li><a href="#">Trang</a>
                                            <ul class="submenu">
                                                <li><a href="login.html">Đăng nhập</a></li>
                                                <li><a href="cart.html">Giỏ hàng</a></li>
                                                <li><a href="<?php echo $userDetailLink;?>">Tài khoản</a></li>
                                                <li><a href="checkout.html">Thanh toán</a></li>
                                                <li><a href="index.php?controller=new&action=index">Bài viết</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li>
                                            <div class="catalog"  data-toggle="collapse" data-target="#noidungcard1" aria-expanded="true"
                                                 data-parent="#myaccordion">
                                                Catalog
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 col-md-3 col-sm-3 fix-card" style="top: 10px">
                            <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
<!--                                d-none-->
                                <li class="d-xl-block search_left">
                                    <form action="" method="post">
                                        <div class="form-box f-right ">
                                            <input type="text" name="search" placeholder="Search">
                                            <div class="search-icon">
                                                <button type="submit" name="submitSearch" value="submitSearch" style="border: 0; background: #FFFFFF"><i class="fas fa-search special-tag"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li class="d-xl-block">
                                    <div class="favorit-items">
                                        <a href="san-pham-yeu-thich.html">
                                            <i class="far fa-heart">
                                                <?php
                                                $favs_total = 0;
                                                if (isset($_SESSION['favs'])) {
                                                    foreach ($_SESSION['favs'] AS $favs) {
                                                         $favs_total += $favs['quantity'];
                                                    }
                                                }
                                                ?>
                                                <span class="favs-amount">
                                                        <?php echo $favs_total; ?>
                                                </span>
                                            </i>
                                            <br>
                                            <span class="ajax-message-favs"></span>
                                        </a>
                                    </div>
                                </li>
                                <li style="padding-left: 0px">
                                    <div class="shopping-card">
                                        <a href="gio-hang-cua-ban.html">
                                            <i class="fas fa-shopping-cart">
                                                <?php
                                                    $cart_total = 0;
                                                    if (isset($_SESSION['cart'])) {
                                                        foreach ($_SESSION['cart'] AS $cart) {
                                                           $cart_total += $cart['quantity'];
                                                        }
                                                    }
                                                ?>
                                                <span class="cart-amount">
                                                    <?php echo $cart_total; ?>
                                                </span>
                                            </i>
                                            <br>
                                            <span class="ajax-message"></span>
                                        </a>

                                    </div>

                                </li>
                                <li class="d-none d-lg-block">
                                    <?php if (!isset($_SESSION['user']['username'])): ?>
                                    <a href="login.html" class="btn_1">Sign in</a>
                                    <?php else: ?>
                                    <a href="logout.html" class="btn_1" style="font-size: 12px; font-weight: 400; border: 1px solid #2577FD">
                                        <?php echo $_SESSION['user']['username']?>
                                        <br>Sign out
                                    </a>
                                    <?php endif; ?>
                                </li>
                            </ul>

                        </div>

<!--                        Mobile Menu-->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Header End -->
</header>

