<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card">
    <div class="card-body">
      <h3>Selamat datang, <?= htmlspecialchars($user['nama']) ?>!</h3>
      <p>Email: <?= htmlspecialchars($user['email']) ?></p>
      <p>Pekerjaan: <?= htmlspecialchars($user['pekerjaan']) ?></p>
      <img src="uploads/<?= htmlspecialchars($user['foto']) ?>" width="100" class="rounded mb-3">
      <br>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
</div>
</body>
</html>
