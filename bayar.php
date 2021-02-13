<?php
session_start();
require "proses.php";
$id = $_GET['id'];
$conn = koneksi();
$pecaharr = tampilproduk("SELECT * FROM pembelian JOIN pembelian_produk 
                ON pembelian.idpembelian = pembelian_produk.idpembelian
                WHERE pembelian.idpembelian = $id
                    ");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman pembayaran</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php require "menu.php"; ?>
    <div class="container">
        <h3 class="text-center mt-3 mb-4">pembayaran atas nama <?= $_SESSION['pelanggan']['nama_lengkap']; ?></h3>
        <div class="row">
            <div class="col-md-4 alert alert-info mr-4">
                pembelian atas nama <strong> <?= $_SESSION['pelanggan']['nama_lengkap']; ?></strong><br>
                dengan total harga <strong>Rp. <?= number_format($pecaharr[0]["total_pembelian"]); ?></strong>
            </div>

            <div class="col-md-8">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="namapenyetor">Nama Penyetor</label>
                        <input type="text" name="namapenyetor" id="namapenyetor" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="namabank">Nama Bank</label>
                        <input type="text" name="namabank" id="namabank" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Masukan Foto Produk Anda</label>
                        <input type="file" name="struk_bayar" class="form-control" id="struk_bayar">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" name="bayar">upload sekarang</button>
                        <a href="riwayat.php" class="btn btn-danger btn-sm">kembali ke riwayat</a>
                    </div>
                </form>
                <?php
                if (isset($_POST['bayar'])) {
                    $pembelian = $pecaharr[0]['idpembelian'];
                    $idplg = $pecaharr[0]['id_pelanggan'];
                    $namapenyetor = $_POST['namapenyetor'];
                    $namabank = $_POST['namabank'];
                    $total = $pecaharr[0]['total_pembelian'];
                    $tanggal = date("Y-m-d");
                    $nama = $_FILES['struk_bayar']['name'];
                    $struk = date("YmdHis") . $nama;
                    $tmp_name = $_FILES['struk_bayar']['tmp_name'];
                    move_uploaded_file($tmp_name, 'struk/' . $struk);
                    $conn = koneksi();
                    $conn->query("INSERT INTO pembayaran VALUES
                                    ('', '$pembelian','$idplg', '$namapenyetor', '$namabank', '$total', '$tanggal', '$struk')");
                    $conn->query("UPDATE pembelian SET status = 'sudah bayar' WHERE idpembelian = $id");

                    echo "<script>alert('pembayaran selesai,terimakasih sudah membayar')</script>";
                    echo "<script>location='riwayat.php?<?= $id; ?>'</script>";
                }


                ?>
            </div>
        </div>
    </div>
</body>

</html>