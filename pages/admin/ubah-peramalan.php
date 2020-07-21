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

        <?php include '../../layout/sidebar-admin.php' ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../../layout/topbar.php' ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ubah Peramalan</h1>
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
                                    $data = mysqli_query($koneksi, "select * from peramalan where id_peramalan='$id'") or die(mysqli_error($koneksi));
                                    while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                        <form action="ubah-peramalan-proses.php" method="post">
                                            <div class="form-group">
                                                <input type="hidden" name="id_user" id="id_user" value="<?php echo $d['id_user']; ?>" required />
                                                <input type="hidden" name="id_peramalan" id="id_peramalan" value="<?php echo $d['id_peramalan']; ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="bulan">Nama Bulan</label>
                                                <input type="text" name="bulan" id="bulan" value="<?php echo $d['bulan']; ?>" class="form-control" required />
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="hasil">Banyak Bahan Baku</label>
                                                <input type="text" name="hasil" id="hasil" value="<?php echo $d['hasil']; ?>" class="form-control" required />
                                            </div> -->
                                            <div class="form-group">
                                                <label for="id_bahanbaku">Nama Supplier</label>
                                                <select name="id_bahanbaku" id="id_bahanbaku" class="custom-select">
                                                    <option value="" disabled>Pilih Nama Supplier :</option>
                                                    <?php

                                                        include "../../koneksi.php";
                                                        $sql = mysqli_query($koneksi, "SELECT id_bahanbaku,nama_bahanbaku FROM bahanbaku") or die(mysqli_error($koneksi));
                                                        while ($row = mysqli_fetch_array($sql)) {
                                                            ?>
                                                        <option value="<?php echo $row['id_bahanbaku'] ?>"><?php echo $row['nama_bahanbaku']; ?></option>

                                                    <?php
                                                        }
                                                        ?>
                                                </select>
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