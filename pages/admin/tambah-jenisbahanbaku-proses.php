<?php

include "../../koneksi.php";

$nama_jenisbahanbaku = $_POST['nama_jenisbahanbaku'];

mysqli_query($koneksi, "INSERT INTO jenisbahanbaku VALUES('','$nama_jenisbahanbaku')");

header("location:kelola-jenis-bahanbaku.php");
