<?php
include 'koneksi.php';

$id_buku = $_POST['id_buku'];
$judul = $_POST['judul'];
$tahun_terbit = $_POST['tahun_terbit'];
$penerbit = $_POST['penerbit'];
$nama_peminjam = $_POST['nama_peminjam'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];

$query = mysqli_query($koneksi, "INSERT INTO pengembalian(id_buku,judul,tahun_terbit,penerbit,nama_peminjam,tanggal_pinjam,tanggal_kembali) VALUES ('$id_buku','$judul','$tahun_terbit','$penerbit','$nama_peminjam','$tanggal_pinjam','$tanggal_kembali')")
or die(mysqli_error($koneksi));

if($query){
    header("Location: pengembalian.php");
}else{
    echo "Gagal tambah data";
}
?>