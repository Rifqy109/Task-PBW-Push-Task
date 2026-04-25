<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM buku WHERE ID = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0) {
        $buku = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 20px; 
            background-color: #f4f4f9; 
        }
        .container { 
            max-width: 500px; 
            margin: 50px auto; 
            background: white; 
            padding: 30px; 
            border-radius: 8px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.1); 
        }
        h2 { 
            text-align: center; 
            color: #333; 
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #0d6efd;
            outline: none;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }
        .btn {
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }
        .btn-kembali {
            background: #6c757d;
        }
        .btn-kembali:hover {
            background: #5c636a;
        }
        .btn-update {
            background: #0d6efd;
        }
        .btn-update:hover {
            background: #0b5ed7;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Data Buku</h2>
        
        <form action="proses_edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $buku['ID']; ?>">
            
            <div class="form-group">
                <label for="judul">Judul Buku</label>
                <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($buku['Judul']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" id="penulis" name="penulis" value="<?php echo htmlspecialchars($buku['Penulis']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="tahun">Tahun Terbit</label>
                <input type="number" id="tahun" name="tahun_terbit" value="<?php echo htmlspecialchars($buku['Tahun_Terbit']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="harga">Harga (Rp)</label>
                <input type="number" step="0.01" id="harga" name="harga" value="<?php echo htmlspecialchars($buku['Harga']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock" value="<?php echo htmlspecialchars($buku['Stock']); ?>" required>
            </div>
            
            <div class="btn-container">
                <a href="index.php" class="btn btn-kembali">Kembali</a>
                <button type="submit" class="btn btn-update">Update Data</button>
            </div>
        </form>
    </div>
</body>
</html>