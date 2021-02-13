<?php
session_start();
require "../proses.php";

$akun = tampilproduk("SELECT * FROM akun_pelanggan");
if (empty($_SESSION['admin']) or !isset($_SESSION['admin'])) {
    echo "<script>alert('anda tidak boleh masuk, di karnakan anda belum login')</script>";
    echo "<script>location='loginadmin.php'</script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Akun pelanggan</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <?php require "menuadmin.php"; ?>
    <div class="container">
        <h3 class="text-center">lihat aku yang ada</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>nama</th>
                    <th>nomor telepon</th>
                    <th>username</th>
                    <th>password</th>
                    <th>foto profil</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <thead>
                    <?php $no = 1; ?>
                    <?php foreach ($akun as $akn) :  ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $akn['nama_lengkap']; ?></td>
                            <td><?= $akn['nomortelepon']; ?></td>
                            <td><?= $akn['username']; ?></td>
                            <td><?= $akn['password']; ?></td>
                            <td>
                                <img src="../gambar/<?= $akn['gambarproduk']; ?>" alt="" class="img-responsive" width="100px" </td>
                            <td>
                                <a href="hapus_akun.php?id=<?= $akn['id_pelanggan']; ?>" class="btn btn-danger btn-sm">hapus akun</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </thead>
            </tbody>
        </table>
    </div>

</body>

</html>