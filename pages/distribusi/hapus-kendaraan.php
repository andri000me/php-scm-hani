<?php
include "../../koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM kendaraan WHERE no_polisi=$id");

header("location:kelola-kendaraan.php");
