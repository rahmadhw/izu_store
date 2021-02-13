<?php
session_start();
require "proses.php";
$id_profil = $_GET['id'];
$dapatkanidprofil = tampilproduk("SELECT * FROM akun_pelanggan WHERE id_pelanggan = $id_profil");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman profil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php require "menu.php"; ?>
    <div class="container text-center mt-3">
        <div class="row">
            <div class="col md-4 justify-content-center">
                <img src="gambar/<?= $dapatkanidprofil[0]['gambarproduk']; ?>" class="rounded-circle" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col md-8">
                <h4><?= $dapatkanidprofil[0]['nama_lengkap']; ?></h4>
                <h4><?= $dapatkanidprofil[0]['nomortelepon']; ?></h4>
                <h5>WEB DEVELOPER UNIVERSITAS LANCANG KUNING PEKANBARU</h5>
            </div>
        </div>
    </div>

</body>

</html>