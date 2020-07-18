<?php
// koneksi database
include "../../koneksi.php";

// menangkap data yang di kirim dari form
$no_polisi = $_POST['no_polisi'];
$jenis = $_POST['jenis'];
$kapasitas = $_POST['kapasitas'];

// update data ke database
mysqli_query($koneksi, "UPDATE kendaraan SET jenis='$jenis',kapasitas='$kapasitas' where no_polisi='$no_polisi'");

// mengalihkan halaman kembali ke index.php
header("location:kelola-kendaraan.php");
