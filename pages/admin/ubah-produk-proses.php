<?php
// koneksi database
include "../../koneksi.php";

// menangkap data yang di kirim dari form
$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$satuan_produk = $_POST['satuan_produk'];
$harga = $_POST['harga'];

// update data ke database
mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk',satuan_produk='$satuan_produk',harga='$harga' where id_produk='$id_produk'");

// mengalihkan halaman kembali ke index.php
header("location:kelola-produk.php");
