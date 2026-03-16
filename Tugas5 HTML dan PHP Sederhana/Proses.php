<?php
define("PAJAK", 0.10);

$barang = array(
    "nama" => "Keyboard",
    "harga" => 150000
);

$jumlah_beli = 2;

$total_sebelum_pajak = $barang["harga"] * $jumlah_beli;
$nilai_pajak = $total_sebelum_pajak * PAJAK;
$total_bayar = $total_sebelum_pajak + $nilai_pajak;

function format_rp($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}
?>