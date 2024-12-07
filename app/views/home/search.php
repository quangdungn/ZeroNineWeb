<h2 class="my-4">Kết quả tìm kiếm cho: "<?php echo htmlspecialchars($keyword); ?>"</h2>
<form action="index.php" method="get" class="mb-4 d-flex">
    <input type="hidden" name="controller" value="news">
    <input type="hidden" name="action" value="search">
    <input type="text" name="q" value="<?php echo htmlspecialchars($keyword); ?>" class="form-control me-2" placeholder="Nhập từ khóa...">
    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
</form>
<?php if (empty($results)): ?>
<p>Không tìm thấy kết quả.</p>
<?php else: ?>
<div class="row">
    <?php foreach ($results as $item): ?>
    <div class="col-md-4">
        <div class="news-item">
            <h3>
              <a href="index.php?controller=news&action=detail&id=<?php echo $item['id']; ?>" class="text-decoration-none">
                <?php echo $item['title']; ?>
              </a>
            </h3>
            <p><small class="text-muted">Danh mục: <?php echo $item['category_name']; ?></small></p>
            <?php if(!empty($item['image'])): ?>
              <img src="public/images/<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>" class="img-fluid mb-2">
            <?php endif; ?>
            <p><?php echo mb_substr($item['content'], 0, 100); ?>...</p>
            <a href="index.php?controller=news&action=detail&id=<?php echo $item['id']; ?>" class="btn btn-primary btn-sm">Xem chi tiết</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
