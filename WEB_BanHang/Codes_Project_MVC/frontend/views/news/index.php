
<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Blog</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->
<?php
require_once 'helpers/Helper.php';
?>
<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php if (isset($news)):?>
                        <?php foreach ($news AS $new):
                            $slug = Helper::getSlug($new['title']);
                            $product_link = "chi-tiet-tin/$slug/" . $new['id'] . ".html";
                            ?>
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="../backend/assets/uploads/<?php echo $new['avatar'] ?>" alt="">
                                    <a href="<?php echo $product_link; ?>" class="blog_item_date">
                                        <h3>
                                            <?php
                                                $days= date('d', strtotime($new['created_at']));
                                                echo $days;
                                            ?>
                                        </h3>
                                        <p>
                                            <?php
                                                $months= date('m', strtotime($new['created_at']));
                                                $dateObj   = DateTime::createFromFormat('!m', $months);
                                                $monthName = $dateObj->format('F');
                                            echo substr($monthName, 0, 3);
                                            //echo $monthName;
                                            ?>
                                        </p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="<?php echo $product_link; ?>">
                                        <h2><?php echo $new['title']?></h2>
                                    </a>
                                    <p>
                                        <?php echo $new['summary']?>
                                    </p>
                                    <ul class="blog-info-link">
                                        <li><a><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                        <li>
                                            <a href="#<?php echo $new['id'];?>" aria-expanded="false" data-toggle="collapse">
                                                <i class="fa fa-comments"></i>Comments
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="collapse mt-4" id="<?php echo $new['id'];?>">
                                        <div class="card card-body" style="background: #90cede">
                                            <p class="card-text">
                                            <div id="fb-root"></div>
                                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0" nonce="DQimHMdP"></script>
                                            <div class="fb-comments" data-href="https://www.facebook.com/BanTiviGiaReNhat" data-numposts="5" data-width=""></div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach;?>
                    <?php endif;?>
                    <?php echo $pages;?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form method="post" action="">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" name="title" class="form-control" placeholder='Search Keyword'
                                           onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                        <button class="btns" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit" name="submit">Search</button>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                            <?php if(isset($categories)):?>
                                <?php foreach ($categories AS $category):?>
                                    <?php $dem=0;?>
                                    <?php foreach ($news AS $new):?>
                                    <?php if ($new['category_id']== $category['id']) {
                                        $dem++;
                                    }
                                    ?>
                                    <?php endforeach;?>
                                    <li>
                                        <a href="#" class="d-flex">
                                            <p><?php echo $category['name'];?></p>
                                            <p>(<?php echo $dem;?>)</p>
                                        </a>
                                    </li>
                                <?php endforeach;?>
                            <?php endif;?>
                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        <?php if (isset($newTops)):?>
                            <?php foreach ($newTops AS $newTop):
                                $slug = Helper::getSlug($newTop['title']);
                                $product_link = "chi-tiet-tin/$slug/" . $newTop['id'] . ".html";
                                ?>
                                <div class="media post_item">
                                    <img src="../backend/assets/uploads/<?php echo $newTop['avatar'] ?>" height="50" alt="post">
                                    <div class="media-body">
                                        <a href="<?php echo $product_link; ?>">
                                            <h3 style="white-space: nowrap; text-overflow: clip;overflow: hidden; width: 100%"><?php echo $newTop['title']?></h3>
                                        </a>
                                        <p>
                                            <?php
                                            $months= date('m', strtotime($newTop['created_at']));
                                            $dateObj   = DateTime::createFromFormat('!m', $months);
                                            $monthName = $dateObj->format('F');
                                            $days= date('d', strtotime($newTop['created_at']));
                                            $years= date('Y', strtotime($newTop['created_at']));
                                            $date = "$monthName $days, $years";
                                            echo $date;
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        <?php endif;?>
                    </aside>
                    <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tag Clouds</h4>
                        <ul class="list">
                            <li>
                                <a href="#">project</a>
                            </li>
                            <li>
                                <a href="#">love</a>
                            </li>
                            <li>
                                <a href="#">technology</a>
                            </li>
                            <li>
                                <a href="#">travel</a>
                            </li>
                            <li>
                                <a href="#">restaurant</a>
                            </li>
                            <li>
                                <a href="#">life style</a>
                            </li>
                            <li>
                                <a href="#">design</a>
                            </li>
                            <li>
                                <a href="#">illustration</a>
                            </li>
                        </ul>
                    </aside>


                    <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Instagram Feeds</h4>
                        <ul class="instagram_row flex-wrap">
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_5.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_6.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_7.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_8.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_9.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_10.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </aside>


                    <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>

                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Subscribe</button>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->