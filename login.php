<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="col-md-6 mx-auto card p-4">
    <h3 class="text-center mb-3">Login</h3>
    <?php if (isset($_SESSION['msg'])): ?>
      <div class="alert alert-info"><?= $_SESSION['msg']; unset($_SESSION['msg']); ?></div>
    <?php endif; ?>
    <form action="do_login.php" method="POST">
      <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
      <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
      <button class="btn btn-success w-100" type="submit">Login</button>
    </form>
    <div class="text-center mt-3">Belum punya akun? <a href="register.php">Daftar</a></div>
  </div>
</div>
</body>
</html>
