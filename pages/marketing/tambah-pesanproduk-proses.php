<?php

include "../../koneksi.php";

$id_user = $_POST['id_user'];
$tanggal_pemesanan  = date('Y-m-d', strtotime($_POST['tanggal_pemesanan']));
$nama_customer = $_POST['nama_customer'];
$id_produk = $_POST['id_produk'];
$qty = $_POST['qty'];
$ukuran = $_POST['ukuran'];
$keterangan = $_POST['keterangan'];

$data = mysqli_query($koneksi, "SELECT * from pesanproduk");
$n = mysqli_num_rows($data);

$id_pesanproduk = $n + 1;

mysqli_query($koneksi, "INSERT INTO pesanproduk VALUES('$id_pesanproduk','$tanggal_pemesanan','$nama_customer','$id_user')");
mysqli_query($koneksi, "INSERT INTO detail_pesanproduk VALUES(null,'$qty','$ukuran','$keterangan','$id_pesanproduk','$id_produk')");

header("location:kelola-pesanproduk.php");
