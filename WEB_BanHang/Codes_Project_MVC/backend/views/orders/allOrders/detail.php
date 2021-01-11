<?php
require_once 'helpers/Helper.php';
?>
<table class="table table-bordered">
    <h4>Thông tin người đặt hàng</h4>
    <tr>
        <th>ID</th>
        <td><?php echo $orderDetail['id']?></td>
    </tr>
    <tr>
        <th>Full name</th>
        <td><?php echo $orderDetail['fullname']?></td>
    </tr>
    <tr>
        <th>Phone</th>
        <td><?php echo $orderDetail['mobile']?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $orderDetail['email']?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?php echo $orderDetail['address']?></td>
    </tr>
    <tr>
        <th>Note</th>
        <td><?php echo $orderDetail['note']?></td>
    </tr>
    <tr>
        <th>Total</th>
        <td><?php echo number_format($orderDetail['price_total'])?></td>
    </tr>
    <tr>
        <th>Create_at</th>
        <td><?php echo $orderDetail['created_at']?></td>
    </tr>
    <tr>
        <th>Update_at</th>
        <td><?php echo $orderDetail['updated_at']?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?php echo Helper::getStatusOrderText($orderDetail['payment_status']);?></td>
    </tr>
</table>
<table border="1" cellspacing="0" cellpadding="10" class="table table-bordered">
    <h3>Thông tin đơn hàng</h3>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Avatar</th>
        <th>Order Quantity</th>
        <th>Price</th>

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
        </tr>
    <?php endforeach;?>
</table>

<br>
<a href="index.php?controller=order&action=index" class="btn btn-default">Back</a>
<br>
<br>