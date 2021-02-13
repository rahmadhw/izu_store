<?php
session_start();
require "proses.php";
if (isset($_POST['daftar'])) {
    daftaruser();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman daftar user</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php require "menu.php"; ?>
    <h4 class="text-center mt-3 mb-3">daftar sekarang</h4>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="container">
            <input type="hidden" name="gambarlama" value="default.jpg">
            <div class="form-control">
                <label for="username">username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-control">
                <label for="password">password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-control">
                <label for="confirm-password">confirm password</label>
                <input type="password" name="confirm-password" id="conform-password" class="form-control">
            </div>
            <div class="form-control">
                <label for="confirm-password">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control">
            </div>
            <div class="form-control">
                <label for="confirm-password">nomor telepon</label>
                <input type="text" name="nomortelepon" id="nomortelepon" class="form-control">
            </div>
            <div class="form-control">
                <label for="confirm-password">gambar default</label>
                <img src="gambar/default.jpg" class="img-responsive rounded-circle" width="100px">
                <input type="file" name="gambarproduk" id="gambarproduk" class="form-control">
            </div>
            <div class="form-control">
                <button type="submit" name="daftar" id="daftar" class="btn btn-danger btn-sm">Daftar</button>
            </div>
        </div>
    </form>



</body>

</html>