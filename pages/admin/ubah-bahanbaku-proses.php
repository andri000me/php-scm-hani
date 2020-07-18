<?php
// koneksi database
include "../../koneksi.php";

// menangkap data yang di kirim dari form
$id_bahanbaku = $_POST['id_bahanbaku'];
$nama_bahanbaku = $_POST['nama_bahanbaku'];
$satuan_bahanbaku = $_POST['satuan_bahanbaku'];
$harga = $_POST['harga'];
$id_supplier = $_POST['id_supplier'];

// update data ke database
mysqli_query($koneksi, "UPDATE bahanbaku SET nama_bahanbaku='$nama_bahanbaku',satuan_bahanbaku='$satuan_bahanbaku',harga='$harga',id_supplier='$id_supplier' where id_bahanbaku='$id_bahanbaku'");

// mengalihkan halaman kembali ke index.php
header("location:kelola-bahanbaku.php");
