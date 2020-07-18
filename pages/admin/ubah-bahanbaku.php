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
                        <h1 class="h3 mb-0 text-gray-800">Ubah Bahan Baku</h1>
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
                                    $data = mysqli_query($koneksi, "select * from bahanbaku where id_bahanbaku='$id'");
                                    while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                        <form action="ubah-bahanbaku-proses.php" method="post">
                                            <div class="form-group">
                                                <input type="hidden" name="id_bahanbaku" id="id_bahanbaku" value="<?php echo $d['id_bahanbaku']; ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_bahanbaku">Nama Bahan Baku</label>
                                                <input type="text" name="nama_bahanbaku" id="nama_bahanbaku" value="<?php echo $d['nama_bahanbaku']; ?>" class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="satuan_bahanbaku">Satuan Bahan Baku</label>
                                                <input type="text" name="satuan_bahanbaku" id="satuan_bahanbaku" value="<?php echo $d['satuan_bahanbaku']; ?>" class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">Harga</label>
                                                <input type="text" name="harga" id="harga" value="<?php echo $d['harga']; ?>" class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="id_supplier">Nama Supplier</label>
                                                <select name="id_supplier" id="id_supplier" class="custom-select">
                                                    <option selected value="<?php echo $d['id_supplier']; ?>">Pilih Nama Supplier :</option>
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