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

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$kode = $_POST["kode"] ?? "";
$jumlahInput = $_POST["jumlah"] ?? "";
$jumlah = filter_var($jumlahInput, FILTER_VALIDATE_INT);

if (!isset($menu[$kode])) {
    $_SESSION["pesan"] = "Kode menu tidak valid.";
} elseif ($jumlah === false || $jumlah < 1 || $jumlah > 10) {
    $_SESSION["pesan"] = "Jumlah harus bilangan bulat 1 sampai 10.";
} else {
    $lama = $_SESSION["keranjang"][$kode] ?? 0;

    if ($lama + $jumlah > 10) {
        $_SESSION["pesan"] = "Jumlah menu maksimal 10.";
    } else {
        $_SESSION["keranjang"][$kode] = $lama + $jumlah;
        $_SESSION["pesan"] = "Pesanan berhasil ditambahkan!";
    }
}

header("Location: index.php");
exit;