<h2>Cập nhật contact</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-sm-4">
            <label for="phone">Phone<span style="color: red">*</span></label>
            <input type="number" name="phone" id="phone"
                   value="<?php echo isset($contacts['phone']) ? $contacts['phone'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-4">
            <label for="zalo">Zalo<span style="color: red">*</span></label>
            <input type="number" name="zalo" id="zalo"
                   value="<?php echo isset($contacts['zalo']) ? $contacts['zalo'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-4">
            <label for="email">Email <span style="color: red">*</span></label>
            <input type="text" name="email" id="email" value="<?php echo isset($contacts['email']) ? $contacts['email'] : '' ?>" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <label for="map">Map<span style="color: red">*</span></label>
        <textarea name="map" id="map" class="form-control"><?php echo isset($contacts['map']) ? $contacts['map'] : '' ?></textarea>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="logo">Logo</label>
            <input type="file" name="logo" id="logo" class="form-control"/>
            <?php if (!empty($contacts['logo'])): ?>
                <img height="80" src="assets/uploads/<?php echo $contacts['logo'] ?>"/>
            <?php endif; ?>
        </div>
        <div class="form-group col-sm-6">
            <label for="favicon">Favicon</label>
            <input type="file" name="favicon" id="favicon" class="form-control"/>
            <?php if (!empty($contacts['favicon'])): ?>
                <img height="80" src="assets/uploads/<?php echo $contacts['favicon'] ?>"/>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-4">
            <label for="company">Company</label>
            <input type="text" name="company" id="company"
                   value="<?php echo isset($contacts['company']) ? $contacts['company'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-8">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="<?php echo isset($contacts['address']) ? $contacts['address'] : '' ?>" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Update" class="btn btn-primary"/>
        <a href="index.php?controller=system&action=indexContact" class="btn btn-default">Back</a>
        <br>
        <br>
    </div>
</form>