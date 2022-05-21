<?php
include 'koneksi.php';
$id_buku = $_GET['id_buku'];

$query = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id_buku='$id_buku'")
or die(mysqli_error($koneksi));

if($query){
    header("Location: peminjaman.php");
}else{
    echo "Gagal Menghapus";
}

?>