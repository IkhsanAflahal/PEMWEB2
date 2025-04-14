<?php
  require_once 'dbkoneksi.php';

  //Definisikan query
  $sql = "SELECT * FROM mahasiswa ORDER BY thn_masuk DESC";
  //Jalankan query
  $rs = $dbh->query($sql);
  //Tampilkan hasil query
  foreach($rs as $row){
    echo "<br>".$row->nim .'-'.$row->nama;
  }
?>