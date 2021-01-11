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
                        <h2>Thanh Toán</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!--================Checkout Area =================-->
<section class="checkout_area section_padding">
    <div class="container">
        <div class="returning_customer">
            <div class="check_title">
                <h2>
                    Returning Customer?
                    <a href="login.html"> Click here to login</a>
                </h2>
            </div>
            <p>
                Nếu bạn đã mua sắm với chúng tôi trước đây,
                vui lòng nhập thông tin chi tiết của bạn vào ô bên dưới.
                Nếu bạn là khách hàng mới, vui lòng chuyển đến phần Thanh toán và lụa chọn hình thức Giao hàng.
            </p>

        </div>
        <div class="cupon_area">
            <div class="check_title">
                <h2>
                    Have a coupon?
                    <a href="#"> Click here to enter your code</a>
                </h2>
            </div>
            <input type="text" placeholder="Enter coupon code" />
            <a class="tp_btn" href="#">Apply Coupon</a>
        </div>
        <div class="billing_details">
            <form class="row contact_form" action="" method="post" novalidate="novalidate">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="first" placeholder="Full Name *" name="fullname" />
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="company" name="company" placeholder="Company name" />
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" placeholder="Phone Number *" name="mobile" />
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" placeholder="Email Address *" name="email" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <select class="country_select">
                                    <option value="1">Việt Nam</option>
                                    <option value="2">Hàn Quốc</option>
                                    <option value="4">Thái Lan</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="city" name="address" placeholder="Address *"/>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Shipping Details</h3>
                                    <input type="checkbox" id="f-option3" name="selector" />
                                    <label for="f-option3">Ship to a different address?</label>
                                </div>
                                <textarea class="form-control" name="note" id="message" rows="1"
                                          placeholder="Order Notes"></textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <a href="gio-hang-cua-ban.html" class="btn_3">Giỏ Hàng</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <?php
                            //biến lưu tổng giá trị đơn hàng
                            $total = 0;
                            if (isset($_SESSION['cart'])):
                            ?>
                            <ul class="list">
                                <li>
                                    <a href="#">Product
                                        <span>Total</span>
                                    </a>
                                </li>
                                <?php foreach ($_SESSION['cart'] AS $product_id => $cart):
                                $product_link = 'san-pham/' . Helper::getSlug($cart['name']) . "/$product_id";
                                ?>
                                <li>
                                    <a href="<?php echo $product_link; ?>"><?php echo $cart['name']; ?>
                                        <span class="middle">x 0<?php echo $cart['quantity']; ?></span>
                                        <span>
                                            <?php
                                            $price_total = $cart['price'] * $cart['quantity'];
                                            $total += $price_total;
                                            ?>
                                            <?php echo number_format($price_total, 0, '.', '.') ?>
                                        </span>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Total
                                        <span>
                                            <?php echo number_format($total, 0, '.', '.') ?>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                                <br><h6>Chọn phương thức thanh toán</h6>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="method" value="0" />
                                    <label for="f-option5">Thanh toán trực tuyến</label>
                                    <div class="check"></div>
                                </div>
                                <p>
                                    Làm ơn kiểm tra thông tin của bạn và thông tin đơn hàng
                                </p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" checked name="method" value="1" />
                                    <label for="f-option6">COD </label>
                                    <img src="img/product/single-product/card.jpg" alt="" />
                                    <div class="check"></div>
                                </div>
                                <p>
                                    Phương thức thanh toán COD là phương thức thanh toán dựa trên địa chỉ của khách hàng
                                </p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector" />
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div>
                            <?php endif; ?>
                                <input type="submit" name="submit" value="Thanh Toán" class="btn_3">

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
