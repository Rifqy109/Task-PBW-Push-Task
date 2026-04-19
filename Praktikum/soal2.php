<h2>Soal 2: For Loop - Bilangan Genap</h2>
<p>Mencetak bilangan genap dari 2 sampai batas angka yang Anda tentukan.</p>

<!-- Form Input Dinamis -->
<form method="POST" action="" class="mb-4">
    <label>Masukkan Batas Angka (Max):</label>
    <div>
        <input type="number" name="batas" min="2" value="10">
        <button type="submit" name="submit2">Proses</button>
    </div>
</form>

<?php
if (isset($_POST['submit2'])) {
    $batas = (int)$_POST['batas'];
    
    echo "<div>";
    echo "</div>";
    echo "<strong>Output (Bilangan Genap 2 sampai $batas):</strong><br>";
    echo "<div>";
    echo "</div>";
    
    for ($i = 2; $i <= $batas; $i += 2) {
        echo $i . " ";
    }
}
?>