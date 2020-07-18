<?php

include "../../koneksi.php";


$nama_produk = $_POST['nama_produk'];

$data = mysqli_query($koneksi, "SELECT * from produk");
$n = mysqli_num_rows($data);

$kata = explode(" ", $nama_produk);
$temp = "";

foreach ($kata as $k) {
    $temp .= $k[0];
}

$id_produk = substr($temp, 0, 2) . strval($n + 1);

$satuan_produk = $_POST['satuan_produk'];
$harga = $_POST['harga'];

mysqli_query($koneksi, "INSERT INTO produk VALUES('$id_produk','$nama_produk','$satuan_produk','$harga')");

header("location:kelola-produk.php");
