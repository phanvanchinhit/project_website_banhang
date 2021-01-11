<?php
require_once 'helpers/Helper.php';
// Về gaio diện sẽ chia ra thành 2 cột chính:
// Bến trái : Phần lọc
//+ Bến phải danh sách sản phẩm
?>

<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Danh sách sản phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!-- product list part start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="" method="post">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
                            <input type="text" name="title"
                                   value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>"
                                   placeholder="Search keyword" id="title">
                            <i class="ti-search"></i>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option ">
                                <div class="select_option_list" style="margin-bottom: 10px">Danh mục<i class="right fas fa-caret-down"></i></div>
                                <?php foreach ($categories AS $category): ?>
                                    <div class="select_option_dropdown" style="padding: 5px 17px">
                                        <div class="select_option">
                                            <div class="select_option_list"><?php echo $category['name'];?></div>
                                            <?php foreach ($category_childs AS $category_child):
                                                // Xử lý đổ lại dữ liệu checkbox khi mà filter
                                                $checked = '';
                                                if (isset($_POST['child_categories'])) {
                                                    if (in_array($category_child['id'], $_POST['child_categories'])) {
                                                        $checked = 'checked';
                                                    }
                                                }
                                                ?>
                                                <?php if ($category['id'] == $category_child['category_id']):?>
                                                    <div class="select_option_dropdown" style="padding: 3px 20px 3px 50px;">
                                                        <hr style="margin: 0px 0px 7px 0px; width: 85%">
                                                        <p class="chk_categories">
                                                            <label>
                                                                <input <?php echo $checked; ?> type="checkbox" name="child_categories[]" value="<?php echo $category_child['id']; ?>">
                                                                <span class="helper"><?php echo $category_child['name']; ?></span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                <?php endif;?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Giá bán <i class="right fas fa-caret-down"></i></div>
                                <?php
                                $checked_1 = '';
                                $checked_2 = '';
                                $checked_3 = '';
                                $checked_4 = '';
                                $checked_5 = '';
                                $checked_6 = '';

                                if (isset($_POST['prices'])) {
                                    if (in_array(1, $_POST['prices'])) {
                                        $checked_1 = 'checked';
                                    }
                                    if (in_array(2, $_POST['prices'])) {
                                        $checked_2 = 'checked';
                                    }
                                    if (in_array(3, $_POST['prices'])) {
                                        $checked_3 = 'checked';
                                    }
                                    if (in_array(4, $_POST['prices'])) {
                                        $checked_4 = 'checked';
                                    }
                                    if (in_array(5, $_POST['prices'])) {
                                        $checked_5 = 'checked';
                                    }
                                    if (in_array(6, $_POST['prices'])) {
                                        $checked_6 = 'checked';
                                    }
                                }
                                ?>
                                <div class="select_option_dropdown">
                                    <p class="chk_prices">
                                        <label>
                                            <input <?php echo $checked_1; ?> type="checkbox" name="prices[]" value="1">
                                            <span class="helper">Từ 0 đến 5 triệu</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="select_option_dropdown">
                                    <p class="chk_prices">
                                        <label>
                                            <input <?php echo $checked_2; ?> type="checkbox" name="prices[]" value="2">
                                            <span class="helper">Từ 5 đến 10 triệu</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="select_option_dropdown">
                                    <p class="chk_prices">
                                        <label>
                                            <input <?php echo $checked_3; ?> type="checkbox" name="prices[]" value="3">
                                            <span class="helper">Từ 10 đến 15 triệu</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="select_option_dropdown">
                                    <p class="chk_prices">
                                        <label>
                                            <input <?php echo $checked_4; ?> type="checkbox" name="prices[]" value="4">
                                            <span class="helper">Từ 15 đến 20 triệu</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="select_option_dropdown">
                                    <p class="chk_prices">
                                        <label>
                                            <input <?php echo $checked_5; ?> type="checkbox" name="prices[]" value="5">
                                            <span class="helper">Từ 20 đến 25 triệu</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="select_option_dropdown">
                                    <p class="chk_prices">
                                        <label>
                                            <input <?php echo $checked_6; ?> type="checkbox" name="prices[]" value="6">
                                            <span class="helper">Trên 30 triệu</span>
                                        </label>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center">
                            <input type="submit" name="filter" value="Tìm kiếm" class="btn_1">
                            <a href="danh-sach-san-pham.html" class="btn_1">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-8">
                <?php if (!empty($products)): ?>
                    <div class="product_list">
                        <div class="row">
                            <?php foreach ($products AS $product):
                                $slug = Helper::getSlug($product['title']);
                                $product_link = "chi-tiet-san-pham/$slug/" . $product['id'] . ".html";
                                $product_cart_add = "them-vao-gio-hang/" . $product['id'] . ".html";
                                ?>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single_product_item product-list-center">
                                        <img src="../backend/assets/uploads/<?php echo $product['avatar'] ?>"
                                             alt="<?php echo $product['title'] ?>"
                                             title="<?php echo $product['title'] ?>" class="img_produc_list">
                                        <h5 class="product-list-title">
                                            <a href="<?php echo $product_link; ?>">
                                                <?php echo $product['title'] ?>
                                            </a>
                                        </h5><br>
                                        <div style="color: red"><?php echo number_format($product['price']) ?>₫</div>
                                        <div><?php echo $product['category_name']; ?></div>
                                        <span class="add-to-cart" data-id="<?php echo $product['id']; ?>">
                                            <a href="#" class="btn_3">Thêm vào giỏ</a>
                                        </span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
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
                        <p>"Đừng bao giờ để lại ngày mai những gì bạn có thể làm hôm nay.</p>
                        <h5>- Khuyết danh -</h5>
                    </div>
                    <div class="single_client_review">
                        <div class="client_img">
                            <img src="assets/img/client_1.png" alt="#">
                        </div>
                        <p>"Người ta không mua vì lý do hợp lý. Họ mua vì lý do tình cảm.</p>
                        <h5>- Zig Ziglar -</h5>
                    </div>
                    <div class="single_client_review">
                        <div class="client_img">
                            <img src="assets/img/client_2.png" alt="#">
                        </div>
                        <p>"Chọn đúng thời gian, sự bền bỉ và mười năm nỗ lực rồi cuối cùng sẽ khiến bạn có vẻ như thành công chỉ trong một đêm.</p>
                        <h5>- Biz Stone -</h5>
                    </div>
                    <div class="single_client_review">
                        <div class="client_img">
                            <img src="assets/img/client_2.png" alt="#">
                        </div>
                        <p>"Điều quan trọng là đặt mình vào vị trí khách hàng. </p>
                        <h5>- Biz Stone -</h5>
                    </div>
                    <div class="single_client_review">
                        <div class="client_img">
                            <img src="assets/img/client_2.png" alt="#">
                        </div>
                        <p>"Ban đầu, mọi thứ đều rất rẻ. Vì thế, hãy khuyến khích con cái bạn đầu tư ngay khi chúng biết đến giá trị của đồng tiền. </p>
                        <h5>-  Warren Buffett -</h5>
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
                    <h6>Miễn phí vận chuyển</h6>
                    <p>Miễn phí vận chuyển trong nội thành Hà Nội</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-method mb-40">
                    <i class="ti-unlock"></i>
                    <h6>Thanh toán an toàn</h6>
                    <p>Thanh toán trực tuyến hoặc theo COD</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-method mb-40">
                    <i class="ti-reload"></i>
                    <h6>Uy tín - Chất lượng</h6>
                    <p>Luôn có đội ngũ chăm sóc khách hàng 24/7</p>
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
                    <h2>Nhận khuyến mãi và cập nhật!</h2>
                    <p>Thành công hay thất bại trong kinh doanh là do thái độ trong suy nghĩ nhiều hơn là khả năng suy nghĩ.</p>
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
