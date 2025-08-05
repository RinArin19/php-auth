<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
          <h4>Form Registrasi</h4>
        </div>
        <div class="card-body">
          <?php if (isset($_SESSION['msg'])): ?>
            <div class="alert alert-info"><?= $_SESSION['msg']; unset($_SESSION['msg']); ?></div>
          <?php endif; ?>
          <form action="do_register.php" method="POST" enctype="multipart/form-data">
            <div class="mb-2"><input class="form-control" type="text" name="nama" placeholder="Nama" required></div>
            <div class="mb-2"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
            <div class="mb-2"><textarea class="form-control" name="alamat" placeholder="Alamat" required></textarea></div>
            <div class="mb-2"><input class="form-control" type="text" name="pekerjaan" placeholder="Pekerjaan" required></div>
            <div class="mb-2"><input class="form-control" type="file" name="foto" required></div>
            <div class="mb-2"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
            <div class="mb-2"><input class="form-control" type="password" name="repassword" placeholder="Ulangi Password" required></div>
            <div class="mb-3">
              <div class="g-recaptcha" data-sitekey="6LdYzZorAAAAABIkti0AuPl-o7fdyvfkDOTJ3-Hn"></div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Daftar</button>
          </form>
        </div>
        <div class="card-footer text-center">
          Sudah punya akun? <a href="login.php">Login di sini</a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
