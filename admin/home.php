<?php
session_start();
include "../proses.php";
$tmp_admin = tampilprodukadmin("SELECT * FROM produk");

if (empty($_SESSION['admin']) or !isset($_SESSION['admin'])) {
	echo "<script>alert('login bosque')</script>";
	echo "<script>location = 'loginadmin.php'</script>";
}

?>


<pre><?php print_r($_SESSION['admin']); ?></pre>
<html>

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<body>
	<?php require "menuadmin.php"; ?>
	<h1 align="center"> halaman data barang </h1>
	<div class="container">
		<div class="row">
			<div class="col">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>nama produk</th>
							<th>gambar</th>
							<th>harga produk</th>
							<th>aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php $no = 1; ?>
						<?php foreach ($tmp_admin as $admin) : ?>
							<tr>

								<td><?php echo $no++ ?></td>
								<td><?php echo $admin['namaproduk']; ?></td>
								<td><img src="../gambar/<?php echo $admin['gambarproduk']; ?>" class="img-responsive"></td>
								<td><?php echo $admin['hargaproduk']; ?></td>
								<td>
									<a href="edit.php?id=<?= $admin['id_produk']; ?>" class="btn btn-warning">edit</a>
									<a href="hapus.php?id=<?= $admin['id_produk']; ?>" class="btn btn-danger">hapus</a>
								</td>

							</tr>
						<?php endforeach; ?>
					</tbody>
					<a href="tambahdata.php" class="btn btn-primary mb-4">Tambah Produk</a>
				</table>
			</div>
		</div>
	</div>

</body>

</html>