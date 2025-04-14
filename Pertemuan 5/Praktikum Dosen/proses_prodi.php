<?php
require_once 'dbkoneksi.php';

// tangkap data dari form
$_kode = $_POST['kode'];
$_nama = $_POST['nama'];
$_kaprodi = $_POST['kaprodi']; 
$_proses = $_POST['proses'];

// buat array data
$ar_data = [$_kode, $_nama, $_kaprodi];

// buat query berdasarkan proses
if($_proses == "Simpan"){
    $sql = "INSERT INTO prodi(kode,nama,kaprodi) VALUES (?,?,?)";
}elseif($_proses == "Update"){
    $id_edit = $_POST['id_edit'];
    $ar_data[] = $id_edit;
    $sql = "UPDATE prodi SET kode=?, nama=?, kaprodi=? WHERE id=?";
}elseif($_proses == "Hapus"){
    $id_hapus = $_POST['id_hapus'];
    $ar_data = [$id_hapus]; // hanya id yang dibutuhkan
    $sql = "DELETE FROM prodi WHERE id=?";
} else {
    // Jika proses tidak dikenali, hentikan
    die("Proses tidak dikenali.");
}

// buat statement
$stmt = $dbh->prepare($sql);
// jalankan query
$stmt->execute($ar_data);

// redirect ke halaman list_prodi.php
header('location: list_prodi.php');
?>
