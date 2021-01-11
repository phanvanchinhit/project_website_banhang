<h3>Cập nhật thông tin đơn hàng</h3>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <?php
        $total_order = 0;
        ?>
        <div class="form-group col-sm-4">
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname"
                   value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : $orderDetail['fullname'] ?>"
                   class="form-control" id="fullname"/>
        </div>
        <div class="form-group col-sm-4">
            <label for="mobile">Phone</label>
            <input type="number" name="mobile"
                   value="<?php echo isset($_POST['mobile']) ? $_POST['mobile'] : $orderDetail['mobile'] ?>"
                   class="form-control" id="mobile"/>
        </div>
        <div class="form-group col-sm-4">
            <label for="email">Email</label>
            <input type="email" name="email"
                   value="<?php echo isset($_POST['email']) ? $_POST['email'] : $orderDetail['email'] ?>"
                   class="form-control" id="email"/>
        </div>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address"
               value="<?php echo isset($_POST['address']) ? $_POST['address'] : $orderDetail['address'] ?>"
               class="form-control" id="address"/>
    </div>
    <div class="form-group">
        <label for="note">Note</label>
        <textarea name="note" id="note"
                  class="form-control"><?php echo isset($_POST['note']) ? $_POST['note'] : $orderDetail['note'] ?></textarea>
    </div>
    <div class="row">
        <div class="form-group col-sm-4">
            <label for="price_total">Total</label>
            <?php foreach ($orderDetailProducts AS $orderDetailProduct):?>
            <?php
            $total_item = $orderDetailProduct['order_quantity'] * $orderDetailProduct['product_price'];
            $total_order += $total_item;
            ?>
            <?php endforeach;?>
            <input type="" name="price_total" value="<?php echo ($total_order); ?>"
                   class="form-control" id="price_total" readonly/>
        </div>

        <div class="form-group col-sm-8">
            <label for="payment_status">Status</label>
            <select name="payment_status" class="form-control" id="payment_status">
                <?php
                $selected_no_seen = '';
                $selected_seen = '';
                $selected_dangXuLy ='';
                $selected_complete ='';
                $selected_failed = '';
                if ($orderDetail['payment_status'] == 0) {
                    $selected_no_seen = 'selected';
                } elseif($orderDetail['payment_status'] == 1){
                    $selected_seen = 'selected';
                }elseif ($orderDetail['payment_status'] == 2){
                    $selected_dangXuLy = 'selected';
                }elseif ($orderDetail['payment_status'] == 3){
                    $selected_complete = 'selected';
                }elseif ($orderDetail['payment_status'] == 4){
                    $selected_failed = 'selected';
                }
                if (isset($_POST['payment_status'])) {
                    switch ($_POST['payment_status']) {
                        case 0:
                            $selected_no_seen = 'selected';
                            break;
                        case 1:
                            $selected_seen = 'selected';
                            break;
                        case 2:
                            $selected_dangXuLy = 'selected';
                            break;
                        case 3:
                            $selected_complete = 'selected';
                            break;
                        case 4:
                            $selected_failed = 'selected';
                            break;
                    }
                }
                ?>
                <option value="0" <?php echo $selected_no_seen ?>>Chưa Xem</option>
                <option value="1" <?php echo $selected_seen ?>>Đã Xem</option>
                <option value="2" <?php echo $selected_dangXuLy ?>>Đang Xử Lý</option>
                <option value="3" <?php echo $selected_complete ?>>Hoàn Thành</option>
                <option value="4" <?php echo $selected_failed ?>>Đã Hủy</option>
            </select>
        </div>
    </div>
    <h3>Thông tin đơn hàng</h3>
    <div class="form-group">
        <table border="1" cellspacing="0" cellpadding="10" class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Avatar</th>
                <th>Order Quantity</th>
                <th>Price</th>
                <th>Edit</th>

            </tr>
            <?php $stt =0?>
            <?php foreach ($orderDetailProducts AS $orderDetailProduct):?>
                <tr>
                    <td><?php $stt++; echo $stt;?></td>
                    <td><?php echo $orderDetailProduct['product_name']?></td>
                    <td>
                        <?php if (!empty($orderDetailProduct['product_avatar'])): ?>
                            <img height="80" src="assets/uploads/<?php echo $orderDetailProduct['product_avatar'] ?>"/>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $orderDetailProduct['order_quantity']?></td>
                    <td><?php echo number_format($orderDetailProduct['product_price'])?></td>
                    <td>
                        <a href="index.php?controller=order&action=deleteProductOrder&id=<?php echo $orderDetailProduct['product_id'] ?>" title="Xóa"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=order&action=index" class="btn btn-default">Back</a>
    </div>
</form>