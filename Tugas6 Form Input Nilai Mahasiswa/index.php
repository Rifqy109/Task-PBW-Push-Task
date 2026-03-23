<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Nilai Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Form Input Nilai Mahasiswa</h2>
    <form method="post" action="">
        Nama    : <input type="text" name="nama"><br>
        NPM     : <input type="number" name="npm"><br>
        Mata Kuliah : <input type="text" name="matkul"><br>
        Nilai   : <input type="number" name="nilai"><br>
        <input type="submit" name="proses" value="Proses">
</body>
</html>

<?php
if (isset($_POST['proses'])) {
        $nama = $_POST['nama'];
        $npm = $_POST['npm'];
        $matkul = $_POST['matkul'];
        $nilai = $_POST['nilai'];
        $predikat = "";
        $status = "";
        
        if($nilai >= 85) {
            $predikat = "A";
        } elseif ($nilai >= 75) {
            $predikat = "B";
        } elseif ($nilai >= 65) {
            $predikat = "C";
        } elseif ($nilai >= 50) {
            $predikat = "D";
        } elseif ($nilai >= 0) {   
            $predikat = "E";
        } else {
            $predikat = "Tidak valid";
        }

        if ($predikat == "E" || $predikat == "Tidak valid") {
            $status = "Tidak Lulus";
        } else {
            $status = "Lulus";
        }

        echo "<h3>Hasil Pengolahan Nilai:</h3>";
        echo "Nama Mahasiswa: <b>$nama</b> <br>";
        echo "NPM           : <b>$npm</b> <br>";
        echo "Mata Kuliah   : <b>$matkul</b> <br>";
        echo "Nilai Ujian   : <b>$nilai</b> <br>";
        echo "Predikat      : <b>$predikat</b> <br>";
        echo "Status        : <b>$status</b> <br>";
}
?>
</form>