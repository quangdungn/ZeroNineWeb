<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Website Tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<header class="mb-4">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">Tin Tức</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?controller=news&action=search">Tìm kiếm</a>
            </li>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1): ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?controller=admin&action=index">Quản trị</a>
            </li>
            <?php endif; ?>
          </ul>
          <ul class="navbar-nav ms-auto">
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1): ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?controller=auth&action=logout">Đăng xuất (<?php echo $_SESSION['username']; ?>)</a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?controller=auth&action=login">Đăng nhập</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>  
    </nav>
</header>
<div class="container">
