<?php
if (isset($_SESSION['user'])) {
    $permission = $_SESSION['user']['permission'];
}
$permission_text ='';
if ($permission == 1 || $permission == 0){
    $permission_text = 'pointer-events: none; cursor: default; opacity: 0.7;';
}
?>
<h1>Tìm kiếm</h1>
<form action="" method="get">
    <input type="hidden" name="controller" value="category"/>
    <input type="hidden" name="action" value="index"/>
    <div class="form-group">
        <label>Nhập tên danh mục</label>
        <input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : '' ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-success"/>
        <a href="index.php?controller=category" class="btn btn-secondary">Xóa filter</a>
    </div>
</form>

<h1>Danh mục con</h1>
<a href="index.php?controller=category&action=createChild" class="btn btn-primary">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Category_parent</th>
        <th>Name</th>
        <th>Avatar</th>
        <th>Description</th>
        <th>Status</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
    </tr>
    <?php if (!empty($category_child)): ?>
        <?php foreach ($category_child as $category): ?>
            <tr>
                <td>
                    <?php echo $category['id']; ?>
                </td>
                <td>
                    <?php echo $category['category_name'];?>
                </td>
                <td>
                    <?php echo $category['name']; ?>
                </td>
                <td>
                    <?php if (!empty($category['avatar'])): ?>
                        <img src="assets/uploads/<?php echo $category['avatar'] ?>" width="60"/>
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo $category['description']; ?>
                </td>
                <td>
                    <?php
                    $status_text = 'Active';
                    if ($category['status'] == 0) {
                        $status_text = 'Disabled';
                    }
                    echo $status_text;
                    ?>
                </td>
                <td>
                    <?php echo date('d-m-Y H:i:s', strtotime($category['created_at'])); ?>
                </td>
                <td>
                    <?php
                    if (!empty($category['updated_at'])) {
                        echo date('d-m-Y H:i:s', strtotime($category['updated_at']));
                    }
                    ?>
                </td>
                <td>
                    <a href="index.php?controller=category&action=detailChild&id=<?php echo $category['id'] ?>" title="Chi tiết">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="index.php?controller=category&action=updateChild&id=<?php echo $category['id'] ?>" title="Sửa">
                        <i class="fa fa-pencil-alt"></i>
                    </a>
                    <a href="index.php?controller=category&action=deleteChild&id=<?php echo $category['id'] ?>" title="Xóa"
                       onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')" style="<?php echo $permission_text;?>">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
        <tr>
            <td colspan="7"><?php echo $pages; ?></td>
        </tr>

    <?php else: ?>
        <tr>
            <td colspan="8" style="background: red; "><b>No data found</b></td>
        </tr>
    <?php endif; ?>
</table>
