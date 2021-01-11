<?php
//views/homes/index.php
require_once 'helpers/Helper.php';
?>
<?php
if (isset($slideTop)) {
    foreach ($slideTop AS $value)
        $value['id'];
}
?>
<div class="accordion" id="myaccordion">
    <div class="card">
        <div class="card-body collapse show" data-toggle="collapse" aria-expanded="false" id="noidungcard1">
            <p class="card-text">
                <div class="bd-example">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <?php foreach ($slideBars

                            AS $slideBar): ?>
                            <?php if ($slideBar['id'] == $value['id']): ?>
                            <div class="carousel-item active">
                                <img src="../backend/assets/uploads/<?php echo $slideBar['slidebar'] ?> "
                                     class="d-block w-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Điện máy giá rẻ</h5>
            <p>Niềm vui của bạn, hạnh phúc của chúng tôi</p>
        </div>
    </div>
    <?php else: ?>
        <div class="carousel-item">
            <img src="../backend/assets/uploads/<?php echo $slideBar['slidebar'] ?> " class="d-block w-100">
            <div class="carousel-caption d-none d-md-block">
                <h5>Điện máy giá rẻ</h5>
                <p>Niềm vui của bạn, hạnh phúc của chúng tôi</p>
            </div>
        </div>
    <?php endif; ?>
    <?php endforeach; ?>
                    </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </p>
        </div>
    </div>
</div>

<!-- slider Area End-->
<!-- Latest Products Start -->
<section class="latest-product-area padding-bottom">
    <div class="container">

        <style>
            @media (max-width: 767px) {
                .col-sm-6 {
                    width: 50% !important;
                }

                .centerSearch {
                    width: 100% !important;
                }

                .button {
                    background-color: #58257b;
                    border: none;
                    color: white;
                    padding: 7px 23px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 13px;
                    margin: 4px 2px;
                    -webkit-transition-duration: 0.4s;
                    transition-duration: 0.4s;
                    cursor: pointer;
                    border-radius: 4px;
                }

                .product-list-title {
                    height: 78px;
                    padding: 6px 7px 0px 7px;
                    font-family: 'Font Awesome 5 Brands';
                    font-size: 13px;
                }

                .button1 {
                    background-color: white;
                    color: black;
                    border: 2px solid #dc4223;
                }

                .button1:hover {
                    background-color: #ff330a;
                    color: white;
                }
            }
        </style>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-12">
                <?php foreach ($categoriesHome AS $categoryHome): ?>
                    <div style="border: 1px solid grey ;border-radius: 8px;margin-bottom: 18px">
                        <div style="background: #1ab7ea; border-top-left-radius: 8px; border-top-right-radius:8px;padding: 7px 25px ; color: rgba(232,240,235,1)">
                            <i class="fa fa-bars" style="color: black; padding-right: 5px"></i> <strong
                                style="text-transform: capitalize"><?php echo $categoryHome['name'] ?></strong>
                        </div>
                        <?php foreach ($category_child_homes AS $category_child_home): ?>
                            <?php if ($category_child_home['category_id'] == $categoryHome['id']): ?>
                                <div style="border-top: 1px darkgrey dashed; padding: 5px 20px">
                                    <a href="index.php?controller=home&action=detail&id=<?php echo $category_child_home['id']?>"><?php echo $category_child_home['name'] ?></a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
                <div style="border: 1px solid grey ;border-radius: 8px;margin-bottom: 18px">
                    <div style="background: #1ab7ea; border-top-left-radius: 8px; border-top-right-radius:8px;padding: 7px 25px ; color: rgba(232,240,235,1)">
                        <i class="fa fa-bars" style="color: black; padding-right: 5px; "></i> <strong
                            style="text-transform: capitalize">Hỗ trợ trực tuyến</strong>
                    </div>
                    <?php foreach ($services AS $service): ?>
                        <div style="padding: 10px 20px;border-top: 1px darkgrey dashed;">
                            <!--                            <hr style="width: 70%;margin-top: 3px; margin-bottom: 3px">-->
                            <div style="text-align: center">
                                <strong style="color: #ff524f; text-transform: uppercase"><?php echo $service['category']; ?></strong>
                            </div>
                            <hr style="width: 70%;margin-top: 3px">
                            <div style="padding-left: 15px; text-align: center">
                                <a href="//zalo.me/0<?php echo $service['zalo'] ?>" target="_blank">
                                    <img src="assets/img//lienHe/icon-zalo.png" class="icon-service-img-home"/>
                                    <strong><?php echo $service['email'] ?></strong>
                                </a>
                            </div>
                            <div style="text-align: center">
                                <a href="tel:0<?php echo $service['phone'] ?>">
                                    <img src="assets/img//lienHe/icon-phone.png" class="icon-service-img-home"/>
                                    <span>0<?php echo $service['phone'] ?></span>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div style="border: 1px solid grey ;border-radius: 8px;margin-bottom: 18px; width: 100%">
                    <div style="background: #1ab7ea; border-top-left-radius: 8px; border-top-right-radius:8px;padding: 7px 25px ; color: rgba(232,240,235,1)">
                        <i class="fa fa-bars" style="color: black; padding-right: 5px"></i> <strong
                            style="text-transform: capitalize">Fanpage Facebook</strong>
                    </div>
                    <div style="max-width: 100%">
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous"
                                src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0"
                                nonce="cybEekKn"></script>
                        <div style="width: 100% " class="fb-page" data-href="https://www.facebook.com/BanTiviGiaReNhat/"
                             data-tabs="timeline" data-width="" data-height="70" data-small-header="false"
                             data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/BanTiviGiaReNhat/" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/BanTiviGiaReNhat/">Ti vi giá rẻ</a></blockquote>
                        </div>
                    </div>
                </div>
                <div style="border: 1px solid grey ;border-radius: 8px;margin-bottom: 18px">
                    <div style="background: #1ab7ea; border-top-left-radius: 8px; border-top-right-radius:8px;padding: 7px 25px ; color: rgba(232,240,235,1)">
                        <i class="fa fa-bars" style="color: black; padding-right: 5px"></i> <strong
                            style="text-transform: capitalize">Bài viết</strong>
                    </div>
                    <?php if (isset($newTops)):?>
                        <?php foreach ($newTops AS $newTop):
                            $slug = Helper::getSlug($newTop['title']);
                            $product_link = "chi-tiet-tin/$slug/" . $newTop['id'] . ".html";
                            ?>
                            <div style="border-top: 1px darkgrey dashed; padding: 5px 20px">
                                <div class="media post_item">
                                    <img src="../backend/assets/uploads/<?php echo $newTop['avatar'] ?>" height="50" alt="post">
                                    <div class="media-body" style="padding-left: 10px">
                                        <a href="<?php echo $product_link; ?>">
                                            <span style="font-size: 11px"><?php echo $newTop['title']?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12">
                    <style>
                        .abcc{
                            background: #21bbff;padding: 10px;width: 25%; color: white;
                            border-top-right-radius: 25px;
                        }
                        @media (max-width: 676px) {
                            .abcc{
                                background: #21bbff;padding: 10px;width: 50%; color: white;
                                border-top-right-radius: 25px;
                            }
                        }
                    </style>
                    <div class="abcc">
                        <?php echo $category_child_name[0]['name'];?>
                    </div>
                <div style="background: #21bbff">
                    <hr style="color: #21bbff; height: 2px!important; margin-top: 3px">
                </div>
                <?php if (empty($_POST['search'])): ?>
                    <div class="tab-content" id="nav-tabContent">
                        <!-- card one -->
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab">
                            <div class="row">
                                <?php if (!empty($products)): ?>
                                    <?php foreach ($products AS $product):
                                        $slug = Helper::getSlug($product['title']);
                                        $product_link = "chi-tiet-san-pham/$slug/" . $product['id'] . ".html";
                                        $product_cart_add = "them-vao-gio-hang/" . $product['id'] . ".html";
                                        ?>
                                        <div class="service-link col-md-3 col-sm-6 col-xs-6">
                                            <div class="single-product mb-60">
                                                <div class="product-img secondary-img ">
                                                    <img src="../backend/assets/uploads/<?php echo $product['avatar'] ?>"
                                                         title="<?php echo $product['title'] ?>"
                                                         alt="<?php echo $product['title'] ?>" class="img-home-main">
                                                </div>
                                                <div class="product-caption">
                                                    <div class="price" onclick="tai_lai_trang()">
                                                        <ul>
                                                            <li class="discount add-to-favs"
                                                                data-fav="<?php echo $product['id'] ?>">
                                                                <?php if (isset($_SESSION['favs']))
                                                                    $favs = $_SESSION['favs'];
                                                                ?>
                                                                <?php $dem = 0;
                                                                $permission_text = 'pointer-events: none; cursor: default; opacity: 0.9;'; ?>
                                                                <?php if (isset($favs)): ?>
                                                                    <?php foreach ($favs AS $fav): ?>

                                                                        <?php if ($fav['name'] == $product['title']): ?>
                                                                            <?php $dem++; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                                <a title="Thêm vào mục ưa thích"
                                                                   style="<?php if ($dem != 0) echo $permission_text; ?>"><i
                                                                        style="font-size:24px;cursor: pointer; <?php if ($dem == 0) echo "color: black"; ?>"
                                                                        class="fab fa-gratipay"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <h4 class="product-list-title">
                                                        <a href="<?php echo $product_link; ?>"><?php echo $product['title'] ?></a>
                                                    </h4>
                                                    <div class="price">
                                                        <ul>
                                                            <li style="color: red"><?php echo number_format($product['price']) ?>
                                                                ₫
                                                            </li>
                                                        </ul>
                                                        <span class="add-to-cart button button1"
                                                              data-id="<?php echo $product['id']; ?>">
                                                        <a style="color: inherit">Thêm vào giỏ</a>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else:?>
                                    <div style="padding-left: 20px; color: red">Sản phẩm chưa cập nhật...</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php echo $pages;?>
                <?php else: ?>
                    <div class="tab-content" id="nav-tabContent">
                        <!-- card one -->
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab">
                            <div class="row">
                                <?php if (!empty($productSearches)): ?>
                                    <?php foreach ($productSearches AS $productSearch):
                                        $slug = Helper::getSlug($productSearch['title']);
                                        $product_link = "chi-tiet-san-pham/$slug/" . $productSearch['id'] . ".html";
                                        $product_cart_add = "them-vao-gio-hang/" . $productSearch['id'] . ".html";
                                        ?>
                                        <div class="service-link col-md-3 col-sm-6 col-xs-6">
                                            <div class="single-product mb-60">
                                                <div class="product-img secondary-img ">
                                                    <img src="../backend/assets/uploads/<?php echo $productSearch['avatar'] ?>"
                                                         title="<?php echo $productSearch['title'] ?>"
                                                         alt="<?php echo $productSearch['title'] ?>"
                                                         class="img-home-main">
                                                </div>
                                                <div class="product-caption">
                                                    <div class="price" onclick="tai_lai_trang()">
                                                        <ul>
                                                            <li class="discount add-to-favs"
                                                                data-fav="<?php echo $productSearch['id'] ?>">
                                                                <?php if (isset($_SESSION['favs']))
                                                                    $favs = $_SESSION['favs'];
                                                                ?>
                                                                <?php $dem = 0;
                                                                $permission_text = 'pointer-events: none; cursor: default; opacity: 0.9;'; ?>
                                                                <?php if (isset($favs)): ?>
                                                                    <?php foreach ($favs AS $fav): ?>

                                                                        <?php if ($fav['name'] == $productSearch['title']): ?>
                                                                            <?php $dem++; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                                <a title="Thêm vào mục ưa thích"
                                                                   style="<?php if ($dem != 0) echo $permission_text; ?>"><i
                                                                        style="font-size:24px;cursor: pointer; <?php if ($dem == 0) echo "color: black"; ?>"
                                                                        class="fab fa-gratipay"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <h4 class="product-list-title">
                                                        <a href="<?php echo $product_link; ?>"><?php echo $productSearch['title'] ?></a>
                                                    </h4>
                                                    <div class="price">
                                                        <ul>
                                                            <li style="color: red"><?php echo number_format($productSearch['price']) ?>
                                                                ₫
                                                            </li>
                                                        </ul>
                                                        <span class="add-to-cart button button1"
                                                              data-id="<?php echo $productSearch['id']; ?>">
                                                        <a style="color: inherit">Thêm vào giỏ</a>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- End Nav Card -->
            </div>
        </div>

    </div>
</section>
<!-- Latest Products End -->
<!-- Best Product Start -->
<div class="best-product-area lf-padding">
    <div class="product-wrapper bg-height" style="background-image: url('../assets/img/categori/card.png')">
        <div class="container position-relative">
            <div class="row justify-content-between align-items-end">
                <div class="product-man position-absolute  d-none d-lg-block">
                    <img src="assets/img/categori/card-man.png" alt="">
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 d-none d-lg-block">
                    <div class="vertical-text">
                        <span>Manz</span>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="best-product-caption">
                        <h2>Find The Best Product<br> from Our Shop</h2>
                        <p>Designers who are interesten creating state ofthe.</p>
                        <a href="#" class="black-btn">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shape -->
    <div class="shape bounce-animate d-none d-md-block">
        <img src="assets/img/categori/card-shape.png" alt="">
    </div>
</div>
<!-- Best Product End-->
<!-- Best Collection Start -->
<div class="best-collection-area section-padding2">
    <div class="container">
        <div class="row d-flex justify-content-between align-items-end">
            <!-- Left content -->
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="best-left-cap">
                    <h2>Best Collection of This Month</h2>
                    <p>Designers who are interesten crea.</p>
                    <a href="#" class="btn shop1-btn">Shop Now</a>
                </div>
                <div class="best-left-img mb-30 d-none d-sm-block">
                    <img src="assets/img/collection/collection1.png" alt="">
                </div>
            </div>
            <!-- Mid Img -->
            <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                <div class="best-mid-img mb-30 ">
                    <img src="assets/img/collection/collection2.png" alt="">
                </div>
            </div>
            <!-- Riht Caption -->
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="best-right-cap ">
                    <div class="best-single mb-30">
                        <div class="single-cap">
                            <h4>Menz Winter<br> Jacket</h4>
                        </div>
                        <div class="single-img">
                            <img src="assets/img/collection/collection3.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="best-right-cap">
                    <div class="best-single mb-30">
                        <div class="single-cap active">
                            <h4>Menz Winter<br>Jacket</h4>
                        </div>
                        <div class="single-img">
                            <img src="assets/img/collection/collection4.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="best-right-cap">
                    <div class="best-single mb-30">
                        <div class="single-cap">
                            <h4>Menz Winter<br> Jacket</h4>
                        </div>
                        <div class="single-img">
                            <img src="assets/img/collection/collection5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Best Collection End -->
<!-- Latest Offers Start -->
<div class="latest-wrapper lf-padding">
    <div class="latest-area latest-height d-flex align-items-center"
         data-background="assets/img/collection/latest-offer.png">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-xl-5 col-lg-5 col-md-6 offset-xl-1 offset-lg-1">
                    <div class="latest-caption">
                        <h2>Get Our<br>Latest Offers News</h2>
                        <p>Subscribe news latter</p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 ">
                    <div class="latest-subscribe">
                        <form action="#">
                            <input type="email" placeholder="Your email here">
                            <button>Shop Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- man Shape -->
        <div class="man-shape">
            <img src="assets/img/collection/latest-man.png" alt="">
        </div>
    </div>
</div>
<!-- Latest Offers End -->
<!-- Shop Method Start-->
<div class="shop-method-area section-padding30">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-method mb-40">
                    <i class="ti-package"></i>
                    <h6>Free Shipping Method</h6>
                    <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-method mb-40">
                    <i class="ti-unlock"></i>
                    <h6>Secure Payment System</h6>
                    <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-method mb-40">
                    <i class="ti-reload"></i>
                    <h6>Secure Payment System</h6>
                    <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Method End-->
<!-- Gallery Start-->
<div class="gallery-wrapper lf-padding">
    <div class="gallery-area">
        <div class="container-fluid">
            <div class="row">
                <div class="gallery-items">
                    <img src="assets/img/gallery/gallery1.jpg" width="100%" alt="">
                </div>
                <div class="gallery-items">
                    <img src="assets/img/gallery/gallery2.jpg" width="100%" alt="">
                </div>
                <div class="gallery-items">
                    <img src="assets/img/gallery/gallery3.jpg" width="100%" alt="">
                </div>
                <div class="gallery-items">
                    <img src="assets/img/gallery/gallery4.jpg" width="100%" alt="">
                </div>
                <div class="gallery-items">
                    <img src="assets/img/gallery/gallery5.jpg" width="100%" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Gallery End-->
