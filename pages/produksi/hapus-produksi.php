<?php
include "../../koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM detail_produksi WHERE id_detail_produksi=$id");

header("location:kelola-produksi.php");
