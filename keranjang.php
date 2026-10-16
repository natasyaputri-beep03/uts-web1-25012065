```php
<?php
session_start();

$menu = [
    "M01" => ["nama" => "Nasi Goreng", "harga" => 15000],
    "M02" => ["nama" => "Mie Goreng", "harga" => 12000],
    "M03" => ["nama" => "Ayam Geprek", "harga" => 20000],
    "M04" => ["nama" => "Es Teh", "harga" => 5000],
    "M05" => ["nama" => "Jus Jeruk", "harga" => 10000],
    "M06" => ["nama" => "Roti Cokelat", "harga" => 8000]
];

if (!isset($_SESSION["keranjang"])) {
    $_SESSION["keranjang"] = [];
}

$subtotal = 0;

foreach ($_SESSION["keranjang"] as $kode => $jumlah) {
    if (isset($menu[$kode])) {
        $subtotal += $menu[$kode]["harga"] * $jumlah;
    }
}

$diskon = $subtotal >= 50000 ? $subtotal * 0.10 : 0;
$total = $subtotal - $diskon;

function rupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Keranjang Kantin</title>
<style>
body{font-family:Arial;background:#f0faf6;color:#24483d;margin:0}
header{background:#3d9278;color:white;text-align:center;padding:25px}
main{max-width:800px;margin:30px auto;padding:20px}
.card{background:white;padding:20px;border-radius:14px;margin-bottom:15px}
button,a{background:#34856c;color:white;border:0;padding:10px 15px;border-radius:8px;text-decoration:none;cursor:pointer}
.total{background:#dff4e9;padding:18px;border-radius:12px}
</style>
</head>
<body>
<header>
<h1>🛒 Keranjang Pesanan</h1>
<p>Kantin Kampus</p>
</header>
<main>
<a href="index.php">← Kembali ke Menu</a>
<h2>Pesanan Kamu</h2>

<?php if (empty($_SESSION["keranjang"])): ?>
    <div class="card">Keranjang masih kosong.</div>
<?php else: ?>
    <?php foreach ($_SESSION["keranjang"] as $kode => $jumlah): ?>
        <?php if (isset($menu[$kode])): ?>
        <div class="card">
            <h3><?= htmlspecialchars($menu[$kode]["nama"]) ?></h3>
            <p>Harga: <?= rupiah($menu[$kode]["harga"]) ?></p>
            <p>Jumlah: <?= $jumlah ?></p>
            <p>Subtotal: <?= rupiah($menu[$kode]["harga"] * $jumlah) ?></p>
            <form action="proses.php" method="POST">
                <input type="hidden" name="hapus" value="<?= htmlspecialchars($kode) ?>">
                <button type="submit">Hapus Item</button>
            </form>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <div class="total">
        <p>Subtotal: <?= rupiah($subtotal) ?></p>
        <p>Diskon: <?= rupiah($diskon) ?></p>
        <h2>Total Pembayaran: <?= rupiah($total) ?></h2>
        <form action="proses.php" method="POST">
            <input type="hidden" name="kosongkan" value="1">
            <button type="submit">Kosongkan Keranjang</button>
        </form>
    </div>
<?php endif; ?>
</main>
</body>
</html>
```
