<?php
    include 'Proses.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas5 HTML dan PHP Sederhana</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="kotak-hasil">
    <h2>Perhitungan Total Pembelian (Dengan Array)</h2>
    <hr>
    <div class="isi-teks">
        Nama Barang: <?php echo $barang["nama"]; ?><br>
        Harga Satuan: <?php echo format_rp($barang["harga"]); ?><br>
        Jumlah Beli: <?php echo $jumlah_beli; ?><br>
        Total Harga (Sebelum Pajak): <?php echo format_rp($total_sebelum_pajak); ?><br>
        Pajak (10%): <?php echo format_rp($nilai_pajak); ?><br>
        <strong>Total Bayar: <?php echo format_rp($total_bayar); ?></strong>
    </div>
</div>

</body>
</html>