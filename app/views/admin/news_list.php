<h2 class="my-4">Quản lý tin tức</h2>
<p><a href="index.php?controller=admin&action=add" class="btn btn-success mb-3">Thêm tin mới</a></p>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Danh mục</th>
            <th>Hình ảnh</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($allNews as $n): ?>
    <tr>
        <td><?php echo $n['id']; ?></td>
        <td><?php echo $n['title']; ?></td>
        <td><?php echo $n['category_name']; ?></td>
        <td>
          <?php if(!empty($n['image'])): ?>
            <img src="public/images/<?php echo $n['image']; ?>" style="max-width:50px;" alt="<?php echo $n['title']; ?>">
          <?php endif; ?>
        </td>
        <td><?php echo $n['created_at']; ?></td>
        <td>
            <a href="index.php?controller=admin&action=edit&id=<?php echo $n['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
            <a href="index.php?controller=admin&action=delete&id=<?php echo $n['id']; ?>" onclick="return confirm('Xóa?')" class="btn btn-danger btn-sm">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
