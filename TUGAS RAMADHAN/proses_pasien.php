<?php
require_once 'dbkoneksi.php';

$_kode = $_POST['kode'];
$_nama = $_POST['nama'];
$_tmp_lahir = $_POST['tmp_lahir'];
$_tgl_lahir = $_POST['tgl_lahir'];
$_gender = $_POST['gender'];
$_email = $_POST['email'];
$_alamat = $_POST['alamat'];
$_klurahan_id = $_POST['klurahan_id'];

$_proses = $_POST['proses'];

if($_proses == "Simpan") {
    if(isset($_POST['idx']) && !empty($_POST['idx'])){
        $_idx = $_POST['idx'];
        $sql = "UPDATE pasien SET kode=?,nama=?,tmp_lahir=?,tgl_lahir=?,
                gender=?,email=?,alamat=?,klurahan_id=? WHERE id=?";
        $data = [$_kode, $_nama, $_tmp_lahir, $_tgl_lahir,
                $_gender, $_email, $_alamat, $_klurahan_id, $_idx];
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);
    } else {
        $sql = "INSERT INTO pasien(kode,nama,tmp_lahir,tgl_lahir,gender,email,alamat,klurahan_id)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $data = [$_kode, $_nama, $_tmp_lahir, $_tgl_lahir,
                $_gender, $_email, $_alamat, $_klurahan_id];
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);
    }
} else if($_proses == "Batal" && isset($_GET['id'])){
    $_id = $_GET['id'];
    $sql = "DELETE FROM pasien WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_id]);
} else if(isset($_GET['proses']) && $_GET['proses'] == "Hapus"){
    $_id = $_GET['id'];
    $sql = "DELETE FROM pasien WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_id]);
}

// redirect page ke halaman data_pasien.php
header('Location: data_pasien.php');
?>
