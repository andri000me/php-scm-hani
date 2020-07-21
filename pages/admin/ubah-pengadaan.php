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
                        <h1 class="h3 mb-0 text-gray-800">Ubah Pengadaan</h1>
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
                                    $data = mysqli_query($koneksi, "select * from pengadaan where id_pengadaan='$id'");
                                    while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                        <form action="ubah-produk-proses.php" method="post">
                                            <div class="form-group">
                                                <input type="hidden" name="id_pengadaan" id="id_pengadaan" value="<?php echo $d['id_pengadaan']; ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_pengadaan">Tanggal Pengadaan </label>
                                                <input type="date" name="tgl_pengadaan" id="tgl_pengadaan" class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="bulan">Kebutuhan Pengadaan (Bulan)</label>
                                                <select name="bulan" id="bulan" class="custom-select">
                                                    <option selected disabled value="">Pilih Kebutuhan Bulan :</option>
                                                    <option value="Januari">Januari</option>
                                                    <option value="Februari">Februari</option>
                                                    <option value="Maret">Maret</option>
                                                    <option value="April">April</option>
                                                    <option value="Mei">Mei</option>
                                                    <option value="Juni">Juni</option>
                                                    <option value="Juli">Juli</option>
                                                    <option value="Agustus">Agustus</option>
                                                    <option value="September">September</option>
                                                    <option value="Oktober">Oktober</option>
                                                    <option value="November">November</option>
                                                    <option value="Desember">Desember</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_bahanbaku">Nama Bahan Baku</label>
                                                <select name="id_bahanbaku" id="id_bahanbaku" class="custom-select">
                                                    <option selected disabled value="">Pilih Nama Bahan Baku :</option>
                                                    <?php
                                                        include "../../koneksi.php";

                                                        $sql = mysqli_query($koneksi, "SELECT id_bahanbaku,nama_bahanbaku FROM bahanbaku");
                                                        while ($row = mysqli_fetch_assoc($sql)) {
                                                            ?>
                                                        <option value="<?php echo $row['id_bahanbaku']; ?>"><?php echo $row['nama_bahanbaku']; ?></option>

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