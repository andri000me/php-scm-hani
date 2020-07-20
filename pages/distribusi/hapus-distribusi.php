<?php
include "../../koneksi.php";

$id = $_GET['id'];

$sql = mysqli_query($koneksi, "SELECT id_detail_distribusi FROM detail_distribusi WHERE id_distribusi=$id");
while ($row = mysqli_fetch_array($sql)) {
    $result = $row[0];
}

$id_detail_distribusi = $result;

mysqli_query($koneksi, "DELETE FROM detail_distribusi WHERE id_detail_distribusi=$id_detail_distribusi");

mysqli_query($koneksi, "DELETE FROM distribusi WHERE id_distribusi=$id");

header("location:kelola-distribusi.php");
