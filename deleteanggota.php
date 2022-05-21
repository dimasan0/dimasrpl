<?php
include 'koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM anggota WHERE id='$id'")
or die(mysqli_error($koneksi));

if($query){
    header("Location: listanggota.php");
}else{
    echo "Gagal Menghapus";
}

?>