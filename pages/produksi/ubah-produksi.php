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

        <?php include '../../layout/sidebar-produksi.php' ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../../layout/topbar.php' ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ubah Produksi</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="container row">
                        <div class="col-12">
                            <div class="card mb-5">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <!-- Content -->
                                    <?php
                                    include "../../koneksi.php";
                                    $id = $_GET['id'];
                                    $data = mysqli_query($koneksi, "SELECT * FROM detail_produksi WHERE id_detail_produksi = $id");
                                    while ($d = mysqli_fetch_assoc($data)) {
                                        ?>
                                        <form action="ubah-produksi-proses.php" method="post">
                                            <div class="form-group">
                                                <label for="id_pesanproduk">No Pemesanan Produk</label>
                                                <select name="id_pesanproduk" id="id_pesanproduk" class="custom-select">
                                                    <option selected disabled value="">Pilih No Pemesanan Produk :</option>
                                                    <?php
                                                        include "../../koneksi.php";

                                                        $sql = mysqli_query($koneksi, "SELECT id_pesanproduk,tanggal_pemesanan FROM pesanproduk");
                                                        while ($row = mysqli_fetch_assoc($sql)) {
                                                            ?>
                                                        <option value="<?php echo $row['id_pesanproduk']; ?>"><?php echo $row['id_pesanproduk']; ?> : <?php echo $row['tanggal_pemesanan']; ?></option>

                                                    <?php
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <input type="hidden" name="id_detail_produksi" id="id_detail_produksi" value="<?php echo $d['id_detail_produksi']; ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_mulai">Tanggal Mulai Produksi</label>
                                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="<?php echo $d['tanggal_mulai']; ?>" class="form-control" required />
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Ubah" />
                                            </div>
                                        </form>
                                    <?php
                                    }
                                    ?>
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