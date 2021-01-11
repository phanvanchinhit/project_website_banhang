<?php if (empty($category_childs)): ?>
    <h2>Không tồn tại category</h2>
<?php else: ?>
    <h2>Chỉnh sửa danh mục #<?php echo $category_childs['id'] ?></h2>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text" name="name"
                   value="<?php echo isset($_POST['name']) ? $_POST['name'] : $category_childs['name']; ?>"
                   class="form-control"/>
        </div>
        <div class="form-group col-sm-4">
            <label for="category_id">Danh mục cha</label>
            <select name="category_id" class="form-control" id="category_id">

                <?php
                foreach ($categories as $category):
                    $selected = '';
                    if ($category['id'] == $category_childs['category_id']) {
                        $selected = 'selected';
                    }
                    if (isset($_POST['category_id']) && $category['id'] == $_POST['category_id']) {
                        $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                        <?php echo $category['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Ảnh đại diện</label>
            <input type="file" name="avatar" class="form-control"/>
            <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
        </div>
        <?php if (!empty($category_childs['avatar'])): ?>
            <img src="assets/uploads/<?php echo $category_childs['avatar']; ?>" height="50"/>
        <?php endif; ?>

        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control"
                      name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : $category_childs['description']; ?></textarea>
        </div>

        <div class="form-group">
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
            <label>Trạng thái</label>
            <select name="status" class="form-control">
                <option value="0" <?php echo $selected_active ?> >Disabled</option>
                <option value="1" <?php echo $selected_disabled ?> >Active</option>
            </select>
        </div>

        <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
        <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
    </form>
<?php endif; ?>