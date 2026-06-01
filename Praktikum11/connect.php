<?php
// Memulai session untuk menampung pesan flash (sukses/gagal)
session_start();

$host = "localhost";
$user = "root";
$pass = ""; // Kosongkan jika password root XAMPP Anda default (kosong)
$db   = "mahasiswa_praktikum10";

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>