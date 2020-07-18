<?php 
// koneksi database
include "../../koneksi.php";
 
// menangkap data yang di kirim dari form
$id_supplier = $_POST['id_supplier'];
$nama_supplier = $_POST['nama_supplier'];
$alamat_supplier = $_POST['alamat_supplier'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];
 
// update data ke database
mysqli_query($koneksi,"UPDATE supplier SET nama_supplier='$nama_supplier',alamat_supplier='$alamat_supplier',no_telp='$no_telp',email='$email' where id_supplier='$id_supplier'");
 
// mengalihkan halaman kembali ke index.php
header("location:kelola-supplier.php");
 
?>