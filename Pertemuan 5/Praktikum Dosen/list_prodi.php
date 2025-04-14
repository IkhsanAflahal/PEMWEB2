<?php
  require_once 'dbkoneksi.php';

  //Definisikan query
  $sql = "SELECT * FROM prodi";
  //Jalankan query
  $rs = $dbh->query($sql);
  //Tampilkan hasil query

?>
<table border="1" width="100%">
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama Prodi</th>
        <th>Aksi</th>
    </tr>
    <?php
    $nomor = 1;
    foreach ($rs as $row){
    ?>
    <tr>
        <td><?php echo $nomor;?></td>
        <td><?php echo $row->kode; ?></td>
        <td><?php echo $row->nama?></td>
        <td><?php echo $row->kaprodi; ?></td>
        <td>
            <a href="form_prodi.php?id_edit=<?php echo $row->id; ?>">Edit</a>
            <a href="proses_prodi.php?id_hapus=<?php echo $row->id; ?>">Hapus</a>
        </td>
    </tr>
    <?php $nomor++; } ?>
</table>