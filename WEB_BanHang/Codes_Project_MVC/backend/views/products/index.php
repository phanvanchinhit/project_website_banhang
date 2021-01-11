<?php
require_once 'helpers/Helper.php';
if (isset($_SESSION['user'])) {
    $permission = $_SESSION['user']['permission'];
}
$permission_text ='';
if ($permission == 1 || $permission == 0){
    $permission_text = 'pointer-events: none; cursor: default; opacity: 0.7;';
}
?>
<!--form search-->
<form action="" method="GET">
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="title">Nhập title</label>
            <input type="text" name="title" value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>" id="title"
                   class="form-control"/>
        </div>
        <div class="form-group col-sm-3">
            <label for="title">Danh mục cha</label>
            <select name="category_parent_id" class="form-control">
                <?php foreach ($category_parents as $category_parent):
                    //giữ trạng thái selected của category sau khi chọn dựa vào
    //                tham số category_id trên trình duyệt
                    $selected = '';
                    if (isset($_GET['category_parent_id']) && $category_parent['id'] == $_GET['category_parent_id']) {
                        $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo $category_parent['id'] ?>" <?php echo $selected; ?>>
                        <?php echo $category_parent['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-sm-3">
            <label for="title">Danh mục con</label>
            <select name="category_child_id" class="form-control">
                <?php foreach ($category_childs as $category_child):
                    //giữ trạng thái selected của category sau khi chọn dựa vào
//                tham số category_id trên trình duyệt
                    $selected = '';
                    if (isset($_GET['category_child_id']) && $category_child['id'] == $_GET['category_child_id']) {
                        $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo $category_child['id'] ?>" <?php echo $selected; ?>>
                        <?php echo $category_child['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <input type="hidden" name="controller" value="product"/>
    <input type="hidden" name="action" value="index"/>
    <input type="submit" name="search" value="Tìm kiếm" class="btn btn-primary"/>
    <a href="index.php?controller=product" class="btn btn-default">Xóa filter</a>
</form>


<h2>Danh sách sản phẩm</h2>
    <a href="index.php?controller=product&action=create" class="btn btn-success">
        <i class="fa fa-plus"></i> Thêm mới
    </a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Category Parent</th>
        <th>Category Child</th>
        <th>Title</th>
        <th>Avatar</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
    </tr>
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id'] ?></td>
                <td><?php echo $product['category_name'] ?></td>
                <td><?php echo $product['category_child_name'] ?></td>
                <td><?php echo $product['title'] ?></td>
                <td>
                    <?php if (!empty($product['avatar'])): ?>
                        <img height="80" src="assets/uploads/<?php echo $product['avatar'] ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo number_format($product['price']) ?></td>
                <td><?php echo $product['amount'] ?></td>
                <td><?php echo Helper::getStatusText($product['status']) ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($product['created_at'])) ?></td>
                <td><?php echo !empty($product['updated_at']) ? date('d-m-Y H:i:s', strtotime($product['updated_at'])) : '--' ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=product&action=detail&id=" . $product['id'];
                    $url_update = "index.php?controller=product&action=update&id=" . $product['id'];
                    $url_delete = "index.php?controller=product&action=delete&id=" . $product['id'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')" style="<?php echo $permission_text;?>"><i
                                class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <td colspan="11" style="background: red; "><b>No data found</b></td>
        </tr>
    <?php endif; ?>
</table>
<?php echo $pages; ?>