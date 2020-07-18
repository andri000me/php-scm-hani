<?php

include "../../koneksi.php";

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$hak_akses = $_POST['hak_akses'];
$alamat = $_POST['alamat'];
$jabatan = $_POST['jabatan'];

mysqli_query($koneksi, "INSERT INTO user VALUES('','$nama','$username','$password','$email','$hak_akses','$alamat','$jabatan')");

header("location:kelola-pengguna.php");
