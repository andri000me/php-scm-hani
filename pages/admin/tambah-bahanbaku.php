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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Bahan Baku</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="container row">
                        <div class="col-12">
                            <div class="card mb-5">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <!-- Content -->
                                    <form action="tambah-bahanbaku-proses.php" method="post">
                                        <div class="form-group">
                                            <label for="nama_bahanbaku">Nama Bahan Baku</label>
                                            <input type="text" name="nama_bahanbaku" id="nama_bahanbaku" placeholder="Isikan Nama Bahan Baku" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="satuan_bahanbaku">Satuan Bahan Baku</label>
                                            <input type="text" name="satuan_bahanbaku" id="satuan_bahanbaku" placeholder="Isikan Satuan Bahan Baku" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga (Rp)</label>
                                            <input type="text" name="harga" id="harga" placeholder="Isikan Harga" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="id_supplier">Nama Supplier</label>
                                            <select name="id_supplier" id="id_supplier" class="custom-select">
                                                <option selected disabled value="">Pilih Nama Supplier :</option>
                                                <?php
                                                include "../../koneksi.php";

                                                $sql = mysqli_query($koneksi, "SELECT id_supplier,nama_supplier FROM supplier");
                                                while ($data = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                    <option value="<?php echo $data['id_supplier']; ?>"><?php echo $data['nama_supplier']; ?></option>

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