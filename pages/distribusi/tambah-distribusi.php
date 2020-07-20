<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../../layout/header.php' ?>
</head>

<body id="page-top">

    <?php
    session_start();

    //cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['hak_akses'] == "") {
        header("location:../../index.php?pesan=gagal");
    }

    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../../layout/sidebar-distribusi.php' ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../../layout/topbar.php' ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Distribusi</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="container row">
                        <div class="col-12">
                            <div class="card mb-5">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <!-- Content -->
                                    <form action="tambah-distribusi-proses.php" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                                            <label for="id_pesanproduk">No Pesanan Produk</label>
                                            <select name="id_pesanproduk" id="id_pesanproduk" class="custom-select">
                                                <option selected disabled value="">Pilih No Pesanan Produk :</option>
                                                <?php
                                                include "../../koneksi.php";

                                                $sql = mysqli_query($koneksi, "SELECT * FROM pesanproduk");
                                                while ($data = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                    <option value="<?php echo $data['id_pesanproduk']; ?>"><?php echo $data['id_pesanproduk']; ?> - <?php echo strtoupper($data['nama_customer']); ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- tanggal pengiriman -->
                                        <div class="form-group">
                                            <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
                                            <input type="date" name="tanggal_pengiriman" id="tanggal_pengiriman" placeholder="Isikan Tanggal Pengiriman" class="form-control" required />
                                        </div>


                                        <div class="form-group">
                                            <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                                            <label for="no_polisi">Kurir Kendaraaan</label>
                                            <select name="no_polisi" id="no_polisi" class="custom-select">
                                                <option selected disabled value="">Pilih Kendaraaan :</option>
                                                <?php
                                                include "../../koneksi.php";

                                                $sql = mysqli_query($koneksi, "SELECT * FROM kendaraan");
                                                while ($data = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                    <option value="<?php echo $data['no_polisi']; ?>"><?php echo $data['no_polisi']; ?> - <?php echo strtoupper($data['jenis']); ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kota_wilayah">Kota / Wilayah</label>
                                            <input type="text" name="kota_wilayah" id="kota_wilayah" placeholder="Isikan Kota / Wilayah" class="form-control" required />
                                        </div>
                                        <!-- hitung estimasi tanggal sampai -->
                                        <hr>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Simpan" />
                                        </div>
                                    </form>
                                    <!-- End Content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include '../../layout/footer.php' ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include '../../layout/popup-logout.php' ?>

    <?php include '../../layout/js.php' ?>

</body>

</html>