<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "php_auth";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
