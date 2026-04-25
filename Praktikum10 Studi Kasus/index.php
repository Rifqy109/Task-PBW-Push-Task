<?php
// index.php
// Halaman utama - tampil data
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="style.css">

<body>
    <div class="container">
        <h2>Daftar Buku Qyyuu</h2>
        <a href="tambah.php" class="btn-tambah">+ Tambah Buku Baru</a>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Harga</th>
                    <th>Stock</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = "SELECT * FROM buku ORDER BY ID DESC";
                $result = mysqli_query($koneksi, $query);

                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row['Judul']); ?></td>
                    <td><?php echo htmlspecialchars($row['Penulis']); ?></td>
                    <td><?php echo htmlspecialchars($row['Tahun_Terbit']); ?></td>
                    <td>Rp <?php echo number_format($row['Harga'], 2, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($row['Stock']); ?></td>
                    <td class="text-center">
                        <a href="edit.php?id=<?php echo $row['ID']; ?>" class="btn-edit">Edit</a>
                        <a href="hapus.php?id=<?php echo $row['ID']; ?>" class="btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">Hapus</a>
                    </td>
                </tr>
                <?php 
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Data buku masih kosong.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>