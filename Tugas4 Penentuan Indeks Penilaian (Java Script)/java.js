document.getElementById('btnCek').addEventListener('click', function() {
    const nama = document.getElementById('nama').value;
    const nim = document.getElementById('nim').value;
    const nilaiInput = document.getElementById('nilai').value;
    const elemenHasil = document.getElementById('hasil');

    if (nim.trim() === '' || nilaiInput.trim() === '' || nama.trim() === '') {
        elemenHasil.className = 'result-box show error';
        elemenHasil.innerHTML = '<p>Harap isi Nama, NIM dan Nilai terlebih dahulu!</p>';
        return;
        }

    const nilai = parseFloat(nilaiInput);

    if (nilai < 0 || nilai > 100 || isNaN(nilai)) {

        elemenHasil.className = 'result-box show error';
        elemenHasil.innerHTML = '<p>Nilai tidak valid!</p>';
        } else {

            let hurufMutu = '';
                
            if (nilai >= 80 && nilai <= 100) {
                hurufMutu = 'A';
            } else if (nilai >= 70 && nilai < 80) { 
                hurufMutu = 'B';
            } else if (nilai >= 60 && nilai < 70) { 
                hurufMutu = 'C';
            } else if (nilai >= 50 && nilai < 60) { 
                hurufMutu = 'D';
            } else if (nilai >= 0 && nilai < 50) {  
                hurufMutu = 'E';
            }

        elemenHasil.className = 'result-box show success';
        elemenHasil.innerHTML = `
            <p>Nama: <strong>${nama}</strong></p>
            <p>NIM: <strong>${nim}</strong></p>
            <p>Nilai: <strong>${nilai}</strong></p>
            <p>Huruf Mutu Anda:</p>
            <p class="grade">${hurufMutu}</p>
            `;
            }
        });