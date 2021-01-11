<h2>Danh sách slide</h2>
<a href="index.php?controller=system&action=create" class="btn btn-success" style="<?php echo $permission_text; ?>">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>SlideBar</th>
        <th>Created_at</th>
        <th>Update_at</th>
        <th></th>
    </tr>
    <?php if (!empty($slideBars)): ?>
        <?php foreach ($slideBars as $slideBar): ?>
            <tr>
                <td><?php echo $slideBar['id'] ?></td>
                <td>
                    <?php if (!empty($slideBar['slidebar'])): ?>
                        <img height="80" src="assets/uploads/<?php echo $slideBar['slidebar'] ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($slideBar['created_at'])) ?></td>
                <td><?php echo !empty($slideBar['updated_at']) ? date('d-m-Y H:i:s', strtotime($slideBar['updated_at'])) : '--' ?></td>
                <td>
                    <?php
                    $url_update = "index.php?controller=system&action=update&id=" . $slideBar['id'];
                    $url_delete = "index.php?controller=system&action=delete&id=" . $slideBar['id'];
                    ?>
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Bạn chắc chắn xóa ?')"
                       style="<?php echo $permission_text; ?>"><i
                                class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <?php echo $_SESSION['error'] ='Không có bản ghi nào';?>
    <?php endif; ?>
</table>