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
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="fullname">Name</label>
            <input type="text" name="fullname" value="<?php echo isset($_POST['fullname'])? $_POST['fullname']: ''?>" class="form-control" id="fullname">
        </div>
        <div class="form-group col-sm-3">
            <label for="payment_status">Status</label>
            <select name="payment_status" class="form-control" id="payment_status">
                <?php
                $selected_no_choose='selected';
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
                }elseif ($orderDetail['payment_status'] == 5){
                    $selected_no_choose = '';
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
                        case 5:
                            $selected_no_choose = 'selected';
                            break;
                    }
                }
                ?>
                <?php if (!isset($_POST['search'])):?>
                <?php $selected_no_choose = 'selected'?>
                <option value="0" <?php echo $selected_no_seen ?>>Chưa Xem</option>
                <option value="1" <?php echo $selected_seen ?>>Đã Xem</option>
                <option value="2" <?php echo $selected_dangXuLy ?>>Đang Xử Lý</option>
                <option value="3" <?php echo $selected_complete ?>>Hoàn Thành</option>
                <option value="4" <?php echo $selected_failed ?>>Đã Hủy</option>
                <option value="5" <?php echo $selected_no_choose?>>-Choose Status-</option>
                <?php else:?>
                <option value="5" <?php echo $selected_no_choose?>>-Choose Status-</option>
                <option value="0" <?php echo $selected_no_seen ?>>Chưa Xem</option>
                <option value="1" <?php echo $selected_seen ?>>Đã Xem</option>
                <option value="2" <?php echo $selected_dangXuLy ?>>Đang Xử Lý</option>
                <option value="3" <?php echo $selected_complete ?>>Hoàn Thành</option>
                <option value="4" <?php echo $selected_failed ?>>Đã Hủy</option>
                <?php endif;?>
            </select>
        </div>
        <div class="form-group col-sm-3">
            <label for="fromDate">Từ Ngày</label>
            <input type="date" class="form-control" value="<?php echo isset($_POST['fromDate'])? $_POST['fromDate']:''?>" name="fromDate" id="fromDate">
        </div>
        <div class="form-group col-sm-3">
            <label for="toDate">Đến Ngày</label>
            <input type="date" class="form-control" value="<?php echo isset($_POST['toDate'])? $_POST['toDate']:''?>" name="toDate" id="toDate">
        </div>
    </div>
    <div class="form-group">
        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-primary"/>
        <a href="index.php?controller=order" class="btn btn-default">Xóa filter</a>

    </div>
</form>
<?php if (isset($_POST['search'])):?>
    <br>
    <h3>Thông tin đơn hàng</h3>
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
        <?php if (!empty($order_filters)):?>
            <?php foreach ($order_filters AS $order_filter):?>
                <tr>
                    <td><?php echo $order_filter['id']?></td>
                    <td><?php echo $order_filter['fullname']?></td>
                    <td><?php echo $order_filter['mobile']?></td>
                    <td><?php echo $order_filter['email']?></td>
                    <td><?php echo $order_filter['address']?></td>
                    <td><?php echo number_format($order_filter['price_total'])?></td>
                    <?php
                    $status = Helper::getStatusOrderText($order_filter['payment_status']);
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
                        <a href="index.php?controller=order&action=detail&id=<?php echo $order_filter['id'] ?>"
                           title="Chi tiết">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="index.php?controller=order&action=update&id=<?php echo $order_filter['id'] ?>" title="Sửa">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <a href="index.php?controller=order&action=delete&id=<?php echo $order_filter['id'] ?>" title="Xóa"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')" style="<?php echo $permission_text;?>">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else:?>
            <tr>
                <?php $_SESSION['error'] = 'Không tồn tại bản ghi nào'?>
            </tr>
        <?php endif;?>
    </table>
<?php else:?>
    <br>
    <h3>Thông tin đơn hàng</h3>
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
<?php endif;?>
<?php echo $pages; ?>

</body>
</html>