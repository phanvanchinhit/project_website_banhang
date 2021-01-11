<?php
require_once 'helpers/Helper.php';
?>
<div class="container">
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
                <div style="width: 100%">
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
        <div class="con-md-9 col-sm-9 col-xs-12">
            <style>
                .product_detail{
                    display: flex;
                }
                .detail-content-wrap{
                    margin-bottom: 40px;
                }
                h1, h2, h3, h4, h5, h6 {
                    font-family: emoji;
                }
                .product-price{
                    color: red;
                    font-size: 16px;
                }
                .product-cart{
                    margin: 25px 0px;
                    /*display: flex;*/
                }
                .product-info{
                    margin-left: 60px;
                }
                img {
                    max-width: 100%;
                }
                .product-image-info{
                    max-width: 45%;
                }
                .product-image-info img{
                    width: 100%;
                }
                .detail-summary{
                    margin-top: 40px;
                    margin-bottom: 30px;
                    background: #5bc0de;
                    border: 1px seashell dashed;
                    padding: 25px;
                    border-radius: 15px;
                }
                .detail-summary ul {
                    padding: 0px 30px;
                }
                .detail-summary h3{
                    color: white;
                }
                .detail-summary ul li {
                    background: white;
                    margin: 7px 0px;
                    padding: 7px 30px;
                    border-radius: 5px;
                }
                @media (max-width: 991px){
                    .product_detail{
                        display: block;
                    }
                    .product-info{
                        margin-left: 0px;
                    }
                    .product-image-info{
                        max-width: 100%;
                    }
                }
            </style>
            <div class="product_detail">
                <div class="product-image-info">
                    <img src="../backend/assets/uploads/<?php echo $product['avatar'] ?>" width="200"
                         title="<?php echo $product['title']; ?>">
                </div>
                <div class="product-info">
                    <h3 class="product-title">
                      <?php echo $product['title']; ?>
                    </h3>
                    <div class="product-price">
                      <?php echo number_format($product['price'], 0, '.', ','); ?>₫
                    </div>
                    <hr>
                    <div class="product-cart">
                        <span>
                            <label for="product-detail-sl" style="margin-top: 20px">Số lượng </label>
                            <input type="number" style="text-align: center;width: 60px;" id="product-detail-sl" value="1" min="0" max="100">
                        </span>
                        <span class="add-to-cart" style="float: right" data-id="<?php echo $product['id']; ?>">
                          <button class="btn_1"><i class="fa fa-cart-plus"></i> Thêm vào giỏ</button>
                        </span>
                    </div>
                    <hr>
                    <div >
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0" nonce="iBBKBxh6"></script>
                        <div class="fb-like" data-href="https://www.facebook.com/BanTiviGiaReNhat" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
                        <div class="fb-share-button" data-href="https://www.facebook.com/BanTiviGiaReNhat" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2FBanTiviGiaReNhat&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                    </div>
                </div>
            </div>

            <!--Timeline items end -->
            <div class="detail-content-wrap">
                <div class="detail-summary">
                    <?php echo $product['summary']; ?>
                </div>
                <hr>
                <div class="detail-description collapse mt-4" id="boxnoidung">
                    <div class="description-productdetail card card-body">
                        <span class="card-text"><?php echo $product['content']; ?></span>
                    </div>
                </div>
                <div style="text-align: center">
                    <button aria-expanded="false" type="button" class="btn_3"
                            data-toggle="collapse" data-target="#boxnoidung">Hiện thị thông tin chi tiết</button>
                </div>

            </div>
            <hr>
            <div>
                <div style="width: 100%">
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0" nonce="DQimHMdP"></script>
                    <div class="fb-comments" data-href="https://www.facebook.com/BanTiviGiaReNhat" data-numposts="5" data-width=""></div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h4>Sản phẩm khác</h4>
        <br>
        <?php if (!empty($productTop)): ?>

            <marquee id="marq" scrollamount="10" style="display: flex" direction="right" behavior="scroll" loop="60" scrolldelay="0" onmouseover="this.stop()" onmouseout="this.start()">
                <?php foreach ($productTop AS $products):
                    $slug = Helper::getSlug($products['title']);
                    $product_link = "chi-tiet-san-pham/$slug/" . $products['id'] . ".html";
                ?>
                <div style=" display: inline-block ; width: 250px; margin: 40px">
                    <a href="<?php echo $product_link; ?>">
                        <img src="../backend/assets/uploads/<?php echo $products['avatar'] ?>" title="<?php echo $products['title'] ?>" width="280" height="200"/>
                    </a>
                    <br>
                    <br>
                    <div style="font-size: 10px;">
                        <span class="product-title" >
                            <a href="<?php echo $product_link; ?>" style="color: red">
                                <?php echo $products['title'];?>
                            </a>
                        </span>
                    </div>
                </div>


                <?php endforeach;?>
            </marquee>

        <?php endif;?>
    </div>
</div>