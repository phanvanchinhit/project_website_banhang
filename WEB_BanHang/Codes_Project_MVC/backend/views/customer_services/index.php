
<h2>Hỗ trợ trực tuyến</h2>
<a href="index.php?controller=service&action=create" class="btn btn-success" style="<?php echo $permission_text;?>">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Zalo</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
    </tr>
    <?php if (!empty($services)): ?>
        <?php foreach ($services as $service): ?>
            <tr>
                <td><?php echo $service['id'] ?></td>
                <td><?php echo $service['category'] ?></td>
                <td><?php echo $service['email'] ?></td>
                <td><?php echo $service['phone'] ?></td>
                <td><?php echo $service['zalo'] ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($service['created_at'])) ?></td>
                <td><?php echo !empty($service['updated_at']) ? date('d-m-Y H:i:s', strtotime($service['updated_at'])) : '--' ?></td>
                <td>
                    <?php
                    $url_update = "index.php?controller=service&action=update&id=" . $service['id'];
                    $url_delete = "index.php?controller=service&action=delete&id=" . $service['id'];
                    ?>
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Bạn có muốn xóa không ?')" style="<?php echo $permission_text;?>"><i
                            class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <?php echo $_SESSION['error'] = 'Không có bản ghi nào !';?>
    <?php endif; ?>
</table>