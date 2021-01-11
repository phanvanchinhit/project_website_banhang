<h3>Danh sách khách hàng</h3>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Fullname</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Created_at</th>
        <th></th>
    </tr>
    <?php if (!empty($customers)): ?>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?php echo $customer['id'] ?></td>
                <td><?php echo $customer['username'] ?></td>
                <td><?php echo $customer['fullname'] ?></td>
                <td><?php echo $customer['phone'] ?></td>
                <td><?php echo $customer['address'] ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($customer['created_at'])) ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=customer&action=detail&id=" . $customer['id'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
    <?php endif; ?>
</table>