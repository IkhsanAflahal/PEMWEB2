<?php

$laptop = ["Asus", "Lenovo", "HP", "Dell"];

//Menambahkan elemen di awal
array_unshift($laptop, "Acer","Realme");

//Hasil
echo "hasil";
foreach ($laptop as $p){
    echo "<br>".$p;
}
?>