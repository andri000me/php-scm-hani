<?php
include "../../koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM peramalan WHERE id_peramalan=$id");

header("location:kelola-peramalan.php");
