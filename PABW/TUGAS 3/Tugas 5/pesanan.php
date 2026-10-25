<?php
require 'koneksi.php';
$pesanan = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM pesanan ORDER BY id DESC"), MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Daftar Pesanan | Cirebon City</title>
<style>
body{font-family:sans-serif;background:#0a0a0a;color:#fff;padding:40px 20px}
h1{color:#d4af37;text-align:center;margin-bottom:30px}
table{width:100%;max-width:1100px;margin:0 auto;border-collapse:collapse;background:#1a1a1a;border-radius:12px;overflow:hidden}
th,td{padding:14px;text-align:left;border-bottom:1px solid #333}
th{background:#d4af37;color:#0a0a0a;text-transform:uppercase;font-size:12px}
tr:hover td{background:#222}
.gold{color:#d4af37;font-weight:700}
.empty{text-align:center;padding:60px;color:#888}
.btn{display:block;width:max-content;margin:30px auto;padding:14px 30px;background:#d4af37;color:#0a0a0a;border-radius:50px;text-decoration:none;font-weight:bold}
</style>
</head>
<body>
<h1>Daftar Pesanan</h1>
<?php if (count($pesanan) > 0): ?>
<table>
<thead>
<tr><th>ID</th><th>Tipe</th><th>Item</th><th>Harga</th><th>Qty</th><th>Total</th><th>Tanggal</th></tr>
</thead>
<tbody>
<?php foreach ($pesanan as $p): ?>
<tr>
<td>#<?= $p['id'] ?></td>
<td><?= $p['tipe'] ?></td>
<td><?= htmlspecialchars($p['nama_item']) ?></td>
<td><?= rupiah($p['harga_satuan']) ?></td>
<td><?= $p['jumlah'] ?>x</td>
<td class="gold"><?= rupiah($p['total']) ?></td>
<td><?= date('d/m H:i', strtotime($p['tanggal'])) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php else: ?>
<div class="empty">Belum ada pesanan. Klik Beli di website untuk mulai.</div>
<?php endif; ?>
<a href="tugas.html" class="btn">Kembali ke Website</a>
</body>
</html>