<!--footer-->
<footer>

    <!-- Footer Start-->
    <style>

        @media all and (max-width: 767px) {
            .logoHeaderFooter a img{
                width: 20% !important;
            }
        }



    </style>
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <!-- logo -->
                            <div class="footer-logo logoHeaderFooter">
                                <a href="index.php"><img src="../backend/assets/uploads/<?php echo $this->systemContact['0']['logo']?>" height="40" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>Cái gì không bán được thì tôi không muốn sáng chế. Doanh số là bằng chứng về tính hữu dụng, và tính hữu dụng là thành công</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Thông tin liên hệ</h4>
                            <ul>
                                <li style="text-transform: capitalize"><a><?php echo $this->systemContact['0']['company'];?></a></li>
                                <li><a>Trụ sở chính: <?php echo $this->systemContact['0']['address'];?></a></li>
                                <li>
                                    <a href="tel:0<?php echo $this->systemContact['0']['phone']?>">
                                        Điện thoại: 0<?php echo $this->systemContact['0']['phone'];?>
                                    </a>
                                </li>
                                <li>
                                    <a href="//zalo.me/0<?php echo $this->systemContact['0']['zalo']?>" target="_blank">
                                        Zalo: 0<?php echo $this->systemContact['0']['zalo'];?>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:<?php echo $this->systemContact['0']['email']?>">
                                        Email: <?php echo $this->systemContact['0']['email'];?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Tác vụ</h4>
                            <ul>
                                <?php
                                if (isset($_SESSION['user'])) {
                                    $id = $_SESSION['user']['id'];
                                    $userDetailLink = "detail_customer/$id.html";
                                }
                                ?>
                                <li><a href="<?php echo $userDetailLink;?>">Tài khoản</a></li>
                                <li><a href="login.html">Đăng nhập</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Sản phẩm</h4>
                            <ul>
                                <li><a href="danh-sach-san-pham.html">Tìm sản phẩm</a></li>
                                <li><a href="cart.html">Giỏ hàng</a></li>
                                <li><a href="checkout.html">Thanh toán</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Hỗ trợ</h4>
                            <ul>
                                <li><a href="contact.html">Liên hệ</a></li>
                                <li><a href="index.php?controller=new&action=index">Bài viết</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer bottom -->
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-7">
                    <div class="footer-copy-right">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://facebook.com/t/phanvanchinh2x" target="_blank">pvchinh</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>                   </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5">
                    <div class="footer-copy-right f-right">
                        <!-- social -->
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="overlay"></div>

    <ul class="icon-service-wrap">
        <li data-toggle="tooltip" data-placement="left" title="Gọi ngay cho chúng tôi">
            <a href="tel:0<?php echo $this->systemContact['0']['phone']?>">
                <img src="assets/img//lienHe/icon-phone.png" class="icon-service-img"/>
            </a>
        </li>
        <li data-toggle="tooltip" data-placement="left" title="Chat với chúng tôi qua Zalo">
            <a href="//zalo.me/0<?php echo $this->systemContact['0']['zalo']?>" target="_blank">
                <img src="assets/img//lienHe/icon-zalo.png" class="icon-service-img"/>
            </a>
        </li>
        <li data-toggle="tooltip" data-placement="left" title="Gửi mail cho chúng tôi">
            <a href="mailto:<?php echo $this->systemContact['0']['email']?>">
                <img src="assets/img//lienHe/icon-mail.png" class="icon-service-img"/>
            </a>
        </li>
        <li data-toggle="tooltip" data-placement="left" title="Liên hệ với chúng tôi">
            <a href="contact.html">
                <img src="assets/img//lienHe/icon-map.png" class="icon-service-img"/>
            </a>
        </li>
    </ul>
    <!-- Footer End-->

</footer>

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>

<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="./assets/js/jquery.scrollUp.min.js"></script>
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>

<!-- contact js -->
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function () {
    FB.init({
      xfbml: true,
      version: 'v7.0'
    });
  };

  (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>