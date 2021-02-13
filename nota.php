<?php

session_start();
require "proses.php";
$id = $_GET['id'];
$arr = tampilproduk("SELECT * FROM pembelian WHERE idpembelian = $id ");


?>
<pre><?php print_r($arr); ?></pre>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman nota</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <?php require "menu.php"; ?>
    <h3 class="text-center">nota Pelanggan Atas Nama <?= $_SESSION['pelanggan']['nama_lengkap']; ?></h3>
    <div class="section">
        <div class="container">
            <h5 class="text-danger mb-3 mt-5">Status Transkasi = <?= $arr[0]['status']; ?></h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>nama barang</th>
                        <th>harga</th>
                        <th>jumlah</th>
                        <th>total belanja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $conn = koneksi(); ?>
                    <?php $lihat = tampilproduk("SELECT * FROM pembelian_produk
                                                    JOIN produk ON pembelian_produk.id_produk = produk.id_produk
                                                    WHERE pembelian_produk.idpembelian = $id") ?>
                    <?php $no = 1; ?>
                    <?php $totalbelanjaseluruh = 0; ?>
                    <?php foreach ($lihat as $lht) : ?>

                        <?php $totalbelanja = $lht['hargaproduk'] * $lht['jumlah']; ?>

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $lht['namaproduk']; ?></td>
                            <td>Rp. <?= number_format($lht['hargaproduk']); ?></td>
                            <td><?= $lht['jumlah']; ?></td>
                            <td>Rp. <?= number_format($totalbelanja); ?></td>
                            <?php $totalbelanjaseluruh += $totalbelanja; ?>

                        </tr>
                    <?php endforeach; ?>
                    <td colspan="6" ali>
                        <?php if ($arr[0]['status'] === "pending") : ?>
                            <a href="bayar.php?id=<?= $lht['idpembelian']; ?>" class="btn btn-primary btn-sm">upload pembayaran anda</a>
                        <?php endif; ?>
                        <a href="riwayat.php" class="btn btn-danger btn-sm">kembali ke riwayat</a>
                    </td>
                </tbody>
            </table>
        </div>

        <div class="info mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 alert alert-info ml-1">
                        Nama Lengkap : <?= $_SESSION['pelanggan']['nama_lengkap']; ?>
                    </div>
                    <div class="col-md-4 alert alert-primary ml-3">
                        Nomor Telpon : <?= $_SESSION['pelanggan']['nomortelepon']; ?>
                    </div>
                    <div class="col-md-3 alert alert-danger ml-4">
                        Total seluruh Belanja anda <br> Rp. : <?= number_format($totalbelanjaseluruh); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 alert alert-info">
                        silakan kirim ke rekening BANK BCA dengan rekening sebagai berikut <br>
                        1945625 dengan total Rp. <?= number_format($totalbelanjaseluruh); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>