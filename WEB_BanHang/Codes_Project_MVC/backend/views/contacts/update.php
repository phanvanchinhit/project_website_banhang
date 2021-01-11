<h2>Cập nhật user</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="fullName">Full Name</label>
            <input type="text" name="fullName" id="fullName"
                   value="<?php echo isset($_POST['fullName']) ? $_POST['fullName'] : $contacts['fullName'] ?>"
                   class="form-control"/>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="phone">Phone</label>
            <input type="number" name="phone" id="phone"
                   value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : $contacts['phone'] ?>"
                   class="form-control"/>
        </div>
        <div class="form-group col-sm-6">
            <label for="email">Email</label>
            <input type="text" name="email" id="email"
                   value="<?php echo isset($_POST['email']) ? $_POST['email'] : $contacts['email'] ?>"
                   class="form-control"/>
        </div>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address"
               value="<?php echo isset($_POST['address']) ? $_POST['address'] : $contacts['address'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" id="description"
               value="<?php echo isset($_POST['description']) ? $_POST['description'] : $contacts['description'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="contactStatus">Status</label>
        <select name="contactStatus" class="form-control" id="contactStatus">
            <?php
            $selected_no_seen = '';
            $selected_seen = '';
            $selected_complete ='';
            if ($contacts['contactStatus'] == 0) {
                $selected_no_seen = 'selected';
            } elseif($contacts['contactStatus'] == 1){
                $selected_seen = 'selected';
            }elseif ($contacts['contactStatus'] == 2){
                $selected_dangXuLy = 'selected';
            }
            if (isset($_POST['contactStatus'])) {
                switch ($_POST['contactStatus']) {
                    case 0:
                        $selected_no_seen = 'selected';
                        break;
                    case 1:
                        $selected_seen = 'selected';
                        break;
                    case 2:
                        $selected_complete = 'selected';
                        break;
                }
            }
            ?>
            <option value="0" <?php echo $selected_no_seen ?>>Chưa Xem</option>
            <option value="1" <?php echo $selected_seen ?>>Đã Xem</option>
            <option value="2" <?php echo $selected_complete ?>>Hoàn Thành</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=user&action=index" class="btn btn-default">Back</a>
    </div>
</form>