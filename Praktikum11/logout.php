<?php
session_start();

// Hapus semua variabel session
session_unset();

// Hancurkan session
session_destroy();

// Mulai ulang session untuk mengirim pesan (jika dibutuhkan)
session_start();
$_SESSION['msg'] = "Anda telah berhasil logout.";
$_SESSION['msg_type'] = "info";

// Arahkan ke halaman login
header("Location: login.php");
exit();
?>