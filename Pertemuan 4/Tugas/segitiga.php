<?php

// Class Segitiga
class Segitiga {
    public $alas;
    public $tinggi;
    public $sisiA;
    public $sisiB;
    public $sisiC;

    // Konstruktor Segitiga
    function __construct($alas, $tinggi, $sisiA, $sisiB, $sisiC) {
        $this->alas = $alas;
        $this->tinggi = $tinggi;
        $this->sisiA = $sisiA;
        $this->sisiB = $sisiB;
        $this->sisiC = $sisiC;
    }

    // Method hitung luas segitiga
    function getLuas() {
        $luasSegitiga = 0.5 * $this->alas * $this->tinggi;
        return $luasSegitiga;
    }

    // Method hitung keliling segitiga
    function getKeliling() {
        $kelilingSegitiga = $this->sisiA + $this->sisiB + $this->sisiC;
        return $kelilingSegitiga;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segitiga</title>
</head>
<body>
    <div class="section">

    <h2>Contoh Penggunaan Segitiga</h2>

    <?php
    // Membuat objek segitiga dengan alas, tinggi, dan panjang sisi
    $segitiga = new Segitiga(10, 5, 10, 8, 6);

    echo "Alas: ". $segitiga->alas. "<br>";
    echo "Tinggi: ". $segitiga->tinggi. "<br>";
    echo "Sisi A: ". $segitiga->sisiA. "<br>";
    echo "Sisi B: ". $segitiga->sisiB. "<br>";
    echo "Sisi C: ". $segitiga->sisiC. "<br>";
    echo '<hr>'; // Menambahkan garis pemisah
    echo "Luas: ". $segitiga->getLuas(). "<br>";
    echo "Keliling: ". $segitiga->getKeliling(). "<br>";
    ?>

    </div>
</body>
</html>