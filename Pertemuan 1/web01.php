<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>Selamat belajar PHP</h1>
    <?php
        $_nama = "M.Ikhsan Aflahal";
        $_umur = 20;
        $_prodi = "Teknik Informatika";
        $_ipk = 3.5;    
    ?>
    <p>Nama : <?php echo $_nama . ' umurnya : ' . $_umur; ?></p>
    <p>Umur : <?=$_umur;?></p>
    <p>Prodi : <?php echo $_prodi; ?></p>
    <p>ipk : <?=$_ipk;?></p>

    <hr>
        <?php
            echo "Apa Kabar $_nama ?";
        ?>
    </hr>
</body>
</html>