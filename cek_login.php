<?php
session_start();

include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$password'");

$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    //jika login sebagai admin
    if ($data['hak_akses'] == "manajer") {
        //buat session
        $_SESSION['username'] = $username;
        $_SESSION['hak_akses'] = "manajer";

        //alihkan
        header("location:manajer/");
    } else if ($data['hak_akses'] == "admin") {
        //buat session
        $_SESSION['username'] = $username;
        $_SESSION['hak_akses'] = "admin";
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['jabatan'] = $data['jabatan'];

        //alihkan
        header("location:pages/admin/");
    } else if ($data['hak_akses'] == "gudang") {
        //buat session
        $_SESSION['username'] = $username;
        $_SESSION['hak_akses'] = "gudang";

        //alihkan
        header("location:gudang/");
    } else if ($data['hak_akses'] == "produksi") {
        //buat session
        $_SESSION['username'] = $username;
        $_SESSION['hak_akses'] = "produksi";

        //alihkan
        header("location:produksi/");
    } else if ($data['hak_akses'] == "admin") {
        //buat session
        $_SESSION['username'] = $username;
        $_SESSION['hak_akses'] = "admin";

        //alihkan
        header("location:pages/admin/");
    } else if ($data['hak_akses'] == "marketing") {
        //buat session
        $_SESSION['username'] = $username;
        $_SESSION['hak_akses'] = "marketing";

        //alihkan
        header("location:marketing/");
    } else {

        // alihkan ke halaman login kembali
        header("location:../../index.php?pesan=gagal");
    }
} else {
    header("location:../../index.php?pesan=gagal");
}
