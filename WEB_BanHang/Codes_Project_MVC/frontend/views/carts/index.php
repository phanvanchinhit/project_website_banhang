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
                        <h2>Giỏ Hàng Của Bạn</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!--================Cart Area =================-->
<section class="cart_area section_padding">
    <div class="container">
        <div class="cart_inner">
            <?php if (isset($_SESSION['cart'])):?>
                <form action="" method="post">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col" class="table_cart">Quantity</th>
                                <th scope="col" class="table_cart">Total</th>
                                <th scope="col" class="table_cart">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                            //Khai báo biến chứa tổng giá trị đơn hàng
                            $total_cart = 0;
                            foreach ($_SESSION['cart'] AS $product_id => $cart):
                            ?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="../backend/assets/uploads/<?php echo $cart['avatar']?>" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <p>
                                                <?php
                                                //Khai báo link rewrite cho trang chi tiết sản phẩm
                                                $slug = Helper::getSlug($cart['name']);
                                                $product_link = "chi-tiet-san-pham/$slug/$product_id.html";
                                                ?>
                                                <a href="<?php echo $product_link; ?>"
                                                   class="content-product-a">
                                                    <?php echo $cart['name']; ?>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>
                                        <?php echo number_format($cart['price']); ?>
                                    </h5>
                                </td>
                                <td class="table_cart">
                                    <div class="product_count">
                                        <?php if(isset($product_id)):?>
                                        <input class="input-number product-amount" name="<?php echo $product_id; ?>" type="number" style="text-align: center" value="<?php echo $cart['quantity']; ?>" min="0" max="100">
                                        <?php endif;?>
                                    </div>
                                </td>
                                <td class="table_cart">
                                    <h5>
                                        <?php
                                        $total_item = $cart['quantity'] * $cart['price'];
                                        //Cộng tích lũy thành tiền này cho tổng giá trị
                                        //đơn hàng
                                        $total_cart += $total_item;
                                        echo number_format($total_item);
                                        ?>
                                    </h5>
                                </td>
                                <td class="table_cart">
                                    <h5>
                                        <a href="xoa-san-pham/<?php echo $product_id; ?>.html">
                                            Delete
                                        </a>
                                    </h5>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="table_cart">
                                    <h5>Subtotal</h5>
                                </td>
                                <td class="table_cart">
                                    <h5>
                                        <?php echo number_format($total_cart); ?>
                                    </h5>
                                </td>
                            </tr>
                            <tr class="bottom_button">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" value="Update Cart" class="btn_1">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="checkout_btn_inner float-right">
                            <a class="btn_1" href="index.php">Continue Shopping</a>
                            <a class="btn_1 checkout_btn_1" href="thanh-toan.html">Proceed to checkout</a>
                        </div>
                    </div>
                </form>
            <?php else: ?>
                <div class="cartItem">
                    <div style="width: 35%; padding-right: 65px" class="col-xl-4 col-lg-5 col-md-5">
                        <img src="https://i.imgur.com/TbaUxAz.jpg" style="border-radius: 10px" height="300"/>
                    </div>
                    <div style="margin-top: 50px; padding-left: 50px" class="col-xl-7 col-lg-12 col-md-12">
                        <h3 style="color: red">
                            Giỏ hàng của bạn đang trống
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
</section>
<!--================End Cart Area =================-->
