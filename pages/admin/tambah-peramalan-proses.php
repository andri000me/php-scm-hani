<?php

include "../../koneksi.php";


$id_bahanbaku = $_POST['id_bahanbaku'];
$bulan = $_POST['bulan'];
$id_user = $_POST['id_user'];

mysqli_query($koneksi, "INSERT INTO peramalan VALUES(null,'$bulan','0','$id_bahanbaku','$id_user')");

header("location:kelola-peramalan.php");
