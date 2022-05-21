<?php
include 'koneksi.php';
$id_bukulama = $_GET['id_buku'];
$id_buku = $_POST['id_buku'];
$judul = $_POST['judul'];
$tahun_terbit = $_POST['tahun_terbit'];
$penerbit = $_POST['penerbit'];
$nama_peminjam = $_POST['nama_peminjam'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];

$query = mysqli_query($koneksi, "UPDATE peminjaman SET id_buku='$id_buku',judul='$judul',tahun_terbit='$tahun_terbit',penerbit='$penerbit',nama_peminjam='$nama_peminjam',tanggal_pinjam='$tanggal_pinjam',tanggal_kembali='$tanggal_kembali' WHERE id_buku='$id_bukulama'")
or die(mysqli_error($koneksi));

if($query){
    header("Location: peminjaman.php");
}else{
    echo "Gagal Update";
}

?>