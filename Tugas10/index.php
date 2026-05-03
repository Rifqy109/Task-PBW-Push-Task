<?php
require_once 'connect.php';

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$countQuery = "SELECT COUNT(*) as total FROM mahasiswa";
if ($search != '') {
    $countQuery .= " WHERE nama LIKE ?";
}
$stmtCount = $conn->prepare($countQuery);

if ($search != '') {
    $searchParam = "%$search%";
    $stmtCount->bind_param("s", $searchParam); // Prepared statement untuk pencarian
}

$stmtCount->execute();
$totalResult = $stmtCount->get_result()->fetch_assoc();
$total_data = $totalResult['total'];
$total_pages = ceil($total_data / $limit);
$dataQuery = "SELECT * FROM mahasiswa";
if ($search != '') {
    $dataQuery .= " WHERE nama LIKE ?";
}
$dataQuery .= " ORDER BY ID DESC LIMIT ? OFFSET ?";
$stmtData = $conn->prepare($dataQuery);

if ($search != '') {
    $stmtData->bind_param("sii", $searchParam, $limit, $offset);
} else {
    $stmtData->bind_param("ii", $limit, $offset);
}

$stmtData->execute();
$result = $stmtData->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - Tugas Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Mahasiswa</h4>
            <a href="tambah.php" class="btn btn-light btn-sm">+ Tambah Data</a>
        </div>
        <div class="card-body">

            <?php if(isset($_SESSION['msg'])): ?>
                <div class="alert alert-<?= $_SESSION['msg_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['msg'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                unset($_SESSION['msg']); 
                unset($_SESSION['msg_type']); 
                ?>
            <?php endif; ?>

            <form method="GET" action="index.php" class="mb-3 d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari nama mahasiswa..." value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
                <?php if($search != ''): ?>
                    <a href="index.php" class="btn btn-outline-secondary ms-2">Reset</a>
                <?php endif; ?>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = $offset + 1;
                        if($result->num_rows > 0): 
                            while($row = $result->fetch_assoc()): 
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['NPM']) ?></td>
                            <td><?= htmlspecialchars($row['Nama']) ?></td>
                            <td><?= htmlspecialchars($row['Prodi']) ?></td>
                            <td><?= htmlspecialchars($row['Email']) ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['ID'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapus.php?id=<?= $row['ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php 
                            endwhile; 
                        else: 
                        ?>
                        <tr>
                            <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if($total_pages > 1): ?>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php for($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?><?= ($search != '') ? '&search='.$search : '' ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
            <?php endif; ?>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>