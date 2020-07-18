<?php

include "../../koneksi.php";

$nama_supplier = $_POST['nama_supplier'];
$alamat_supplier = $_POST['alamat_supplier'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];

mysqli_query($koneksi, "INSERT INTO supplier VALUES('','$nama_supplier','$alamat_supplier','$no_telp','$email')");

header("location:kelola-supplier.php");
