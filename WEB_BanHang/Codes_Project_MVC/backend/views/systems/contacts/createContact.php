<h2>Thêm mới contact</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-sm-4">
            <label for="phone">Phone<span style="color: red">*</span></label>
            <input type="number" name="phone" id="phone"
                   value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-4">
            <label for="zalo">Zalo<span style="color: red">*</span></label>
            <input type="number" name="zalo" id="zalo"
                   value="<?php echo isset($_POST['zalo']) ? $_POST['zalo'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-4">
            <label for="email">Email <span style="color: red">*</span></label>
            <input type="text" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <label for="map">Map<span style="color: red">*</span></label>
        <textarea name="map" id="map" class="form-control"><?php echo isset($_POST['map']) ? $_POST['map'] : '' ?></textarea>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="logo">Logo</label>
            <input type="file" name="logo" id="logo" value="<?php echo isset($_POST['logo']) ? $_POST['logo'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-6">
            <label for="favicon">Favicon</label>
            <input type="file" name="favicon" id="favicon" value="<?php echo isset($_POST['favicon']) ? $_POST['favicon'] : '' ?>" class="form-control"/>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-4">
            <label for="company">Company</label>
            <input type="text" name="company" id="company"
                   value="<?php echo isset($_POST['company']) ? $_POST['company'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-8">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=system&action=indexContact" class="btn btn-default">Back</a>
        <br>
        <br>
    </div>
</form>