<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Cek kecocokan hash password
        if (password_verify($password, $row['password'])) {
            // Password benar, set session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['msg'] = "Password salah!";
            $_SESSION['msg_type'] = "danger";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['msg'] = "Username tidak ditemukan!";
        $_SESSION['msg_type'] = "danger";
        header("Location: login.php");
        exit();
    }
    
    $stmt->close();
} else {
    // Jika ada yang mengakses file ini tanpa melalui form POST
    header("Location: login.php");
    exit();
}
?>