<?php
$host = 'localhost';
$user = 'root';
$pass = '';

$conn = mysqli_connect($host, $user, $pass);
if (!$conn) die('MySQL gagal: ' . mysqli_connect_error());

mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS cirebon_city CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
mysqli_select_db($conn, 'cirebon_city');
mysqli_set_charset($conn, 'utf8mb4');

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipe ENUM('produk','film') NOT NULL,
    ref_id INT NOT NULL,
    nama_item VARCHAR(200) NOT NULL,
    harga_satuan INT NOT NULL,
    jumlah INT NOT NULL DEFAULT 1,
    total INT NOT NULL,
    status ENUM('pending','selesai','batal') DEFAULT 'pending',
    tanggal DATETIME NOT NULL
) ENGINE=InnoDB");

echo '<div style="font-family:sans-serif;background:#0a0a0a;color:#fff;padding:40px;min-height:100vh">';
echo '<h1 style="color:#d4af37">✅ Database & Tabel Pesanan Siap!</h1>';
echo '<p>Tabel <b>pesanan</b> sudah dibuat di database <b>cirebon_city</b>.</p>';
echo '<p style="color:#888;font-size:13px">Hapus file install.php setelah selesai.</p>';
echo '<a href="tugas.html" style="display:inline-block;padding:14px 30px;background:#d4af37;color:#0a0a0a;border-radius:50px;text-decoration:none;font-weight:bold;margin-top:20px">Buka Website</a>';
echo '</div>';
?>