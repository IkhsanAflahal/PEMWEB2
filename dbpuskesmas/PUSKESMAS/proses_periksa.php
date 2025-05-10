<?php
require_once 'dbkoneksi.php';

$_proses = $_POST['proses'] ?? $_GET['proses'] ?? '';
$_id = $_POST['idx'] ?? $_GET['idx'] ?? null;
$_tanggal = $_POST['tanggal'] ?? '';
$_berat = $_POST['berat'] ?? '';
$_tinggi = $_POST['tinggi'] ?? '';
$_tensi = $_POST['tensi'] ?? '';
$_keterangan = $_POST['keterangan'] ?? '';
$_pasien_id = $_POST['pasien_id'] ?? '';
$_dokter_id = $_POST['dokter_id'] ?? '';

if ($_proses == "Tambah") {
    $sql = "INSERT INTO periksa(tanggal,berat,tinggi,tensi,keterangan,pasien_id,dokter_id)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $data = [$_tanggal, $_berat, $_tinggi, $_tensi, $_keterangan, $_pasien_id, $_dokter_id];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

} elseif ($_proses == "Ubah") {
    $sql = "UPDATE periksa SET tanggal=?, berat=?, tinggi=?, tensi=?, keterangan=?, pasien_id=?, dokter_id=? WHERE id=?";
    $data = [$_tanggal, $_berat, $_tinggi, $_tensi, $_keterangan, $_pasien_id, $_dokter_id, $_id];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

} elseif ($_proses == "Hapus") {
    $sql = "DELETE FROM periksa WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_id]);
}

header('Location: data_periksa.php');
exit;
?>