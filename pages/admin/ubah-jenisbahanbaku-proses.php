<?php 
// koneksi database
include "../../koneksi.php";
 
// menangkap data yang di kirim dari form
$id_jenisbahanbaku = $_POST['id_jenisbahanbaku'];
$nama_jenisbahanbaku = $_POST['nama_jenisbahanbaku'];
// update data ke database
mysqli_query($koneksi,"UPDATE jenisbahanbaku SET nama_jenisbahanbaku='$nama_jenisbahanbaku' where id_jenisbahanbaku='$id_jenisbahanbaku'");
 
// mengalihkan halaman kembali ke index.php
header("location:kelola-jenis-bahanbaku.php");
 
?>