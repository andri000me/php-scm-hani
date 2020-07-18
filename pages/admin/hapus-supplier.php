<?php
include "../../koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM supplier WHERE id_supplier=$id");

header("location:kelola-supplier.php");
