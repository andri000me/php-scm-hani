<?php
// koneksi database
include "../../koneksi.php";

// menangkap data yang di kirim dari form
$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$satuan_produk = $_POST['satuan_produk'];
$harga = $_POST['harga'];
$id_bahanbaku = $_POST['id_bahanbaku'];

// update data ke database
$sql = mysqli_query($koneksi, "SELECT id_detail_produk FROM detail_produk WHERE id_produk='$id'");
while ($row = mysqli_fetch_array($sql)) {
    $result = $row[0];
}

$id_detail_produk = $result;

mysqli_query($koneksi, "UPDATE detail_produk SET id_bahanbaku='$id_bahanbaku' WHERE id_produk='$id_produk' AND id_detail_produk = '$id_detail_produk'");

mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk',satuan_produk='$satuan_produk',harga='$harga' WHERE id_produk='$id_produk'");


// mengalihkan halaman kembali ke index.php
header("location:kelola-produk.php");
