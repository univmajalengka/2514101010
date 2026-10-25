<?php
header('Content-Type: application/json');
require 'koneksi.php';

$tipe   = $_POST['tipe'] ?? '';
$ref_id = (int)($_POST['ref_id'] ?? 0);
$nama   = mysqli_real_escape_string($conn, $_POST['nama'] ?? '');
$harga  = (int)($_POST['harga'] ?? 0);
$jumlah = (int)($_POST['jumlah'] ?? 1);

if (!$tipe || !$ref_id || !$nama) {
    echo json_encode(['status' => 'error', 'pesan' => 'Data tidak lengkap']);
    exit;
}

$total = $harga * $jumlah;

$q = "INSERT INTO pesanan (tipe, ref_id, nama_item, harga_satuan, jumlah, total, status, tanggal)
      VALUES ('$tipe', $ref_id, '$nama', $harga, $jumlah, $total, 'pending', NOW())";

if (mysqli_query($conn, $q)) {
    echo json_encode([
        'status' => 'sukses',
        'id' => mysqli_insert_id($conn),
        'nama' => $nama,
        'total' => $total
    ]);
} else {
    echo json_encode(['status' => 'gagal', 'pesan' => mysqli_error($conn)]);
}
?>