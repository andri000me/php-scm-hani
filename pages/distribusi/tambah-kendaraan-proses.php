<?php

include "../../koneksi.php";


$no_polisi = $_POST['no_polisi'];
$jenis = $_POST['jenis'];
$kapasitas = $_POST['kapasitas'];

mysqli_query($koneksi, "INSERT INTO kendaraan VALUES('$no_polisi','$jenis','$kapasitas')");

header("location:kelola-kendaraan.php");
