<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM mahasiswa WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if (!$data) {
        $_SESSION['msg'] = "Data tidak ditemukan!";
        $_SESSION['msg_type'] = "danger";
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_post = $_POST['id'];
    $npm = trim($_POST['npm']);
    $nama = trim($_POST['nama']);
    $prodi = trim($_POST['prodi']);
    $email = trim($_POST['email']);
    $updateSql = "UPDATE mahasiswa SET npm=?, nama=?, prodi=?, email=? WHERE ID=?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ssssi", $npm, $nama, $prodi, $email, $id_post);

    if ($updateStmt->execute()) {
        $_SESSION['msg'] = "Data berhasil diperbarui!";
        $_SESSION['msg_type'] = "success";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['msg'] = "Gagal memperbarui data: " . $updateStmt->error;
        $_SESSION['msg_type'] = "danger";
    }
    $updateStmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-warning">
                    <h4 class="mb-0">Edit Data Mahasiswa</h4>
                </div>
                <div class="card-body">
                    <form action="edit.php?id=<?= $id ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $data['ID'] ?>">
                        <div class="mb-3">
                            <label class="form-label">NPM</label>
                            <input type="text" name="npm" class="form-control" value="<?= htmlspecialchars($data['NPM']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['Nama']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Program Studi</label>
                            <input type="text" name="prodi" class="form-control" value="<?= htmlspecialchars($data['Prodi']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($data['Email']) ?>" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-warning">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>