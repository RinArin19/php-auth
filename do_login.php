<?php
session_start();
require 'db.php';

$email    = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
        exit;
    } else {
        $_SESSION['msg'] = "Password salah.";
    }
} else {
    $_SESSION['msg'] = "Email tidak ditemukan.";
}

header("Location: login.php");
