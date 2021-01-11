<?php
require_once 'helpers/Helper.php';
?>
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Thông tin của bạn</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<table class="container table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $user['id'] ?></td>
    </tr>
    <tr>
        <th>Username</th>
        <td><?php echo $user['username'] ?></td>
    </tr>
    <tr>
        <th>Fullname</th>
        <td><?php echo $user['fullname'] ?></td>
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
        <th>Created_at</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($user['created_at'])) ?></td>
    </tr>
    <tr>
        <th>Updated_at</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($user['updated_at'])) ?></td>
    </tr>
</table>