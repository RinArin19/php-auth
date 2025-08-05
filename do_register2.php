<?php
session_start();
require 'db.php';

$nama       = $_POST['nama'];
$email      = $_POST['email'];
$alamat     = $_POST['alamat'];
$pekerjaan  = $_POST['pekerjaan'];
$password   = $_POST['password'];
$repassword = $_POST['repassword'];
$captcha    = $_POST['captcha'] ?? '';

// Validasi captcha
if (strtoupper(trim($captcha)) !== $_SESSION['captcha']) {
    $_SESSION['msg'] = "Captcha salah.";
    header("Location: register_2.php");
    exit;
}

// Validasi password
if ($password !== $repassword) {
    $_SESSION['msg'] = "Password tidak cocok.";
    header("Location: register_2.php");
    exit;
}

// Upload foto
$foto_name = time() . "_" . $_FILES['foto']['name'];
$tmp_name  = $_FILES['foto']['tmp_name'];
$upload_dir = "uploads/";
move_uploaded_file($tmp_name, $upload_dir . $foto_name);

// Hash password
$hashed = password_hash($password, PASSWORD_DEFAULT);

// Simpan ke DB
$stmt = $conn->prepare("INSERT INTO users (nama, email, alamat, pekerjaan, foto, password) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nama, $email, $alamat, $pekerjaan, $foto_name, $hashed);

if ($stmt->execute()) {
    $_SESSION['msg'] = "Registrasi berhasil. Silakan login.";
    header("Location: register_2.php");
} else {
    $_SESSION['msg'] = "Gagal mendaftar: Email mungkin sudah digunakan.";
    header("Location: register_2.php");
}
