<?php
// koneksi database
include "../../koneksi.php";

// menangkap data yang di kirim dari form
$id_pengadaan = $_POST['id_pengadaan'];
$id_bahanbaku = $_POST['id_bahanbaku'];
$bulan = $_POST['bulan'];
$periode = $_POST['periode'];
$tgl_pengadaan  = date('Y-m-d', strtotime($_POST['tgl_pengadaan']));
$id_user = $_POST['id_user'];

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
// update data ke database

$sql = mysqli_query($koneksi, "SELECT id_peramalan FROM pengadaan WHERE id_pengadaan='$id_pengadaan'");
while ($row = mysqli_fetch_array($sql)) {
    $result = $row[0];
}
$id_peramalan = $result;

mysqli_query($koneksi, "UPDATE peramalan SET bulan='$bulan',hasil='$hasil',id_bahanbaku='$id_bahanbaku',id_user='$id_user' WHERE id_peramalan = '$id_peramalan'");

$sql = mysqli_query($koneksi, "SELECT id_detail_pengadaan FROM pengadaan p JOIN detail_pengadaan dp WHERE p.id_pengadaan = dp.id_pengadaan AND dp.id_pengadaan = '$id_pengadaan'");
while ($row = mysqli_fetch_array($sql)) {
    $result = $row[0];
}
$id_detail_pengadaan = $result;


mysqli_query($koneksi, "UPDATE detail_pengadaan SET id_pengadaan='$id_pengadaan',id_bahanbaku='$id_bahanbaku',qty='$qty' WHERE id_detail_pengadaan = '$id_detail_pengadaan'");

mysqli_query($koneksi, "UPDATE pengadaan SET tgl_pengadaan='$tgl_pengadaan',periode='$periode',id_peramalan='$id_peramalan' WHERE id_pengadaan = '$id_pengadaan'");

// mengalihkan halaman kembali ke index.php
header("location:kelola-pengguna.php");
