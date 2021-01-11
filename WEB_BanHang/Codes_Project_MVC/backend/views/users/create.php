<h2>Thêm mới user</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="username">Username <span style="color: red">*</span></label>
            <input type="text" name="username" id="username"
                   value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-6">
            <label for="email">Email <span style="color: red">*</span></label>
            <input type="text" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" class="form-control"/>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="password">Password <span style="color: red">*</span></label>
            <input type="password" name="password" id="password"
                   value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-6">
            <label for="password_confirm">Nhập lại password <span style="color: red">*</span></label>
            <input type="password" name="password_confirm" id="password_confirm" value="" class="form-control"/>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-4">
            <label for="first_name">First_name</label>
            <input type="text" name="first_name" id="first_name"
                   value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-4">
            <label for="last_name">Last_name</label>
            <input type="text" name="last_name" id="last_name" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-4">
            <label for="phone">Phone</label>
            <input type="number" name="phone" id="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" class="form-control"/>
    </div>
    <div class="row">
        <div class="form-group col-sm-4">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar" id="avatar" class="form-control"/>
        </div>
        <div class="form-group col-sm-4">
            <label for="jobs">Jobs</label>
            <input type="text" name="jobs" id="jobs" value="<?php echo isset($_POST['jobs']) ? $_POST['jobs'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-4">
            <label for="facebook">Facebook</label>
            <input type="text" name="facebook" id="facebook" value="<?php echo isset($_POST['facebook']) ? $_POST['facebook'] : '' ?>" class="form-control"/>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="status">Trạng thái</label>
            <select name="status" class="form-control" id="status">
                <?php
                $selected_active = '';
                $selected_disabled = '';
                if (isset($_POST['status'])) {
                    switch ($_POST['status']) {
                        case 0:
                            $selected_disabled = 'selected';
                            break;
                        case 1:
                            $selected_active = 'selected';
                            break;
                    }
                }
                ?>
                <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>
                <option value="1" <?php echo $selected_active ?>>Active</option>
            </select>
        </div>
        <div class="form-group col-sm-6">
            <label for="permission">Permission</label>
            <select name="permission" class="form-control" id="permission">
                <?php
                $selected_admin ='';
                $selected_member ='';
                $selected_editor = '';
                if ($user['permission'] == 0) {
                    $selected_editor = 'selected';
                } elseif($user['permission'] == 1){
                    $selected_member = 'selected';
                }elseif ($user['permission'] == 2){
                    $selected_admin = 'selected';
                }
                if (isset($_POST['permission'])) {
                    switch ($_POST['permission']) {
                        case 0:
                            $selected_editor = 'selected';
                            break;
                        case 1:
                            $selected_member = 'selected';
                            break;
                        case 2:
                            $selected_admin = 'selected';
                            break;
                    }
                }
                ?>
                <option value="0" <?php echo $selected_editor ?>>Biên Tập Viên</option>
                <option value="1" <?php echo $selected_member ?>>Thành Viên</option>
                <option value="2" <?php echo $selected_admin ?>>Quản Trị Viên</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=user&action=index" class="btn btn-default">Back</a>
        <br>
        <br>
    </div>
</form>