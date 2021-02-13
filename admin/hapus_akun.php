<?php
require "../proses.php";
$id = $_GET['id'];

$conn  = koneksi();
$query = "DELETE FROM akun_pelanggan WHERE id_pelanggan = $id";
$result = $conn->query($query);
if ($result === true) {
    echo "<script>alert('anda berhasil menghapus data')</script>";
    echo "<script>location='akun_yang_ada.php'</script>";
} else {
    echo "<script>alert('anda gagal menghapus data')</script>";
    echo "<script>location='akun_yang_ada.php'</script>";
}
