<?php
session_start();
require '../proses.php';
$id = $_GET['id'];

$arr = tampilproduk("SELECT * FROM pembelian JOIN pembelian_produk
                ON pembelian.idpembelian = pembelian_produk.idpembelian
                WHERE pembelian.idpembelian = $id");
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
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>

    <?php require "menuadmin.php"; ?>

    <h4 align="center">detail pembelian</h4>

    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>tanggal pembelian</th>
                    <th>alamat</th>
                    <th>status</th>
                    <th>jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($arr as $a) : ?>
                    <?php $id_pelanggan = $a['id_pelanggan']; ?>
                    <?php $pecah = tampilproduk("SELECT * FROM akun_pelanggan WHERE id_pelanggan = $id_pelanggan")[0] ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pecah['nama_lengkap']; ?></td>
                        <td><?= $a['tanggal_pembelian']; ?></td>
                        <td><?= $a['alamat']; ?></td>
                        <td><?= $a['status']; ?></td>
                        <td><?= $a['jumlah']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
        <a href="pembelian.php" class="btn btn-danger btn-sm">Kembali</a>
    </div>

</body>

</html>