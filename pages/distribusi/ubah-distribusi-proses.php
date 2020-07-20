<?php
// koneksi database
include "../../koneksi.php";

// menangkap data yang di kirim dari form
$id_distribusi = $_POST['id_distribusi'];
$no_polisi = $_POST['no_polisi'];
$kota_wilayah = $_POST['kota_wilayah'];
$id_user = $_POST['id_user'];

$tanggal_pengiriman = date('Y-m-d', strtotime($_POST['tanggal_pengiriman']));
$tanggal_sampai = date('Y-m-d', strtotime('+3 days', strtotime($_POST['tanggal_pengiriman'])));
$id_pesanproduk = $_POST['id_pesanproduk'];

// update data ke database
mysqli_query($koneksi, "UPDATE distribusi SET kota_wilayah='$kota_wilayah',id_user='$id_user',no_polisi='$no_polisi' where id_distribusi='$id_distribusi'");

$sql = mysqli_query($koneksi, "SELECT id_detail_distribusi FROM detail_distribusi dd JOIN distribusi d WHERE d.id_distribusi = '$id_distribusi' AND dd.id_distribusi='$id_distribusi'");
while ($row = mysqli_fetch_array($sql)) {
    $id_detail_distribusi = $row[0];
}

mysqli_query($koneksi, "UPDATE detail_distribusi SET tanggal_pengiriman='$tanggal_pengiriman',id_pesanproduk='$id_pesanproduk' ,tanggal_sampai='$tanggal_sampai',id_distribusi='$id_distribusi' where id_detail_distribusi=$id_detail_pesanproduk");

// mengalihkan halaman kembali ke index.php
header("location:kelola-distribusi.php");
