<?php
session_start();
require "proses.php";
$tmp = tampilproduk("SELECT * FROM produk");


?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Dashboard</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css_sb_admin/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">izu store</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="index.php">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Interface
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#">
					<i class="fas fa-fw fa-cog"></i>
					<span>home</span>
				</a>

			</li>

			<!-- Nav Item - Utilities Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="tampilbelanja.php">
					<i class="fas fa-fw fa-wrench"></i>
					<span>keranjang sayaa</span>
				</a>
				<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Custom Utilities:</h6>
						<a class="collapse-item" href="utilities-color.html">Colors</a>
						<a class="collapse-item" href="utilities-border.html">Borders</a>
						<a class="collapse-item" href="utilities-animation.html">Animations</a>
						<a class="collapse-item" href="utilities-other.html">Other</a>
					</div>
				</div>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="login.php">
					<i class="fas fa-fw fa-folder"></i>
					<span>login</span>
				</a>

			</li>

			<!-- Nav Item - Charts -->

			<!-- Nav Item - Tables -->
			<li class="nav-item">
				<a class="nav-link" href="riwayat.php">
					<i class="fas fa-fw fa-table"></i>
					<span>riwayat belanja</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<!-- <div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div> -->

			<!-- Sidebar Message -->

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Search -->
					<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="POST">
						<div class="input-group">
							<input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-primary" type="submit" name="cari_produk">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>
					<?php
					if (isset($_POST['cari_produk'])) {
						$input = $_POST['keyword'];
						$conn = koneksi();
						$tmp = tampilproduk("SELECT * FROM produk WHERE
										namaproduk LIKE '%$input%' OR
										hargaproduk LIKE '%$input%'
										");
					}

					?>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>

						<!-- Nav Item - Alerts -->
						<li class="nav-item dropdown no-arrow mx-1">

							<!-- Dropdown - Alerts -->

						</li>

						<!-- Nav Item - Messages -->


						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php if (empty($_SESSION['pelanggan'])) :  ?>
									<span class="mr-2 d-none d-lg-inline text-gray-600 small">users</span>
								<?php else : ?>
									<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['pelanggan']['username']; ?></span>
								<?php endif ?>
								<img class="img-profile rounded-circle" src="gambar/<?= $_SESSION['pelanggan']['gambarproduk']; ?>">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<?php if (!empty($_SESSION['pelanggan']) or isset($_SESSION['pelanggan'])) : ?>
									<a class="dropdown-item" href="profil.php?id=<?= $_SESSION['pelanggan']['id_pelanggan']; ?>">
										<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
										Profile
									</a>
								<?php endif; ?>
								<?php if (empty($_SESSION['pelanggan']) or !isset($_SESSION['pelanggan'])) : ?>
									<a class="dropdown-item" href="login.php">
										<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
										login
									</a>
								<?php endif; ?>
								<?php if (!empty($_SESSION['pelanggan'])) : ?>
									<a class="dropdown-item" href="ubahpassword.php?id=<?= $_SESSION['pelanggan']['id_pelanggan']; ?>">
										<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
										ubah password
									</a>
								<?php endif; ?>

								<?php if (!empty($_SESSION['pelanggan']) or isset($_SESSION['pelanggan'])) : ?>
									<a class="dropdown-item" href="logout.php">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Logout
									</a>
								<?php endif; ?>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Produk</h1>
					</div>

					<!-- Content Row -->
					<div class="row">
						<?php foreach ($tmp as $tm) : ?>
							<div class="col-md-4">
								<div class="card" style="width: 18rem;">
									<img class="card-img-top" src="gambar/<?= $tm['gambarproduk']; ?>" alt="Card image cap" class="img-responsive">
									<div class="card-body">
										<h5 class="card-title"><?php echo $tm['namaproduk']; ?></h5>
										<p class="card-text">Rp .<?php echo number_format($tm['hargaproduk']); ?>.</p>
										<input type="hidden" name="hidden_namaproduk" value="<?php echo $tm['namaproduk']; ?>">
										<input type="hidden" name="hidden_hargaproduk" value="<?php echo $tm['hargaproduk']; ?>">
										<a href="chart.php?id=<?php echo $tm['id_produk']; ?>" class="btn btn-primary">pesan</a>
									</div>
								</div>
								</form>
							</div>
						<?php endforeach; ?>
					</div>
					<!-- /.container-fluid -->

				</div>
				<!-- End of Main Content -->

				<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; Your Website 2020</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->

			</div>
			<!-- End of Content Wrapper -->

		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="login.html">Logout</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="js/sb-admin-2.min.js"></script>

		<!-- Page level plugins -->
		<script src="vendor/chart.js/Chart.min.js"></script>

		<!-- Page level custom scripts -->
		<script src="js/demo/chart-area-demo.js"></script>
		<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>