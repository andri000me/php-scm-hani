<?php 
// koneksi database
include "../../koneksi.php";
 
// menangkap data yang di kirim dari form
$id = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$hak_akses = $_POST['hak_akses'];
$alamat = $_POST['alamat'];
$jabatan = $_POST['jabatan'];
 
// update data ke database
mysqli_query($koneksi,"UPDATE user SET nama='$nama',username='$username',password='$password',email='$email',hak_akses='$hak_akses',alamat='$alamat',jabatan='$jabatan' where id_user='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:kelola-pengguna.php");
 
?>