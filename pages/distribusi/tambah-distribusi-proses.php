<?php

include "../../koneksi.php";

function ubahTanggalSql($date)
{
    $exp = explode('/', $date);
    if (count($exp) == 3) {
        $date = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
    }
    return $date;
}

//$tanggal_pemesanan = ubahTanggalSql($_POST['tanggal_pemesanan']);
$tanggal_pemesanan         = date('Y-m-d', strtotime($_POST['tanggal_pemesanan']));
$nama_customer = $_POST['nama_customer'];

mysqli_query($koneksi, "INSERT INTO distribusi VALUES(null,'$tanggal_pemesanan','$nama_customer')");

header("location:kelola-distribusi.php");
