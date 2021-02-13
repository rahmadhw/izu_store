<?php 
session_start();
$id = $_GET['id'];

if (isset($_SESSION['keranjangbelanja'][$id]) ) {
	$_SESSION['keranjangbelanja'][$id] += 1;
}else {
	$_SESSION['keranjangbelanja'][$id] = 1;
}

echo "<script>alert('barang yang anda pilih sudah masuk ke dalam  keranjang ')</script>";
echo "<script>location='tampilbelanja.php'</script>";


 ?>