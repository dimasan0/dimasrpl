<?php
include 'koneksi.php';
$id_lama = $_GET['id'];
$id = $_POST['id'];
$npm = $_POST['npm'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$prodi = $_POST['prodi'];

$query = mysqli_query($koneksi, "UPDATE anggota SET id='$id',npm='$npm',username='$username', password='$password', nama='$nama',kelas='$kelas',prodi='$prodi' WHERE id='$id_lama'")
or die(mysqli_error($koneksi));

if($query){
    header("Location: listanggota.php");
}else{
    echo "Gagal Update";
}

?>