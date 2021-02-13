<?php
session_start();
include "proses.php";
$conn = koneksi();

if (empty($_SESSION['pelanggan'])) {
	echo "<script>alert('login dulu bosque')</script>";
	echo "<script>location='login.php'</script>";
}

if (empty($_SESSION['keranjangbelanja']) or !isset($_SESSION['keranjangbelanja'])) {
	echo "<script>alert('belanja dulu bosque')</script>";
	echo "<script>location='index.php'</script>";
}

?>


<html>

<head>
	<title>halaman tampil keranjang</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>

	<?php require "menu.php" ?>

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
							<th>action</th>
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
								<td>
									<a href="hapuskeranjang.php?id=<?= $id; ?>" class="btn btn-danger btn-xs">hapus</a>
								</td>
							</tr>
						<?php endforeach; ?>
						<td colspan="5" align="right"> total bayar anda : Rp. <?php echo number_format($hargasatuan); ?></td>

					</tbody>
				</table>
				<td colspan="3"><a href="checkout.php" class="btn btn-primary">checkout</a></td>
			</div>
		</div>
	</div>


</body>

</html>