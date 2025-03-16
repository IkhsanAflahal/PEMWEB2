<?php 
require_once 'nilai_mahasiswa.php';

$data_mhs =[];

//Data Awal
$data_mhs[] = new NilaiMahasiswa("Hakim","Pemrograman Web",30,25,15);
$data_mhs[] = new NilaiMahasiswa("Ihsan","Pemrograman Web",12,100,100);
$data_mhs[] = new NilaiMahasiswa("kaff","Pemrograman Web",60,56,63);

?>

<h3>Input data Mahasiswa</h3>
<form action="POST" action="">
    <label for="">Nama</label>
    <input type="text" name="nama" id="nama"><br><br>
    <label for="">Matkul</label>
    <input type="text" name="matkul" id="matakuliah"><br><br>
    <label for="">UTS</label>
    <input type="number" name="uts" id="nilai_uts"><br><br>
    <label for="">UAS</label>
    <input type="number" name="uas" id="nilai_uas"><br><br>
    <label for="">Tugas</label>
    <input type="number" name="tugas" id="nilai_tugas"><br><br>
    <input type="submit" value="Simpan">
</form>

<h3>daftar Nilai Mahasiswa</h3>
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
            foreach($data_mhs as $mhs){
                echo "<tr>";
                echo "<td>".$nomor."</td>";
                echo "<td>".$mhs->nama."</td>";
                echo "<td>".$mhs->matakuliah."</td>";
                echo "<td>".$mhs->nilai_uts."</td>";
                echo "<td>".$mhs->nilai_uas."</td>";
                echo "<td>".$mhs->nilai_tugas."</td>";
                echo "<td>" . number_format($mhs->getNA(), 2) . "</td>";
                echo "<td>".$mhs->kelulusan()."</td>";
                echo "</tr>";
                $nomor++;
            }
       ?>
       </tbody>