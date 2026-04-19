<h2>Soal 1: Switch Case - Jenis Kendaraan</h2>
<p>Menentukan jenis kendaraan berdasarkan jumlah roda yang diinputkan.</p>


<form method="POST" action="" class="mb-4">
    <label>Masukkan Jumlah Roda:</label>
    <div>
        <input type="number" name="roda" min="1">
        <button type="submit" name="submit1">Cek</button>
    </div>
</form>

<?php
if (isset($_POST['submit1'])) {
    $roda = (int)$_POST['roda'];
    $jenis_kendaraan = "";

    switch ($roda) {
        case 1:
            $jenis_kendaraan = "Unicycle";
            break;
        case 2:
            $jenis_kendaraan = "Sepeda / Sepeda Motor";
            break;
        case 3:
            $jenis_kendaraan = "Becak / Bajaj";
            break;
        case 4:
            $jenis_kendaraan = "Mobil";
            break;
        case 6:
            $jenis_kendaraan = "Truk Kecil";
            break;
        default:
            $jenis_kendaraan = "Kendaraan tidak teridentifikasi / Kendaraan khusus";
            break;
    }

    echo "<div>";
    echo "<strong>Hasil:</strong> Kendaraan dengan <strong>$roda roda</strong> adalah <strong>$jenis_kendaraan</strong>.";
    echo "</div>";
}
?>