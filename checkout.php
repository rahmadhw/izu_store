<?php
session_start();
require "proses.php";

if (empty($_SESSION['keranjangbelanja']) or !isset($_SESSION['keranjangbelanja'])) {
    echo "<script>alert('belanja bosque')</script>";
    echo "<script>location='index.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman checkout</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php require "menu.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>harga produk</th>
                            <th>jumlah</th>
                            <th>total belanja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php $hargasatuan = 0; ?>
                        <?php foreach ($_SESSION['keranjangbelanja'] as $id => $values) : ?>
                            <?php $pecah = tampilproduk("SELECT * FROM produk WHERE id_produk = $id"); ?>
                            <?php $hasilsubharga = $pecah[0]['hargaproduk'] * $values; ?>
                            <?php $hargasatuan += $hasilsubharga; ?>

                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $pecah[0]['namaproduk']; ?></td>
                                <td>Rp. <?php echo number_format($pecah[0]['hargaproduk']); ?></td>
                                <td><?php echo $values; ?></td>
                                <td>Rp. <?php echo number_format($hasilsubharga); ?></td>

                            </tr>
                        <?php endforeach; ?>
                        <td colspan="5" align="right"> total bayar anda : Rp. <?php echo number_format($hargasatuan); ?></td>

                    </tbody>
                </table>


            </div>
        </div>
        <div class="row">
            <div class="col-md-7 alert alert-info">
                Nama Anda : <?= $_SESSION['pelanggan']['nama_lengkap']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 alert alert-info">
                Nama Anda : <?= $_SESSION['pelanggan']['nomortelepon']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 ">
                <form method="POST">
                    <div class="form-control">
                        <label for="alamat">alamat</label>
                        <textarea name="alamat" class="form-control"></textarea>
                    </div>

                    <div class="form-control">
                        <button name="checkout" class="btn btn-primary">lanjutkan</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['checkout'])) {
                    $idpelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                    $tanggal = date("Y-m-d");
                    $total = $hargasatuan;
                    $alamat = $_POST['alamat'];
                    $pending = "pending";
                    $conn = koneksi();
                    $conn->query("INSERT INTO pembelian VALUES
                                    ('', '$idpelanggan', '$tanggal', '$total', '$alamat', '$pending')
                                    ");
                    $idsekarang =  $conn->insert_id;
                    foreach ($_SESSION['keranjangbelanja'] as $id => $jumlah) {
                        $conn->query("INSERT INTO pembelian_produk VALUES 
                                        ('', '$idsekarang', '$id', '$jumlah')
                        ");
                        unset($_SESSION['keranjangbelanja']);
                    }
                    echo "<script>alert('proses penyimpan pesanan anda sukses,,silakan lanjutkan proses transkasi anda sampai selesai')</script>";
                    echo "<script>location='riwayat.php?id=$idsekarang'</script>";
                }

                ?>
            </div>
        </div>
    </div>


</body>

</html>