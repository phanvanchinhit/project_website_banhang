<?php
require_once 'helpers/Helper.php';
?>
<h2>Chi tiết khách hàng</h2>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $customers['id'] ?></td>
    </tr>
    <tr>
        <th>Username</th>
        <td><?php echo $customers['username'] ?></td>
    </tr>
    <tr>
        <th>Full_name</th>
        <td><?php echo $customers['fullname'] ?></td>
    </tr>
    <tr>
        <th>Phone</th>
        <td><?php echo $customers['phone'] ?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?php echo $customers['address'] ?></td>
    </tr>
    <tr>
        <th>Created_at</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($customers['created_at'])) ?></td>
    </tr>
    <tr>
        <th>Updated_at</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($customers['updated_at'])) ?></td>
    </tr>
</table>
<a href="index.php?controller=customer&action=index" class="btn btn-default">Back</a>