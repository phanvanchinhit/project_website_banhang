<h2>Thêm mới trường hỗ trợ trực tuyến</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="category">Category<span style="color: red">*</span></label>
            <input type="text" name="category" id="category"
                   value="<?php echo isset($_POST['category']) ? $_POST['category'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-3">
            <label for="email">Name <span style="color: red">*</span></label>
            <input type="text" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-3">
            <label for="phone">Phone<span style="color: red">*</span></label>
            <input type="number" name="phone" id="phone"
                   value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>" class="form-control"/>
        </div>
        <div class="form-group col-sm-3">
            <label for="zalo">Zalo<span style="color: red">*</span></label>
            <input type="number" name="zalo" id="zalo"
                   value="<?php echo isset($_POST['zalo']) ? $_POST['zalo'] : '' ?>" class="form-control"/>
        </div>

    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=service&action=index" class="btn btn-default">Back</a>
        <br>
        <br>
    </div>
</form>