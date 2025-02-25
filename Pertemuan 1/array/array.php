<?php
$ar_buah = ["Semangka", "Jeruk", "Apel", "Mangga", "Melon"];

//memanggil array
 echo "buah ke 2 adalah  $ar_buah[2]";

//mencetak jumlah array
 echo "<br> Jumlah buah adalah " . count($ar_buah);

//mencetak seluruh buah
echo '<ol>';
    foreach ($ar_buah as $_buah) {
        echo'<li>' . $_buah . '</li>';
    }

echo '</ol>';
//menambahkan buah
$ar_buah[]="Nanas";

//hapus buah index ke 1
unset($ar_buah[1]);

//ubah index ke 4 menjadi melon
$ar_buah[4]="Durian";

//cetak seluruh buah dengan indexnya
echo'<ul>';
foreach ($ar_buah as $ak => $av) {
    echo '<li>Index: ' . $ak . ' Nama Buah: ' . $av . '</li>';
}
?>