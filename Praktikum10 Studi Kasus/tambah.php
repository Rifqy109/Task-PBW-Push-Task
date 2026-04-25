<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Baru</title>
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
            box-sizing: border-box; /* Agar padding tidak menambah lebar */
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
        .btn-simpan {
            background: #198754;
        }
        .btn-simpan:hover {
            background: #157347;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Buku Baru</h2>
        
        <form action="proses_tambah.php" method="POST">
            <div class="form-group">
                <label for="judul">Judul Buku</label>
                <input type="text" id="judul" name="judul" required>
            </div>
            
            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" id="penulis" name="penulis" required>
            </div>
            
            <div class="form-group">
                <label for="tahun">Tahun Terbit</label>
                <input type="number" id="tahun" name="tahun_terbit" required>
            </div>
            
            <div class="form-group">
                <label for="harga">Harga (Rp)</label>
                <input type="number" step="0.01" id="harga" name="harga" required>
            </div>
            
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock" required>
            </div>
            
            <div class="btn-container">
                <a href="index.php" class="btn btn-kembali">Kembali</a>
                <button type="submit" class="btn btn-simpan">Simpan Data</button>
            </div>
        </form>
    </div>
</body>
</html>