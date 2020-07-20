<?php
// koneksi database
include "../../koneksi.php";

// menangkap data yang di kirim dari form
$id_pesanproduk = $_POST['id_pesanproduk'];
$qty = $_POST['qty'];
$nama_customer = $_POST['nama_customer'];
$id_user = $_POST['id_user'];

$tanggal_pemesanan = date('Y-m-d', strtotime($_POST['tanggal_pemesanan']));
$ukuran = $_POST['ukuran'];
$keterangan = $_POST['keterangan'];

// update data ke database
mysqli_query($koneksi, "UPDATE pesanproduk SET nama_customer='$nama_customer',tanggal_pemesanan='$tanggal_pemesanan',id_user='$id_user' where id_pesanproduk='$id_pesanproduk'");

$sql = mysqli_query($koneksi, "SELECT id_detail_pesanproduk FROM detail_pesanproduk dd JOIN pesanproduk d WHERE d.id_pesanproduk = '$id_pesanproduk' AND dd.id_pesanproduk='$id_pesanproduk'");
while ($row = mysqli_fetch_array($sql)) {
    $id_detail_pesanproduk = $row[0];
}

mysqli_query($koneksi, "UPDATE detail_distribusi SET qty='$qty',id_pesanproduk='$id_pesanproduk' ,ukuran='$ukuran',keterangan='$keterangan' where id_detail_pesanproduk=$id_detail_pesanproduk");

// mengalihkan halaman kembali ke index.php
header("location:kelola-distribusi.php");
