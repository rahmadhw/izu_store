<?php
require "../proses.php";
$id = $_GET['id'];

$pecah = tampilproduk("SELECT * FROM produk WHERE id_produk = $id")[0];
$id_produk = $pecah['id_produk'];
if (isset($_POST['ubah'])) {
    $conn = koneksi();
    $namaproduk = $_POST['namaproduk'];
    $gambarlama = $_POST['gambarlama'];
    if ($_FILES['gambarproduk']['error'] == 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }
    $harga = $_POST['hargaproduk'];
    $query = "UPDATE produk SET 
				namaproduk = '$namaproduk',
				gambarproduk = '$gambar',
				hargaproduk  = '$harga'
			WHERE id_produk = $id";
    $result = $conn->query($query);
    if ($result == true) {
        echo "<script>alert('anda berhasil mengubah data')</script>";
        echo "<script>location='home.php'</script>";
    } else {
        echo "<script>alert('anda gagal mengubahdata data')</script>";
        echo "<script>location='edit.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman edit data</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <?php require "menuadmin.php"; ?>
    <h4 align="center" class="mb-4 mt-4">silakan isi data kembali untuk merubah data tersebut</h4>
    <form method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <input type="hidden" name="gambarlama" value="<?= $pecah['gambarproduk']; ?>">
                    <div class="form-group">
                        <label>nama produk</label>
                        <input type="text" name="namaproduk" class="form-control" value="<?= $pecah['namaproduk']; ?>">
                    </div>

                    <div class="form-group">
                        <label>gambar produk</label>
                        <img src="../gambar/<?= $pecah['gambarproduk']; ?>">
                        <input type="file" name="gambarproduk" class="form-control" value="<?= $pecah['gambarproduk']; ?>">
                    </div>

                    <div class="form-group">
                        <label>harga produk</label>
                        <input type="text" name="hargaproduk" class="form-control" value="<?= $pecah['hargaproduk']; ?>">
                    </div>

                    <div class="form-group">
                        <button name="ubah" class="btn btn-primary">ubah data</button>
                    </div>
                </div>



            </div>
        </div>
    </form>

</body>

</html>