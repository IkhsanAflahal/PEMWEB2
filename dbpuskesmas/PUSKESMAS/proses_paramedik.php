<?php
require_once 'dbkoneksi.php';

$_proses = $_POST['proses'] ?? $_GET['proses'] ?? '';
$_id = $_POST['idx'] ?? $_GET['idx'] ?? null;
$_nama = $_POST['nama'] ?? '';
$_gender = $_POST['gender'] ?? '';
$_tmp_lahir = $_POST['tmp_lahir'] ?? '';
$_tgl_lahir = $_POST['tgl_lahir'] ?? '';
$_kategori = $_POST['kategori'] ?? '';
$_telpon = $_POST['telpon'] ?? '';
$_alamat = $_POST['alamat'] ?? '';
$_unit_kerja = $_POST['unit_kerja'] ?? '';

if ($_proses == "Tambah") {
    $sql = "INSERT INTO paramedik(nama,gender,tmp_lahir,tgl_lahir,kategori,telpon,alamat,unit_kerja_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $data = [$_nama, $_gender, $_tmp_lahir, $_tgl_lahir, $_kategori, $_telpon, $_alamat, $_unit_kerja];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

} elseif ($_proses == "Ubah") {
    $sql = "UPDATE paramedik SET nama=?, gender=?, tmp_lahir=?, tgl_lahir=?, kategori=?, telpon=?, alamat=?, unit_kerja_id=? WHERE id=?";
    $data = [$_nama, $_gender, $_tmp_lahir, $_tgl_lahir, $_kategori, $_telpon, $_alamat, $_unit_kerja, $_id];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

} elseif ($_proses == "Hapus") {
    $sql = "DELETE FROM paramedik WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_id]);
}

header('Location: data_paramedik.php');
exit;
?>