```php
<?php
session_start();

$menu = [
    ["kode"=>"M01", "nama"=>"Nasi Goreng", "kategori"=>"Makanan", "harga"=>15000],
    ["kode"=>"M02", "nama"=>"Mie Goreng", "kategori"=>"Makanan", "harga"=>12000],
    ["kode"=>"M03", "nama"=>"Ayam Geprek", "kategori"=>"Makanan", "harga"=>20000],
    ["kode"=>"M04", "nama"=>"Es Teh", "kategori"=>"Minuman", "harga"=>5000],
    ["kode"=>"M05", "nama"=>"Jus Jeruk", "kategori"=>"Minuman", "harga"=>10000],
    ["kode"=>"M06", "nama"=>"Roti Cokelat", "kategori"=>"Makanan", "harga"=>8000]
];

if (!isset($_SESSION["keranjang"])) {
    $_SESSION["keranjang"] = [];
}

$keyword = $_GET["cari"] ?? "";

function rupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kantin Kampus</title>
<style>
*{box-sizing:border-box}
body{
    margin:0;
    font-family:Arial,sans-serif;
    background:#f0faf6;
    color:#24483d;
}
header{
    background:linear-gradient(135deg,#3d9278,#9bd7bd);
    color:white;
    text-align:center;
    padding:30px 15px;
}
header h1{margin:0 0 10px}
main{max-width:1000px;margin:25px auto;padding:0 18px}
.toolbar{
    display:flex;gap:10px;flex-wrap:wrap;
    margin-bottom:24px;
}
input{
    padding:12px;border:1px solid #b6d8ca;
    border-radius:9px;font-size:15px;
}
button,.link{
    border:0;border-radius:9px;padding:12px 16px;
    background:#34856c;color:white;
    text-decoration:none;cursor:pointer;
}
button:hover,.link:hover{background:#24664f}
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:18px;
}
.card{
    background:white;padding:20px;border-radius:15px;
    box-shadow:0 4px 14px #24483d12;
    border:1px solid #dcefe6;
}
.icon{font-size:35px}
.card h3{margin-bottom:8px}
.price{font-weight:bold;color:#278262;font-size:19px}
.category{
    display:inline-block;background:#e3f5ec;
    padding:5px 10px;border-radius:20px;font-size:12px;
}
.card form{display:flex;gap:8px;margin-top:15px}
.card input{width:75px;min-width:0}
.notice{
    background:#dff4e9;padding:12px;
    border-radius:9px;margin-bottom:18px;
}
footer{text-align:center;padding:25px;color:#688579}
@media(max-width:500px){
    .toolbar input{width:100%}
}
</style>
</head>
<body>
<header>
    <h1>🍃 Kantin Kampus</h1>
    <p>Pesan makanan favoritmu dengan mudah!</p>
</header>

<main>
    <?php if (!empty($_SESSION["pesan"])): ?>
        <div class="notice">
            <?= htmlspecialchars($_SESSION["pesan"], ENT_QUOTES, "UTF-8") ?>
        </div>
        <?php unset($_SESSION["pesan"]); ?>
    <?php endif; ?>

    <div class="toolbar">
        <form method="GET">
            <input type="text" name="cari"
                placeholder="Cari nama menu..."
                value="<?= htmlspecialchars($keyword, ENT_QUOTES, "UTF-8") ?>">
            <button type="submit">🔍 Cari</button>
        </form>
        <a class="link" href="keranjang.php">🛒 Lihat Keranjang</a>
    </div>

    <h2>Menu Pilihan 🍽️</h2>
    <div class="grid">
    <?php
    $ditemukan = false;
    foreach ($menu as $item):
        if (stripos($item["nama"], $keyword) !== false):
            $ditemukan = true;
    ?>
        <div class="card">
            <div class="icon">🍱</div>
            <span class="category">
                <?= htmlspecialchars($item["kategori"]) ?>
            </span>
            <h3><?= htmlspecialchars($item["nama"]) ?></h3>
            <p>Kode: <?= htmlspecialchars($item["kode"]) ?></p>
            <p class="price"><?= rupiah($item["harga"]) ?></p>
            <form action="proses.php" method="POST">
                <input type="hidden" name="kode"
                    value="<?= htmlspecialchars($item["kode"]) ?>">
                <input type="number" name="jumlah"
                    min="1" max="10" value="1" required>
                <button type="submit">Tambah</button>
            </form>
        </div>
    <?php
        endif;
    endforeach;
    ?>
    </div>

    <?php if (!$ditemukan): ?>
        <div class="notice">Menu tidak ditemukan. Coba kata kunci lain.</div>
    <?php endif; ?>
</main>

<footer>© 2026 Kantin Kampus | Pemesanan Mudah dan Praktis 🌿</footer>
</body>
</html>
```
