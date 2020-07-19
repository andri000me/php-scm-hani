<?php
// koneksi database
include "../../koneksi.php";

// menangkap data yang di kirim dari form
$id_peramalan = $_POST['id_peramalan'];
$bulan = $_POST['bulan'];
$id_user = $_POST['id_user'];
$id_bahanbaku = $_POST['id_bahanbaku'];

// update data ke database
mysqli_query($koneksi, "UPDATE peramalan SET bulan='$bulan',id_user='$id_user',id_bahanbaku='$id_bahanbaku' where id_peramalan='$id_peramalan'");

// mengalihkan halaman kembali ke index.php
header("location:kelola-peramalan.php");
