<?php
require_once 'helpers/Helper.php';
?>
<h2>Chi tiết liên hệ</h2>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $contacts['id'] ?></td>
    </tr>
    <tr>
        <th>Full_name</th>
        <td><?php echo $contacts['fullName'] ?></td>
    </tr>
    <tr>
        <th>Phone</th>
        <td><?php echo $contacts['phone'] ?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?php echo $contacts['address'] ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $contacts['email'] ?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?php echo $contacts['description'] ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?php echo Helper::getStatusContactText($contacts['contactStatus']);?></td>
    </tr>
    <tr>
        <th>Created_at</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($contacts['created_at'])) ?></td>
    </tr>
    <tr>
        <th>Updated_at</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($contacts['updated_at'])) ?></td>
    </tr>
</table>
<a href="index.php?controller=contact&action=index" class="btn btn-default">Back</a>