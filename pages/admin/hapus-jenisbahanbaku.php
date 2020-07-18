<?php
include "../../koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM jenisbahanbaku WHERE id_jenisbahanbaku=$id");

header("location:kelola-jenis-bahanbaku.php");
