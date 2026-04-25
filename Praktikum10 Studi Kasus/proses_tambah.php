<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun_terbit'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];

    $query = "INSERT INTO buku (Judul, Penulis, Tahun_Terbit, Harga, Stock) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);

    mysqli_stmt_bind_param($stmt, "ssidi", $judul, $penulis, $tahun, $harga, $stock);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);
} else {
    header("Location: tambah.php");
}

mysqli_close($koneksi);
?>