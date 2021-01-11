<h2>Thông tin liên hệ</h2>
<a href="index.php?controller=system&action=createContact" class="btn btn-success" style="<?php echo $permission_text;?>">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Phone</th>
        <th>Zalo</th>
        <th>Email</th>
        <th>Map</th>
        <th>Logo</th>
        <th>Favicon</th>
        <th>Company</th>
        <th>Address</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
    </tr>
    <?php if (!empty($contacts)): ?>
        <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?php echo $contact['id'] ?></td>
                <td><?php echo $contact['phone'] ?></td>
                <td><?php echo $contact['zalo'] ?></td>
                <td><?php echo $contact['email'] ?></td>
                <td><?php echo $contact['map'] ?></td>
                <td>
                    <?php if (!empty($contact['logo'])): ?>
                        <img height="80" src="assets/uploads/<?php echo $contact['logo'] ?>"/>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($contact['favicon'])): ?>
                        <img height="80" src="assets/uploads/<?php echo $contact['favicon'] ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo $contact['company'] ?></td>
                <td><?php echo $contact['address'] ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($contact['created_at'])) ?></td>
                <td><?php echo !empty($contact['updated_at']) ? date('d-m-Y H:i:s', strtotime($contact['updated_at'])) : '--' ?></td>
                <td>
                    <?php
                    $url_update = "index.php?controller=system&action=updateContact&id=" . $contact['id'];
                    $url_delete = "index.php?controller=system&action=deleteContact&id=" . $contact['id'];
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