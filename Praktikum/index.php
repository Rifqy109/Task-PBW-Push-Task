<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">    
    <title>INDEX</title>
</head>
<body>

    <div>
        <h1>Tugas Praktikum PHP</h1>
        <label for="nama">Nama  :</label>
        <label for="nama">Rifqy kurniawan Fattahillah</label><br><br>

        <label for="nim">NIM   :</label>
        <label for="nim">2410631170104</label><br><br>

        <label for="kelas">Kelas:</label>
        <label for="kelas">IF - 4C</label><br><br>

        <?php include 'menu.php'; ?>

        <div>
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                
                $allowed_pages = ['soal1', 'soal2', 'soal3', 'soal4'];
                
                if (in_array($page, $allowed_pages)) {
                    include $page . '.php';
                } else {
                    echo "<p>Halaman tidak ditemukan!</p>";
                }
            } else {
                echo "<p>Silakan pilih menu di atas untuk melihat jawaban masing-masing soal.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>