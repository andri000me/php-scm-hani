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
                        <h1 class="h3 mb-0 text-gray-800">Ubah Supplier</h1>
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
                                        $data = mysqli_query($koneksi,"select * from supplier where id_supplier='$id'");
                                        while($d = mysqli_fetch_array($data)){
                                            ?>
                                    <form action="ubah-supplier-proses.php" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="id_supplier" id="id_supplier" value="<?php echo $d['id_supplier']; ?>" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_supplier">Nama</label>
                                            <input type="text" name="nama_supplier" id="nama_supplier" value="<?php echo $d['nama_supplier']; ?>"class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_supplier">Alamat Supplier</label>
                                            <input type="text" name="alamat_supplier" id="alamat_supplier" value="<?php echo $d['alamat_supplier']; ?>"class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telp">No Telp</label>
                                            <input type="text" name="no_telp" id="no_telp" value="<?php echo $d['no_telp']; ?>"class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" value="<?php echo $d['email']; ?>"class="form-control" required/>
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