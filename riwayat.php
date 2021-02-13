<?php
session_start();
require "proses.php";
$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
if (empty($_SESSION['pelanggan']) or !isset($_SESSION['pelanggan'])) {
    echo "<script>alert('login bos que')</script>";
    echo "<script>location='login.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman riwayat</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php require "menu.php"; ?>
    <h3 class="text-center"> riwayat belanja atas nama <?= $_SESSION['pelanggan']['nama_lengkap']; ?> </h3>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>tanggal pembelian</th>
                    <th>status</th>
                    <th>total pembelian</th>
                    <th>action</th>
                </tr>
            </thead>

            <tbody>
                <?php $pecaharray = tampilproduk("SELECT * FROM pembelian JOIN akun_pelanggan
                                ON pembelian.id_pelanggan = akun_pelanggan.id_pelanggan WHERE pembelian.id_pelanggan = $id_pelanggan "); ?>


                <?php $no = 1; ?>
                <?php foreach ($pecaharray as $pcharray) :  ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $pcharray['tanggal_pembelian']; ?></td>
                        <td><?= $pcharray['status']; ?></td>
                        <td>Rp. <?= number_format($pcharray['total_pembelian']); ?></td>
                        <td>
                            <a href="nota.php?id=<?= $pcharray['idpembelian']; ?>" class="btn btn-primary btn-sm">lihat nota</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-danger btn-sm">kembali ke home</a>
    </div>

</body>

</html>