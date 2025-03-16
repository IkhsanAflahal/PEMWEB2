<?php

// Class Persegi Panjang
class PersegiPanjang {
    public $panjang;
    public $lebar;

    // Konstruktor Persegi Panjang
    function __construct($panjang, $lebar) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    // Method hitung luas persegi panjang
    function getLuas() {
        $luasPP = $this->panjang * $this->lebar;
        return $luasPP;
    }

    // Method hitung keliling persegi panjang
    function getKeliling() {
        $kelilingPP = 2 * ($this->panjang + $this->lebar);
        return $kelilingPP; // Menambahkan return untuk keliling
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="section">

    <h2>Contoh Penggunaan Persegi Panjang</h2>

    <?php
    $pp = new PersegiPanjang(10, 8);

    echo "Panjang: ". $pp->panjang. "<br>";
    echo "Lebar: ". $pp->lebar. "<br>";
    echo '<hr>'; // Menambahkan titik koma yang hilang
    echo "Luas: ". $pp->getLuas(). "<br>";
    echo "Keliling: ". $pp->getKeliling(). "<br>";
    ?>

    </div>
</body>
</html>