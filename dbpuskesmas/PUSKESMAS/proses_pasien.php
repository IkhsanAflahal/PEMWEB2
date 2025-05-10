<?php
require_once 'dbkoneksi.php';

$_proses = $_POST['proses'] ?? $_GET['proses'] ?? '';
$_id = $_POST['idx'] ?? $_GET['idx'] ?? null;
$_kode = $_POST['kode'] ?? '';
$_nama = $_POST['nama'] ?? '';
$_tmp_lahir = $_POST['tmp_lahir'] ?? '';
$_tgl_lahir = $_POST['tgl_lahir'] ?? '';
$_gender = $_POST['gender'] ?? '';
$_email = $_POST['email'] ?? '';
$_alamat = $_POST['alamat'] ?? '';
$_kelurahan = $_POST['kelurahan'] ?? '';

// Tambah/Ubah otomatis
if ($_proses == "Tambah") {
    $sql = "INSERT INTO pasien(kode,nama,tmp_lahir,tgl_lahir,gender,email,alamat,kelurahan_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $data = [$_kode, $_nama, $_tmp_lahir, $_tgl_lahir, $_gender, $_email, $_alamat, $_kelurahan];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

} elseif ($_proses == "Ubah") {
    $sql = "UPDATE pasien SET kode=?, nama=?, tmp_lahir=?, tgl_lahir=?, gender=?, email=?, alamat=?, kelurahan_id=? WHERE id=?";
    $data = [$_kode, $_nama, $_tmp_lahir, $_tgl_lahir, $_gender, $_email, $_alamat, $_kelurahan, $_id];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

} elseif ($_proses == "Hapus") {
    $sql = "DELETE FROM pasien WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_id]);
}

header('Location: data_pasien.php');
exit;
?>