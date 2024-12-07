<h2>Đăng nhập quản trị</h2>
<?php if (!empty($error)): ?>
<p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>
<form method="POST" action="index.php?controller=auth&action=login">
    <label>Username:</label><br>
    <input type="text" name="username"><br>
    <label>Password:</label><br>
    <input type="password" name="password"><br><br>
    <button type="submit">Đăng nhập</button>
</form>
