<?php
include "../../koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM bahanbaku WHERE id_bahanbaku='$id'");

header("location:kelola-bahanbaku.php");
