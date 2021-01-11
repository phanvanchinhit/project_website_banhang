<?php
require_once 'helpers/Helper.php';
?>

<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Sản phẩm yêu thích</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!-- product list part start-->
<div class="container">

<div class="tab-content" id="nav-tabContent" style="padding-top: 50px">
    <!-- card one -->
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="row">
            <?php if (isset($_SESSION['favs'])):?>
                <?php
                foreach ($_SESSION['favs'] AS $product_id => $favs):
                ?>
                    <div class="service-link col-md-3 col-sm-6 col-xs-12">
                        <div class="single-product mb-60">
                            <div class="product-img secondary-img ">
                                <img src="../backend/assets/uploads/<?php echo $favs['avatar'] ?>" alt="<?php echo $favs['name'] ?>" title="<?php echo $favs['name'] ?>" class="img_produc_list">
                            </div>
                            <div class="product-caption">
                                <div class="price">
                                    <ul>
                                        <li class="discount" data-fav="<?php echo $product['id']?>">
                                            <a href="bo-thich-san-pham/<?php echo $product_id;?>.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <h4 class="product-list-title">
                                    <?php
                                    //Khai báo link rewrite cho trang chi tiết sản phẩm
                                    $slug = Helper::getSlug($favs['name']);
                                    $product_link = "chi-tiet-san-pham/$slug/$product_id.html";
                                    ?>
                                    <a href="<?php echo $product_link; ?>"><?php echo $favs['name'] ?></a>
                                </h4>
                                <div class="price">
                                    <ul>
                                        <li style="color: red"><?php echo number_format($favs['price']) ?></li>
                                        <li class="discount" data-fav="<?php echo $product['id']?>">
                                            <a href="bo-thich-san-pham/<?php echo $product_id;?>.html">UnLike</a>
                                        </li>
                                    </ul>
                                    <span class="add-to-cart btn_1" data-id="<?php echo $product['id']; ?>">
                                                <a href="#" style="color: inherit">Thêm vào giỏ</a>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php else: ?>

                    <div class="cartItem favouriteLikeItem">
                        <div style="width: 35%" class="col-xl-5 col-lg-12 col-md-12">
                            <img src="https://i.imgur.com/FwTv55z.jpg" class="favouriteImg" height="300"/>
                        </div>
                        <div style="margin-top: 50px; padding-left: 50px" class="col-xl-7 col-lg-12 col-md-12">
                            <h3 style="color: red">
                                Sản phẩm yêu thích của bạn đang trống
                            </h3>
                            <h5 style="padding-top: 20px">
                                Ban có thể tiếp tục mua sắm bằng việc click vào Continue Shopping
                            </h5>
                            <div class="checkout_btn_inner">
                                <br>
                                <a class="btn_1" href="index.php">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
<!-- product list part end-->

<!-- client review part here -->
<section class="client_review">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="client_review_slider owl-carousel">
                    <div class="single_client_review">
                        <div class="client_img">
                            <img src="assets/img/client.png" alt="#">
                        </div>
                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                        <h5>- Micky Mouse</h5>
                    </div>
                    <div class="single_client_review">
                        <div class="client_img">
                            <img src="assets/img/client_1.png" alt="#">
                        </div>
                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                        <h5>- Micky Mouse</h5>
                    </div>
                    <div class="single_client_review">
                        <div class="client_img">
                            <img src="assets/img/client_2.png" alt="#">
                        </div>
                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                        <h5>- Micky Mouse</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- client review part end -->

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

<!-- subscribe part here -->
<section class="subscribe_part section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="subscribe_part_content">
                    <h2>Get promotions & updates!</h2>
                    <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                    <div class="subscribe_form">
                        <input type="email" placeholder="Enter your mail">
                        <a href="#" class="btn_1">Subscribe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subscribe part end -->

