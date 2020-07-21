<?php
include "../../koneksi.php";

$id = $_GET['id'];

$sql = mysqli_query($koneksi, "SELECT id_detail_produk FROM detail_produk WHERE id_produk='$id'");
while ($row = mysqli_fetch_array($sql)) {
    $result = $row[0];
}

$id_detail_produk = $result;
mysqli_query($koneksi, "DELETE FROM detail_produk WHERE id_detail_produk='$id_detail_produk'");

mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk='$id'");

header("location:kelola-produk.php");
