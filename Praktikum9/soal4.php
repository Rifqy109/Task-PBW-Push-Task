<h2>Soal 4: Ternary Operator - Genap atau Ganjil</h2>
<p>Mengecek apakah angka yang diinputkan adalah ganjil atau genap menggunakan operator ternary ( ? : ).</p>

<form method="POST" action="">
    <label>Masukkan Sebuah Angka:</label>
    <div name="angka">
        <button type="submit" name="submit4">Cek</button>
    </div>
</form>

<?php
if (isset($_POST['submit4'])) {
    $angka = (int)$_POST['angka'];
    
    $status = ($angka % 2 == 0) ? "Genap" : "Ganjil";
    
    echo "<div>";
    echo "Angka <strong>$angka</strong> adalah bilangan <strong>$status</strong>.";
    echo "</div>";
}
?>