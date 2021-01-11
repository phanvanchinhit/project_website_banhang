<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container">
        <div class=" d-sm-block mb-5 pb-4" style="max-width: 100%">
            <style>
                iframe{
                    width: 100%;
                }
            </style>
            <?php echo $this->systemContact['0']['map'];?>
        </div>


        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Thông tin liên hệ</h2>
            </div>
            <div class="col-lg-8">
                <form class="form-contact contact_form" action="" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="fullName">Name</label>
                                <input name="fullName" type="text" id="fullName" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input name="phone" type="number" id="phone" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" type="email" id="email" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group mt-5" style="padding-left: 15px">
                            <button type="submit" class="button button-contactForm boxed-btn" name="submit">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Hai Bà Trưng, Hà Nội</h3>
                        <p>34/182 Dương Văn Bé</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3><a href="tel:0<?php echo $this->systemContact['0']['phone']?>">0<?php echo $this->systemContact['0']['phone']?></a></h3>
                        <p>Làm việc tất cả các ngày trong tuần</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3><a href="mailto:<?php echo $this->systemContact['0']['email']?>"><?php echo $this->systemContact['0']['email']?></a></h3>
                        <p>Gửi cho chúng tôi câu hỏi của bạn bất cứ lúc nào!!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

<!-- Gallery Start-->
<div class="d-none gallery-wrapper lf-padding">
    <div class="gallery-area">
        <div class="container-fluid">
            <div class="row">
                <div class="gallery-items">
                    <img src="assets/img/gallery/gallery1.jpg" alt="">
                </div>
                <div class="gallery-items">
                    <img src="assets/img/gallery/gallery2.jpg" alt="">
                </div>
                <div class="gallery-items">
                    <img src="assets/img/gallery/gallery3.jpg" alt="">
                </div>
                <div class="gallery-items">
                    <img src="assets/img/gallery/gallery4.jpg" alt="">
                </div>
                <div class="gallery-items">
                    <img src="assets/img/gallery/gallery5.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Gallery End-->