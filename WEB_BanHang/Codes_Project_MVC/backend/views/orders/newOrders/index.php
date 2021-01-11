<?php
require_once 'helpers/Helper.php';
if (isset($_SESSION['user'])) {
    $permission = $_SESSION['user']['permission'];
}
$permission_text ='';
if ($permission == 1 || $permission == 0){
    $permission_text = 'pointer-events: none; cursor: default; opacity: 0.7;';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đơn hàng</title>
</head>
<body>

    <h3>Đơn hàng mới</h3>
    <br>
    <table border="1" cellpadding="8" cellspacing="0" class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>SDT</th>
            <th>Email</th>
            <th>Address</th>
            <th>Total</th>
            <th>Status</th>
            <th></th>
        </tr>
        <?php if (!empty($orders)):?>
            <?php foreach ($orders AS $order):?>
                <tr>
                    <td><?php echo $order['id']?></td>
                    <td><?php echo $order['fullname']?></td>
                    <td><?php echo $order['mobile']?></td>
                    <td><?php echo $order['email']?></td>
                    <td><?php echo $order['address']?></td>
                    <td><?php echo number_format($order['price_total'])?></td>
                    <?php
                    $status = Helper::getStatusOrderText($order['payment_status']);
                    ?>
                    <?php if ($status=='Chưa Xem'):?>
                        <td style="color: white; background: #ff874e"><?php echo $status?></td>
                    <?php elseif ($status=='Đã Xem'):?>
                        <td style="color: white;background: #1ab7ea"><?php echo $status?></td>
                    <?php elseif ($status=='Đang Xử Lý'):?>
                        <td style="color: white;background: #9c6cde"><?php echo $status?></td>
                    <?php elseif ($status=='Hoàn Thành'):?>
                        <td style="color: white; background: #00a157"><?php echo $status?></td>
                    <?php elseif ($status=='Đã Hủy'):?>
                        <td style="color: white;background: red"><?php echo $status?></td>
                    <?php endif;?>
                    <td>
                        <a href="index.php?controller=order&action=detail&id=<?php echo $order['id'] ?>"
                           title="Chi tiết">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="index.php?controller=order&action=update&id=<?php echo $order['id'] ?>" title="Sửa">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <a href="index.php?controller=order&action=delete&id=<?php echo $order['id'] ?>" title="Xóa"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')" style="<?php echo $permission_text;?>">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else:?>
            <tr>
                <td colspan="9" style="background: red; "><b>No data found</b></td>
            </tr>
        <?php endif;?>
    </table>

</body>
</html>