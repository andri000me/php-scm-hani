<?php

include "../../koneksi.php";


$id_pengadaan = $_POST['id_pengadaan'];
$id_user = $_POST['id_user'];
$tanggal_pemesanan = date('Y-m-d', strtotime($_POST['tanggal_pemesanan']));

$data = mysqli_query($koneksi, "SELECT * from produk");
$n = mysqli_num_rows($data);

$id_pesanbahanbaku = (int) $n + 1;

mysqli_query($koneksi, "INSERT INTO pesanbahanbaku VALUES('$id_pesanbahanbaku','$tanggal_pemesanan','$id_pengadaan','$id_user')");

header("location:kelola-pesanbahanbaku.php");
