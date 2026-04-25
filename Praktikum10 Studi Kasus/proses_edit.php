<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun_terbit'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];

    $query = "UPDATE buku SET Judul=?, Penulis=?, Tahun_Terbit=?, Harga=?, Stock=? WHERE ID=?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "ssidii", $judul, $penulis, $tahun, $harga, $stock, $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);
} else {
    header("Location: index.php");
}

mysqli_close($koneksi);
?>