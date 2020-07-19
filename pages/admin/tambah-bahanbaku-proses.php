<?php

include "../../koneksi.php";

$nama_bahanbaku = $_POST['nama_bahanbaku'];

$data = mysqli_query($koneksi, "SELECT * from bahanbaku");
$n = mysqli_num_rows($data);

$kata = explode(" ", $nama_bahanbaku);
$temp = "";

foreach ($kata as $k) {
    $temp .= $k[0];
}

$id_bahanbaku = substr($temp, 0, 2) . strval($n + 1);

$satuan_bahanbaku = $_POST['satuan_bahanbaku'];
$harga = $_POST['harga'];
$id_supplier = $_POST['id_supplier'];

mysqli_query($koneksi, "INSERT INTO bahanbaku VALUES('$id_bahanbaku','$nama_bahanbaku','$satuan_bahanbaku','$harga','$id_supplier')");

header("location:kelola-bahanbaku.php");
