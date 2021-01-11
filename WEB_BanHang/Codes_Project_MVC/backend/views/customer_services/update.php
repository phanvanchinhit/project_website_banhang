<h2>Cập nhật thông tin</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="category">Category<span style="color: red">*</span></label>
            <input type="category" name="category" id="category"
                   value="<?php echo isset($services['category']) ? $services['category'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-3">
            <label for="email">Name <span style="color: red">*</span></label>
            <input type="text" name="email" id="email" value="<?php echo isset($services['email']) ? $services['email'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-3">
            <label for="phone">Phone<span style="color: red">*</span></label>
            <input type="number" name="phone" id="phone"
                   value="<?php echo isset($services['phone']) ? $services['phone'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-3">
            <label for="zalo">Zalo<span style="color: red">*</span></label>
            <input type="number" name="zalo" id="zalo"
                   value="<?php echo isset($services['zalo']) ? $services['zalo'] : '' ?>" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Update" class="btn btn-primary"/>
        <a href="index.php?controller=service&action=index" class="btn btn-default">Back</a>
        <br>
    </div>
</form>