<?php

include "../../koneksi.php";

$nama_bahanbaku = $_POST['nama_bahanbaku'];
$satuan_bahanbaku = $_POST['satuan_bahanbaku'];
$harga = $_POST['harga'];
$id_supplier = $_POST['id_supplier'];

mysqli_query($koneksi, "INSERT INTO bahanbaku VALUES(null,'$nama_bahanbaku','$satuan_bahanbaku','$harga','$id_supplier')");

header("location:kelola-bahanbaku.php");
