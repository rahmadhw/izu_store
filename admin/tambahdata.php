<?php 

 ?>

 <html>
 <head>
 	<title>halaman tambah data</title>
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 </head>
 <body>
 	<h1 align = "center">silakan isi data</h1>
 	<form method = "POST" action = "proses_tambah.php" enctype="multipart/form-data">
 		<div class = "container">
 			<div class="row">

 				<div class="col-md-4">
 					<div class= "form-group">
 						<label>nama produk</label>
			 			<input type = "text" name = "namaproduk" class = "form-control">
			 		</div>

			 		<div class= "form-group">
 						<label>gambar produk</label>
			 			<input type = "file" name = "gambarproduk" class = "form-control">
			 		</div>

			 		<div class= "form-group">
 						<label>harga produk</label>
			 			<input type = "text" name = "hargaproduk" class = "form-control">
			 		</div>

			 		<div class= "form-group">
 						<button name = "simpan" class = "btn btn-primary">simpan data</button>
			 		</div>
 				</div>



 			</div>
 		</div>
 	</form>


 </body>
 </html>