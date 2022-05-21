<?php
include 'koneksi.php';

$id = $_POST['id'];
$npm = $_POST['npm'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$prodi = $_POST['prodi'];

$query = mysqli_query($koneksi, "INSERT INTO anggota(id,npm,username,password,nama,kelas,prodi) VALUES ('$id','$npm','$username','$password','$nama','$kelas','$prodi')")
or die(mysqli_error($koneksi));

if($query){
    header("Location: listanggota.php");
}else{
    echo "Gagal tambah data";
}
?>