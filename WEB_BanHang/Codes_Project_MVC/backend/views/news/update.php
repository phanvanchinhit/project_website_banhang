<h2>Cập nhật bài viết</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="category_id">Danh mục</label>
            <select name="category_id" class="form-control" id="category_id">
                <?php
                foreach ($categories as $category):
                    $selected = '';
                    if ($category['id'] == $new['category_id']) {
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
        <div class="form-group col-sm-9">
            <label for="title">Nhập tên bài viết</label>
            <input type="text" name="title"
                   value="<?php echo isset($_POST['title']) ? $_POST['title'] : $new['title'] ?>"
                   class="form-control" id="title"/>
        </div>
    </div>


    <div class="form-group col-sm-6">
        <label for="avatar">Ảnh đại diện</label>
        <input type="file" name="avatar" value="" class="form-control" id="avatar"/>
        <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
        <?php if (!empty($new['avatar'])): ?>
            <img height="80" src="assets/uploads/<?php echo $new['avatar'] ?>"/>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="seo-title">Seo title</label>
        <input type="text" name="seo_title"
               value="<?php echo isset($_POST['seo_title']) ? $_POST['seo_title'] : $new['seo_title'] ?>"
               class="form-control" id="seo-title"/>
    </div>
    <div class="form-group">
        <label for="seo-description">Seo description</label>
        <input type="text" name="seo_description"
               value="<?php echo isset($_POST['seo_description']) ? $_POST['seo_description'] : $new['seo_description'] ?>"
               class="form-control" id="seo-description"/>
    </div>

    <div class="form-group">
        <label for="seo-keywords">Seo keywords</label>
        <input type="text" name="seo_keywords"
               value="<?php echo isset($_POST['seo_keywords']) ? $_POST['seo_keywords'] : $new['seo_keywords'] ?>"
               class="form-control" id="seo-keywords"/>
    </div>
    <div class="form-group">
        <label for="summary">Mô tả ngắn sản phẩm</label>
        <textarea name="summary" id="summary"
                  class="form-control"><?php echo isset($_POST['summary']) ? $_POST['summary'] : $new['summary'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="description">Mô tả chi tiết sản phẩm</label>
        <textarea name="content" id="description"
                  class="form-control"><?php echo isset($_POST['content']) ? $_POST['content'] : $new['content'] ?></textarea>
    </div>

    <div class="form-group col-sm-3">
        <label for="status">Trạng thái</label>
        <select name="status" class="form-control" id="status">
            <?php
            $selected_disabled = '';
            $selected_active = '';
            if ($product['status'] == 0) {
                $selected_disabled = 'selected';
            } else {
                $selected_active = 'selected';
            }
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
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=new&action=index" class="btn btn-default">Back</a>
    </div>
    <br>
</form>