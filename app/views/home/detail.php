<div class="news-item my-4">
    <h2><?php echo $item['title']; ?></h2>
    <p><small class="text-muted">Danh mục: <?php echo $item['category_name']; ?> | Ngày đăng: <?php echo $item['created_at']; ?></small></p>
    <?php if(!empty($item['image'])): ?>
      <img src="public/images/<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>" class="img-fluid mb-3">
    <?php endif; ?>
    <p><?php echo nl2br($item['content']); ?></p>
    <a href="index.php" class="btn btn-secondary">Quay lại trang chủ</a>
</div>
