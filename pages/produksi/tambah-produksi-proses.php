<?php

include "../../koneksi.php";

$id_pesanproduk = $_POST['id_pesanproduk'];
$tanggal_mulai  = date('Y-m-d', strtotime($_POST['tanggal_mulai']));
$tanggal_selesai  = date('Y-m-d', strtotime('+3 days', strtotime($tanggal_mulai)));

$sql1 = mysqli_query($koneksi, "SELECT qty FROM pesanproduk pp JOIN detail_pesanproduk dp WHERE pp.id_pesanproduk = $id_pesanproduk AND pp.id_pesanproduk = dp.id_pesanproduk");
while ($row = mysqli_fetch_array($sql1)) {
    $result = $row[0];
}
$jumlah = $result;

$sql2 = mysqli_query($koneksi, "SELECT dp.id_produk FROM pesanproduk pp JOIN produk p JOIN detail_pesanproduk dp WHERE pp.id_pesanproduk = $id_pesanproduk AND p.id_produk = dp.id_produk AND pp.id_pesanproduk = dp.id_pesanproduk");
while ($row = mysqli_fetch_array($sql2)) {
    $result = $row[0];
}
$id_produk = $result;

$sql3 = mysqli_query($koneksi, "SELECT bb.id_bahanbaku FROM detail_produk dp JOIN bahanbaku bb WHERE dp.id_bahanbaku = bb.id_bahanbaku AND dp.id_produk = $id_produk");
while ($row = mysqli_fetch_array($sql3)) {
    $result3 = $row[0];
}
$id_bahanbaku = $result;

mysqli_query($koneksi, "INSERT INTO detail_produksi (id_detail_produksi,id_pesanproduk,jumlah,tanggal_mulai,tanggal_selesai,id_produk) VALUES(null,'$id_pesanproduk','$jumlah','$tanggal_mulai','$tanggal_selesai','$id_produk')");


header("location:kelola-produksi.php");
