<?php
include "../../koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM pesanbahanbaku WHERE id_pesanbahanbaku='$id'");

header("location:kelola-pesanbahanbaku.php");
