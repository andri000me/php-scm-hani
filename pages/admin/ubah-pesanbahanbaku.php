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
                        <h1 class="h3 mb-0 text-gray-800">Ubah Pesan Bahan Baku</h1>
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
                                    $data = mysqli_query($koneksi, "SELECT * FROM pesanbahanbaku WHERE id_pesanbahanbaku='$id'");
                                    while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                        <form action="ubah-pesanbahanbaku-proses.php" method="post">
                                            <div class="form-group">
                                                <input type="hidden" name="id_user" id="id_user" value="<?php echo $d['id_user']; ?>" required />
                                                <input type="hidden" name="id_pesanbahanbaku" id="id_pesanbahanbaku" value="<?php echo $d['id_pesanbahanbaku']; ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_bahanbaku">Tanggal Pemesanan</label>
                                                <input type="date" name="tanggal_pemesanan" id="tanggal_pemesanan" value="<?php echo $d['tanggal_pemesanan']; ?>" class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="id_pengadaan">No Pengadaan</label>
                                                <select name="id_pengadaan" id="id_pengadaan" class="custom-select">
                                                    <option selected disabled value="">Pilih No Pengadaan :</option>
                                                    <?php
                                                        include "../../koneksi.php";

                                                        $sql = mysqli_query($koneksi, "SELECT id_pengadaan,tgl_pengadaan FROM pengadaan");
                                                        while ($row = mysqli_fetch_assoc($sql)) {
                                                            ?>
                                                        <option value="<?php echo $row['id_pengadaan']; ?>"><?php echo $row['id_pengadaan']; ?> : <?php echo $row['tgl_pengadaan']; ?></option>

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