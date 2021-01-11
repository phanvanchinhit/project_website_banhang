<?php
require_once 'helpers/Helper.php';
?>
<h3>Liên hệ</h3>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Fullname</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Email</th>
        <th>Status</th>
        <th>Created_at</th>
        <th></th>
    </tr>
    <?php if (!empty($contacts)): ?>
        <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?php echo $contact['id'] ?></td>
                <td><?php echo $contact['fullName'] ?></td>
                <td><?php echo $contact['phone'] ?></td>
                <td><?php echo $contact['address'] ?></td>
                <td><?php echo $contact['email'] ?></td>
                <?php
                $status = Helper::getStatusContactText($contact['contactStatus']);
                ?>
                <?php if ($status=='Chưa Xem'):?>
                    <td style="color: white; background: #ff874e"><?php echo $status?></td>
                <?php elseif ($status=='Đã Xem'):?>
                    <td style="color: white;background: #1ab7ea"><?php echo $status?></td>
                <?php elseif ($status=='Hoàn Thành'):?>
                    <td style="color: white; background: #00a157"><?php echo $status?></td>
                <?php endif;?>
                <td><?php echo date('d-m-Y H:i:s', strtotime($contact['created_at'])) ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=contact&action=detail&id=" . $contact['id'];
                    $url_update = "index.php?controller=contact&action=update&id=" . $contact['id'];
                    $url_delete = "index.php?controller=contact&action=delete&id=" . $contact['id'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Bạn có muốn xóa ?')" style="<?php echo $permission_text;?>"><i
                            class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <?php echo $_SESSION['error'] = 'Không tồn tại bản ghi nào';?>
    <?php endif; ?>
</table>