<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'cirebon_city';

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('Koneksi database gagal: ' . mysqli_connect_error() . '<br><br>Pastikan sudah buka <a href="install.php">install.php</a> dulu!');
}
mysqli_set_charset($conn, 'utf8mb4');

function rupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>