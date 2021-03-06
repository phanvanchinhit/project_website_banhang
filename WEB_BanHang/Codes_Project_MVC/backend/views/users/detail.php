<?php
require_once 'helpers/Helper.php';
?>
<h2>Chi tiết user</h2>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $user['id'] ?></td>
    </tr>
    <tr>
        <th>Username</th>
        <td><?php echo $user['username'] ?></td>
    </tr>
    <tr>
        <th>First_name</th>
        <td><?php echo $user['first_name'] ?></td>
    </tr>
    <tr>
        <th>Last_name</th>
        <td><?php echo $user['last_name'] ?></td>
    </tr>
    <tr>
        <th>Phone</th>
        <td><?php echo $user['phone'] ?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?php echo $user['address'] ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $user['email'] ?></td>
    </tr>
    <tr>
        <th>Avatar</th>
        <td>
            <?php if (!empty($user['avatar'])): ?>
                <img height="80" src="assets/uploads/<?php echo $user['avatar'] ?>"/>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Jobs</th>
        <td><?php echo $user['jobs'] ?></td>
    </tr>
    <tr>
        <th>Last_login</th>
        <td><?php echo !empty($user['last_login']) ? date('d-m-Y H:i:s', strtotime($user['last_login'])) : '' ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?php echo Helper::getStatusText($user['status']); ?></td>
    </tr>
    <tr>
        <th>Permission</th>
        <td><?php echo Helper::getStatusUserText($user['permission']); ?></td>
    </tr>
    <tr>
        <th>created_at</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($user['created_at'])) ?></td>
    </tr>
    <tr>
        <th>updated_at</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($user['updated_at'])) ?></td>
    </tr>
</table>
<a href="index.php?controller=user&action=index" class="btn btn-default">Back</a>