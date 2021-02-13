<?php

session_start();
if (!empty($_SESSION['pelanggan'])) {
	header("Location: index.php");
}

?>
<html>

<head>
	<title>halaman login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
	<?php require "menu.php" ?>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<form method="POST" action="proses_login.php">
					<div class="form-group">
						<label>username</label>
						<input type="text" name="username" class="form-control">
					</div>

					<div class="form-group">
						<label>password</label>
						<input type="password" name="password" class="form-control">
					</div>

					<div class="form-group">
						<button type="submit" name="login" class="btn btn-primary btn-sm">login</button>
						<a href="daftar.php" class="btn btn-danger btn-sm">daftar</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>

</html>