<?php

include "../../koneksi.php";

// generate id_distribusi
$data = mysqli_query($koneksi, "SELECT * from distribusi");
$n = mysqli_num_rows($data);

$id_distribusi = $n + 1;

$tanggal_pengiriman = date('Y-m-d', strtotime($_POST['tanggal_pengiriman']));
$id_pesanproduk = $_POST['id_pesanproduk'];
$no_polisi = $_POST['no_polisi'];
$kota_wilayah = $_POST['kota_wilayah'];
$id_user = $_POST['id_user'];

//hitung estimasi tanggal sampai
$tanggal_sampai = date('Y-m-d', strtotime('+3 days', strtotime($_POST['tanggal_pengiriman'])));

//simpan distribusi
mysqli_query($koneksi, "INSERT INTO distribusi VALUES('$id_distribusi','$kota_wilayah','$no_polisi','$id_user')");

//simpan detail_distribusi
mysqli_query($koneksi, "INSERT INTO detail_distribusi VALUES(null,'$tanggal_pengiriman','$tanggal_sampai','$id_distribusi','$id_pesanproduk')");

header("location:kelola-distribusi.php");
