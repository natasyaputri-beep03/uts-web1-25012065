<?php

function rupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

function hitungSubtotal($harga, $jumlah) {
    return $harga * $jumlah;
}

function hitungDiskon($subtotal) {
    return $subtotal >= 50000 ? $subtotal * 0.10 : 0;
}

function hitungTotal($subtotal, $diskon) {
    return $subtotal - $diskon;
}
