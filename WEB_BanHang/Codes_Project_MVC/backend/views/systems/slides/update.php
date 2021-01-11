<h2>Slide chính</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="slidebar">Avatar</label>
        <input type="file" name="slidebar" id="slidebar" class="form-control"/>
        <?php if (!empty($slideBar['slidebar'])): ?>
            <img height="80" src="assets/uploads/<?php echo $slideBar['slidebar'] ?>"/>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Lưu" class="btn btn-primary"/>
        <a href="index.php?controller=system&action=index" class="btn btn-default">Back</a>
        <br>
        <br>
    </div>
</form>