<?php

session_start();

$id = $_GET['id'];
unset($_SESSION['keranjangbelanja'][$id]);

echo "<script>alert('anda berhasil menghapus keranjang')</script>";
echo "<script>location='tampilbelanja.php'</script>";
