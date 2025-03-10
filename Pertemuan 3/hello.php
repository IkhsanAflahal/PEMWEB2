<?php
/*
Fungsi salam dengan parameter $nama
*/
function salam($nama = "nurul fikri", $greeting = "Hello, selamat datang!") {
    echo "$greeting $nama";
}

?>
<h1>Belajar Fungsi</h1>
<?php
    salam("Mahmud");
    echo "<br>";
    salam();
?>

