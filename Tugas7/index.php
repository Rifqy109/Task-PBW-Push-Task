<?php 
$npm = "";
$nama = "";
$prodi = "";
$semester = "";
$ukt = "";
$diskonstr = "";

if(isset($_POST['submit'])){
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];
    $ukt = $_POST['ukt'];

    if($ukt >= 5000000 && $semester > 8){
        $diskon = $ukt*15/100;
        $total = $ukt - $diskon;
        $diskonstr = "15%";
    }else if($ukt >= 5000000){
        $diskon = $ukt*5/100;
        $total = $ukt - $diskon;
        $diskonstr = "5%";
    }else{
        $diskonstr = "Tidak dapat diskon";
        $total = $ukt;
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas7</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>NPM</td>
                <td>:</td>
                <td><input type="number" name="npm"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td>:</td>
                <td><input type="text" name="prodi"></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td><input type="number" name="semester"></td>
            </tr>
            <tr>
                <td>Biaya UKT</td>
                <td>:</td>
                <td><input type="number" name="ukt"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Submit!</button></td>
            </tr>
        </table>
    </form>

    <?php if($nama != ""): ?>
        <h3>Hasil:</h3>
        <table>
            <tr>
                <td>NPM</td>
                <td>:</td>
                <td><?= $npm ?> <br></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $nama ?> <br></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td>:</td>
                <td><?= $prodi ?> <br></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td><?= $semester ?> <br></td>
            </tr>
            <tr>
                <td>Biaya UKT</td>
                <td>:</td>
                <td><?= $ukt ?> <br></td>
            </tr>
            <tr>
                <td>Diskon</td>
                <td>:</td>
                <td><?= $diskonstr ?> <br></td>
            </tr>
            <tr>
                <td>Total harga</td>
                <td>:</td>
                <td><?= $total ?> <br></td>
            </tr>
        </table>
    <?php endif; ?>

</body>
</html>