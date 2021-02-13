<?php
session_start();
require "../proses.php";

$pecah = tampilproduk("SELECT * FROM pembelian ");

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
    <title>Halaman Pembelian</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <?php require "menuadmin.php"; ?>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>id pelanggan</th>
                    <th>id pembelian</th>
                    <th>tanggal pembelian</th>
                    <th>total pembelian</th>
                    <th>alamat</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($pecah as $pch) :  ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pch['id_pelanggan']; ?></td>
                        <td><?= $pch['idpembelian']; ?></td>
                        <td><?= $pch['tanggal_pembelian']; ?></td>
                        <td>Rp. <?= number_format($pch['total_pembelian']); ?></td>
                        <td><?= $pch['alamat']; ?></td>
                        <td><?= $pch['status']; ?></td>
                        <td>

                            <?php if ($pch['status'] == 'sudah bayar') : ?>
                                <p class="text-danger">LUNAS</p>
                            <?php else : ?>
                                <a href="detail.php?id=<?= $pch['idpembelian']; ?>" class="btn btn-danger btn-sm">lihat detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>