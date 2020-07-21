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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Produk</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="container row">
                        <div class="col-12">
                            <div class="card mb-5">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <!-- Content -->
                                    <form action="tambah-produk-proses.php" method="post">
                                        <div class="form-group">
                                            <label for="nama_produk">Nama Produk </label>
                                            <input type="text" name="nama_produk" id="nama_produk" placeholder="Isikan Nama Produk " class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="satuan_produk">Satuan Produk</label>
                                            <input type="text" name="satuan_produk" id="satuan_produk" placeholder="Isikan Satuan Produk" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga (Rp)</label>
                                            <input type="text" name="harga" id="harga" placeholder="Isikan Harga" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="id_bahanbaku">Nama Bahan Baku</label>
                                            <select name="id_bahanbaku" id="id_bahanbaku" class="custom-select">
                                                <option selected disabled value="">Pilih Nama Bahan Baku :</option>
                                                <?php
                                                include "../../koneksi.php";

                                                $sql = mysqli_query($koneksi, "SELECT id_bahanbaku,nama_bahanbaku FROM bahanbaku");
                                                while ($data = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                    <option value="<?php echo $data['id_bahanbaku']; ?>"><?php echo $data['nama_bahanbaku']; ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
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