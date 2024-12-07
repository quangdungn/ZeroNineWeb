<h2 class="my-4">Thêm tin tức</h2>
<form method="POST" action="index.php?controller=admin&action=add" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Tiêu đề:</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="mb-3">
        <label>Nội dung:</label>
        <textarea name="content" rows="5" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Chọn ảnh từ máy tính:</label>
        <input type="file" name="image" id="imageInput" class="form-control" accept="image/*">
        <small>Chọn file .jpg, .png, .gif để upload</small>
        <div class="mt-2" id="previewContainer" style="display:none;">
            <img id="imagePreview" src="" style="max-width:200px;" alt="Preview">
        </div>
    </div>
    <div class="mb-3">
        <label>Danh mục:</label>
        <select name="category_id" class="form-select">
            <?php foreach ($categories as $cat): ?>
            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
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
            previewContainer.style.display = 'none';
            imagePreview.src = '';
        }
    });
});
</script>
