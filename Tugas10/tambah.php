<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $npm = trim($_POST['NPM']);
    $nama = trim($_POST['Nama']);
    $prodi = trim($_POST['Prodi']);
    $email = trim($_POST['Email']);
    $sql = "INSERT INTO mahasiswa (npm, nama, prodi, email) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $npm, $nama, $prodi, $email);

    if ($stmt->execute()) {
        $_SESSION['msg'] = "Data berhasil ditambahkan!";
        $_SESSION['msg_type'] = "success";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['msg'] = "Gagal menambahkan data: " . $stmt->error;
        $_SESSION['msg_type'] = "danger";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Tambah Data Mahasiswa</h4>
                </div>
                <div class="card-body">
                    <?php if(isset($_SESSION['msg'])): ?>
                        <div class="alert alert-<?= $_SESSION['msg_type'] ?>"><?= $_SESSION['msg'] ?></div>
                        <?php unset($_SESSION['msg']); unset($_SESSION['msg_type']); ?>
                    <?php endif; ?>

                    <form action="tambah.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">NPM</label>
                            <input type="text" name="NPM" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="Nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Program Studi</label>
                            <input type="text" name="Prodi" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="Email" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>