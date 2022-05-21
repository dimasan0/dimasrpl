<?php
include 'koneksi.php';

$id_buku = $_POST['id_buku'];
$judul = $_POST['judul'];
$tahun_terbit = $_POST['tahun_terbit'];
$penerbit = $_POST['penerbit'];
$tanggal_input = $_POST['tanggal_input'];

$query = mysqli_query($koneksi, "INSERT INTO buku(id_buku,judul,tahun_terbit,penerbit,tanggal_input) VALUES ('$id_buku','$judul','$tahun_terbit','$penerbit','$tanggal_input')")
or die(mysqli_error($koneksi));

if($query){
    header("Location: buku.php");
}else{
    echo "Gagal tambah data";
}
?>