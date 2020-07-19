<?php

include "../../koneksi.php";


$id_bahanbaku = $_POST['id_bahanbaku'];
$bulan = $_POST['bulan'];
$periode = $_POST['periode'];
$tgl_pengadaan  = date('Y-m-d', strtotime($_POST['tgl_pengadaan']));
$id_user = $_POST['id_user'];

$data = mysqli_query($koneksi, "SELECT * from peramalan");
$n = mysqli_num_rows($data);

$id_peramalan = $n + 1;

$data = mysqli_query($koneksi, "SELECT * from pengadaan");
$n = mysqli_num_rows($data);

$id_pengadaan = $n + 1;

$bulan_in_years = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

//example $bulan = Juli
function SMA($bulan, $bulan_in_years, $koneksi)
{
    $temp = array();

    if (in_array($bulan, $bulan_in_years)) {
        $bulan_sekarang = array_search($bulan, $bulan_in_years);

        for ($i = 1; $i <= 6; $i++) {
            if ($bulan_sekarang - $i < 0) {
                $bulan_sekarang += 12;
            }
            array_push($temp, $bulan_in_years[$bulan_sekarang - $i]);
        }
    }

    $listbulan = join("','", $temp);
    $sql = mysqli_query($koneksi, "SELECT SUM(hasil) FROM peramalan WHERE bulan IN ('$listbulan')");
    while ($row = mysqli_fetch_array($sql)) {
        $totalhasil = $row[0];
    }
    return (int) $totalhasil / 6;
}

$hasil = SMA($bulan, $bulan_in_years, $koneksi);

mysqli_query($koneksi, "INSERT INTO peramalan VALUES('$id_peramalan','$bulan','$hasil','$id_bahanbaku','$id_user')");

mysqli_query($koneksi, "INSERT INTO pengadaan VALUES('$id_pengadaan','$tgl_pengadaan','$periode','$id_peramalan')");

mysqli_query($koneksi, "INSERT INTO detail_pengadaan VALUES(null,'$id_pengadaan','$id_bahanbaku','$hasil')");

header("location:kelola-pengadaan.php");
