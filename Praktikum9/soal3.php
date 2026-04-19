<h2>Soal 3: Foreach - Daftar Hewan</h2>
<p>Menampilkan array yang berisi nama-nama hewan menggunakan foreach.</p>

<form method="POST" action="">
    <label>Masukkan Minimal 5 Nama Hewan (pisahkan dengan koma):</label>
    <div>
        <input type="text" name="hewan" placeholder="Kucing, Anjing, Harimau, Gajah, Singa">
        <button type="submit" name="submit3">Tampilkan</button>
    </div>
</form>

<?php
if (isset($_POST['submit3'])) {
   
    $input_string = $_POST['hewan'];
    $array_hewan = explode(',', $input_string);
    
    echo "<div>";
    echo "</div>";
    echo "<strong>Daftar Hewan:</strong>";
    echo "<ul>";
    echo "</ul>";
    foreach ($array_hewan as $hewan) {
        echo "<li>" . trim($hewan) . "</li>";
    }
}
?>