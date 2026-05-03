<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM mahasiswa WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['msg'] = "Data berhasil dihapus!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['msg'] = "Gagal menghapus data!";
        $_SESSION['msg_type'] = "danger";
    }
    
    $stmt->close();
}

header("Location: index.php");
exit();
?>