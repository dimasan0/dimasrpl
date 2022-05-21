<?php
include 'koneksi.php';
$id_bukulama = $_GET['id_buku'];
$id_buku = $_POST['id_buku'];
$judul = $_POST['judul'];
$tahun_terbit = $_POST['tahun_terbit'];
$penerbit = $_POST['penerbit'];
$tanggal_input = $_POST['tanggal_input'];

$query = mysqli_query($koneksi, "UPDATE buku SET id_buku='$id_buku',judul='$judul',tahun_terbit='$tahun_terbit',penerbit='$penerbit',tanggal_input='$tanggal_input' WHERE id_buku='$id_bukulama'")
or die(mysqli_error($koneksi));

if($query){
    header("Location: buku.php");
}else{
    echo "Gagal Update";
}

?>