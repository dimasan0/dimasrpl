<?php
include("koneksi.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

if ($level == 'admin') {

	$username = mysqli_real_escape_string($koneksi, $username);
	$password = mysqli_real_escape_string($koneksi, $password);

	if (empty($username) && empty($password)) {
		header('location:login.php?error=1');
	} else if (empty($username)) {
		header('location:login.php?error=2');
	} else if (empty($password)) {
		header('location:login.php?error=3');
	} else {
		header('location:index.php');

		$query = mysqli_query($koneksi, "SELECT * from admin where username='$username' and password='$password'");
		$row = mysqli_fetch_array($query);

		if (mysqli_num_rows($query) == 1) {
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $username;
			$_SESSION['nama'] = $row['nama'];

			header('location:index.php');
		} else {
			header('location:login.php?error=4');
		}
	}
} else {
	$username = mysqli_real_escape_string($koneksi, $username);
	$password = mysqli_real_escape_string($koneksi, $password);

	if (empty($username) && empty($password)) {
		header('location:login.php?error=1');
	} else if (empty($username)) {
		header('location:login.php?error=2');
	} else if (empty($password)) {
		header('location:login.php?error=3');
	} else {
		header('location:anggota/index.php');

		$query = mysqli_query($koneksi, "select * from anggota where username='$username' and password='$password'");
		$row = mysqli_fetch_array($query);

		if (mysqli_num_rows($query) == 1) {
			$_SESSION['id'] = $row['id'];
			$_SESSION['npm'] = $row['npm'];
			$_SESSION['nama'] = $row['nama'];
			$_SESSION['username'] = $username;
			$_SESSION['kelas'] = $row['kelas'];
			$_SESSION['prodi'] = $row['prodi'];

			header('location:anggota/index.php');
		} else {
			header('location:login.php?error=4');
		}
	}
}
?>