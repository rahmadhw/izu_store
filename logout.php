<?php
session_start();
if (empty($_SESSION['pelanggan']) or !isset($_SESSION['pelanggan'])) {
    header("Location: index.php");
}
session_destroy();
echo "<script>alert('anda berhasil logout')</script>";
echo "<script>location='login.php'</script>";
