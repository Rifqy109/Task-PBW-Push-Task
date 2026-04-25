<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM buku WHERE ID=?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error menghapus data: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);
} else {
    header("Location: index.php");
}

mysqli_close($koneksi);
?>