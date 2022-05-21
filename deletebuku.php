<?php
include 'koneksi.php';
$id_buku = $_GET['id_buku'];

$query = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku='$id_buku'")
or die(mysqli_error($koneksi));

if($query){
    header("Location: buku.php");
}else{
    echo "Gagal Menghapus";
}

?>