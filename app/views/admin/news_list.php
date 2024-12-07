<h2>Sửa tin tức</h2>
<form method="POST" action="index.php?controller=admin&action=edit&id=<?php echo $item['id']; ?>" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Tiêu đề:</label>
        <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($item['title']); ?>">
    </div>
    <div class="mb-3">
        <label>Nội dung:</label>
        <textarea name="content" rows="5" class="form-control"><?php echo htmlspecialchars($item['content']); ?></textarea>
    </div>
    <div class="mb-3">
        <label>Chọn ảnh mới (nếu muốn đổi):</label>
        <input type="file" name="image" id="imageInput" class="form-control" accept="image/*">
        <small>Nếu không chọn, sẽ giữ nguyên ảnh cũ. Chọn file .jpg, .png, .gif</small>
        <div class="mt-2" id="previewContainer" style="<?php echo !empty($item['image']) ? '' : 'display:none;' ?>">
            <img id="imagePreview" 
                 src="<?php echo !empty($item['image']) ? 'public/images/'.$item['image'] : ''; ?>" 
                 style="max-width:200px;" 
                 alt="Preview">
        </div>
    </div>
    <div class="mb-3">
        <label>Danh mục:</label>
        <select name="category_id" class="form-select">
            <?php foreach ($categories as $cat): ?>
            <option value="<?php echo $cat['id']; ?>" <?php if ($cat['id'] == $item['category_id']) echo 'selected'; ?>>
                <?php echo $cat['name']; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('imageInput');
    const previewContainer = document.getElementById('previewContainer');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function() {
        const file = imageInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                previewContainer.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            // Nếu người dùng xóa chọn ảnh (trên 1 số trình duyệt có thể)
            // thì ta ẩn preview nếu ảnh cũ không có
            <?php if(empty($item['image'])): ?>
            previewContainer.style.display = 'none';
            imagePreview.src = '';
            <?php endif; ?>
        }
    });
});
</script>
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
