<?php
include "../../koneksi.php";

$id = $_GET['id'];

$sql = mysqli_query($koneksi, "SELECT id_detail_pesanproduk FROM detail_pesanproduk WHERE id_pesanproduk=$id");
while ($row = mysqli_fetch_array($sql)) {
    $result = $row[0];
}

$id_detail_pesanproduk = $result;

mysqli_query($koneksi, "DELETE FROM detail_pesanproduk WHERE id_detail_pesanproduk=$id_detail_pesanproduk");

mysqli_query($koneksi, "DELETE FROM pesanproduk WHERE id_pesanproduk=$id");

header("location:kelola-pesanproduk.php");
