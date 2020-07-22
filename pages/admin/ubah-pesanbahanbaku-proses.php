<?php
// koneksi database
include "../../koneksi.php";

// menangkap data yang di kirim dari form
$id_pesanbahanbaku = $_POST['id_pesanbahanbaku'];
$id_pengadaan = $_POST['id_pengadaan'];
$id_user = $_POST['id_user'];
$tanggal_pemesanan = date('Y-m-d', strtotime($_POST['tanggal_pemesanan']));

$data = mysqli_query($koneksi, "SELECT * from produk");
$n = mysqli_num_rows($data);

$id_pesanbahanbaku = $n + 1;
// update data ke database
mysqli_query($koneksi, "UPDATE pesanbahanbaku SET tanggal_pemesanan='$tanggal_pemesanan',id_pengadaan='$id_pengadaan',id_user='$id_user' where id_pesanbahanbaku='$id_pesanbahanbaku'");

// mengalihkan halaman kembali ke index.php
header("location:kelola-pesanbahanbaku.php");
