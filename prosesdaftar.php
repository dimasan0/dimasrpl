<?php
include "koneksi.php";

$npm = $_POST['npm'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$prodi = $_POST['prodi'];

$query = mysqli_query($koneksi, "INSERT INTO anggota(id,npm,username,password,nama,kelas,prodi) VALUES ('','$npm','$username','$password','$nama','$kelas','$prodi')");

echo "Data anda telah berhasil diinput, Masukkan Username dan password anda di <span><a href='login.php'><b> Disini </b></a></span>";
echo "<h3><a href='login.php'>Klik Disini</a>  untuk Login </h3>";
