<?php
session_start();


require "proses.php";


if (isset($_POST['ubahpass'])) {
    $id  = $_GET['id'];
    $conn = koneksi();
    $paslama = $_POST['password_lama'];
    $pasbaru = $_POST['password_baru'];

    $query = "SELECT * FROM akun_pelanggan WHERE id_pelanggan = $id ";
    $result = $conn->query($query);
    $ambil = $result->fetch_assoc();
    $cekhash = $ambil['password'];
    $dapatkanidkirim = $ambil['id_pelanggan'];
    if (password_verify($paslama, $cekhash)) {
        $acak = password_hash($pasbaru, PASSWORD_DEFAULT);
        $query = "UPDATE akun_pelanggan SET password = '$acak' WHERE id_pelanggan = $id";
        $cek = $conn->query($query);
        if ($cek === true) {
            echo "<script>alert('anda berhasil mengubah password')</script>";
            echo "<script>location='index.php'</script>";
        }
    } else {
        echo "<script>alert('cek kembali password lama anda')</script>";
        echo "<script>ubahpassword.php?id=<?= $dapatkanidkirim; ?></script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman ubah password</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php require "menu.php"; ?>
    <form action="" method="POST">
        <div class="container">
            <h4 class="text-center mt-3 mb-3">ubah password kamu</h4>
            <div class="alert alert-info">
                nama : <?= $_SESSION['pelanggan']['nama_lengkap']; ?>
            </div>
            <div class="form-group">
                <label for="">password lama </label>
                <input type="password" name="password_lama" class="form-control" placeholder="masukan password lama">
            </div>


            <div class="form-group">
                <label for="">password baru</label>
                <input type="password" class="form-control" name="password_baru" placeholder="masukan password baru">
            </div>


            <div class="form-group">
                <button class="form-control btn btn-danger btn-sm" name="ubahpass">simpan</button>
            </div>
        </div>
    </form>

</body>

</html>