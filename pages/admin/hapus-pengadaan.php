<?php
include "../../koneksi.php";

$id = $_GET['id'];


$sql = mysqli_query($koneksi, "SELECT id_detail_pengadaan FROM detail_pengadaan WHERE id_pengadaan=$id");
while ($row = mysqli_fetch_array($sql)) {
    $result = $row[0];
}

$id_detail_pengadaan = $result;

mysqli_query($koneksi, "DELETE FROM detail_pengadaan WHERE id_detail_pengadaan=$id_detail_pengadaan");

$sql = mysqli_query($koneksi, "SELECT id_peramalan FROM pengadaan WHERE id_pengadaan=$id");
while ($row = mysqli_fetch_array($sql)) {
    $result = $row[0];
}

$id_peramalan = $result;

mysqli_query($koneksi, "DELETE FROM pengadaan WHERE id_pengadaan=$id");

mysqli_query($koneksi, "DELETE FROM peramalan WHERE id_peramalan=$id_peramalan");


header("location:kelola-pengadaan.php");
