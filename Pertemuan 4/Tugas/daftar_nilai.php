<table>
<?php 
require_once 'nilai_mahasiswa.php';

$data_mhs = [];

// Data Awal
$data_mhs[] = new NilaiMahasiswa("Hakim", "Pemrograman Web", 30, 25, 15);
$data_mhs[] = new NilaiMahasiswa("Ihsan", "Pemrograman Web", 12, 100, 100);
$data_mhs[] = new NilaiMahasiswa("Kaff", "Pemrograman Web", 60, 56, 63);

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $matkul = $_POST['matkul'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];
    $tugas = $_POST['tugas'];

    // Tambahkan data mahasiswa baru
    $data_mhs[] = new NilaiMahasiswa($nama, $matkul, $uts, $uas, $tugas);
}
?>

<h3>Input Data Mahasiswa</h3>
<form method="POST" action="">
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" required><br><br>
    <label for="matakuliah">Matkul</label>
    <input type="text" name="matkul" id="matakuliah" required><br><br>
    <label for="nilai_uts">UTS</label>
    <input type="number" name="uts" id="nilai_uts" required><br><br>
    <label for="nilai_uas">UAS</label>
    <input type="number" name="uas" id="nilai_uas" required><br><br>
    <label for="nilai_tugas">Tugas</label>
    <input type="number" name="tugas" id="nilai_tugas" required><br><br>
    <input type="submit" value="Simpan">
</form>

<h3>Daftar Nilai Mahasiswa</h3>
<table border="1" cellspacing="5" cellpadding="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Tugas</th>
            <th>Nilai Akhir</th>
            <th>Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nomor = 1;
            foreach ($data_mhs as $mhs) {
                echo "<tr>";
                echo "<td>" . $nomor . "</td>";
                echo "<td>" . htmlspecialchars($mhs->nama) . "</td>";
                echo "<td>" . htmlspecialchars($mhs->matakuliah) . "</td>";
                echo "<td>" . htmlspecialchars($mhs->nilai_uts) . "</td>";
                echo "<td>" . htmlspecialchars($mhs->nilai_uas) . "</td>";
                echo "<td>" . htmlspecialchars($mhs->nilai_tugas) . "</td>";
                echo "<td>" . number_format($mhs->getNA(), 2) . "</td>";
                echo "<td>" . htmlspecialchars($mhs->kelulusan()) . "</td>";
                echo "</tr>";
                $nomor++;
            }
        ?>
    </tbody>
</table>
