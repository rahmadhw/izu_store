<?php


function koneksi()
{
	return mysqli_connect("localhost", "root", "", "dayat_toko");
}

function tampilproduk($query)
{
	$conn = koneksi();
	$result = $conn->query($query);
	$data = [];
	while ($row = $result->fetch_assoc()) {
		$data[] = $row;
	}
	return $data;
}

function tampilprodukadmin($query)
{
	$conn = koneksi();
	$result = $conn->query($query);
	$data = [];
	while ($row = $result->fetch_assoc()) {
		$data[] = $row;
	}
	return $data;
}

function tambahdata()
{
	$namaproduk = $_POST['namaproduk'];
	$gambarproduk = upload();
	$hargaproduk = $_POST['hargaproduk'];
	$query = "INSERT INTO produk VALUES
				('', '$namaproduk', '$gambarproduk', '$hargaproduk')
	";

	$conn = koneksi();
	$cek = $conn->query($query);
	if ($cek === true) {
		echo "<script>alert('anda berhasil menambah data')</script>";
		echo "<script>location='home.php'</script>";
	} else {
		echo "<script>alert('anda gagal menambah data')</script>";
		echo "<script>location='tambahdata.php'</script>";
	}
}

function upload()
{
	$extensidiperbolehkan = ['png', 'jpg'];
	$namagambar = $_FILES['gambarproduk']['name'];
	$pisah = explode('.', $namagambar);
	$extensi = strtolower(end($pisah));
	$tmp_name = $_FILES['gambarproduk']['tmp_name'];
	move_uploaded_file($tmp_name, '../gambar/' . $namagambar);
	return $namagambar;
}

function loginuser()
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM akun_pelanggan WHERE username = '$username'";
	$conn = koneksi();
	$result = $conn->query($query);
	$cek = $result->num_rows;
	if ($cek === 1) {
		$ambil = $result->fetch_assoc();
		if (password_verify($password, $ambil['password'])) {
			$_SESSION['pelanggan'] = $ambil;
			echo "<script>alert('anda berhasil login')</script>";
			echo "<script>location='index.php'</script>";
		} else {
			echo "<script>alert('anda gagal login periksa akun anda kemabali')</script>";
			echo "<script>location='login.php'</script>";
		}
	} else {
		echo "<script>alert('anda gagal login')</script>";
		echo "<script>location='login.php'</script>";
	}
}

function prosesnota($id)
{
	$conn = koneksi();
	$query = "SELECT *  FROM pembelian_produk JOIN pembelian ON pembelian_produk.idpembelian = pembelian.idpembelian WHERE pembelian_produk.idpembelian = $id";
	$result = $conn->query($query);
	$data = [];
	while ($row = $result->fetch_assoc()) {
		$data[] = $row;
	}
	return $data;
}

function hapusdata($id)
{
	$conn = koneksi();
	$query = "DELETE FROM produk WHERE id_produk = $id";
	$result = $conn->query($query);
	if ($result == true) {
		echo "<script>alert('anda berhasil menghapus data')</script>";
		echo "<script>location='home.php'</script>";
	} else {
		echo "<script>alert('anda gagal menghapus data')</script>";
		echo "<script>location='home.php'</script>";
	}
}

function daftaruser()
{
	$conn = koneksi();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm-password'];
	$namalengkap = $_POST['nama_lengkap'];
	$nomortelepon = $_POST['nomortelepon'];
	$gambarlama = $_POST['gambarlama'];
	if ($_FILES['gambarproduk']['error'] == 4) {
		$gambar = $gambarlama;
	} else {
		$gambar = uploadgambarakun();
	}
	$cek = "SELECT * FROM akun_pelanggan WHERE username = '$username'";
	$ambil = $conn->query($cek);
	$arr = $ambil->num_rows;
	if ($arr === 1) {
		echo "<script>alert('mohon maaf username anda sudah di pake sebelum nya')</script>";
		return false;
	} else {
		if ($password !== $confirm_password) {
			echo "<script>alert('password harus sama')</script>";
			return false;
		} else {

			$password = password_hash($password, PASSWORD_DEFAULT);
			$query = "INSERT INTO akun_pelanggan VALUES
						('', '$username' , '$password', '$namalengkap', '$nomortelepon', '$gambar')
				";
			$result = $conn->query($query);
			if ($result == true) {
				echo "<script>alert('berhasil membuat akun')</script>";
				echo "<script>location='login.php'</script>";
			} else {
				echo "<script>alert('gagal membuat akun')</script>";
				echo "<script>location='daftar.php'</script>";
			}
		}
	}
}

function uploadgambarakun()
{
	$namagambar = $_FILES['gambarproduk']['name'];
	$pisah = explode('.', $namagambar);
	$extensi = strtolower(end($pisah));
	$tmp_name = $_FILES['gambarproduk']['tmp_name'];
	$acak = date("YmdHis") . $namagambar;
	move_uploaded_file($tmp_name, 'gambar/' . $acak);
	return $acak;
}

function loginadmin()
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM akun_admin WHERE username = '$username' AND password = '$password'";
	$conn = koneksi();
	$result = $conn->query($query);
	$ambil = $result->num_rows;
	if ($ambil === 1) {
		$jadikanaaray = $result->fetch_assoc();
		$_SESSION['admin'] = $jadikanaaray;
		echo "<script>alert('anda berhasil login')</script>";
		echo "<script>location='home.php'</script>";
	} else {
		echo "<script>alert('anda gagal login')</script>";
		echo "<script>location='loginadmin.php'</script>";
	}
}
