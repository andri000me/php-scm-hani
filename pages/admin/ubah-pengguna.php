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
                        <h1 class="h3 mb-0 text-gray-800">Ubah Pengguna</h1>
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
                                        $data = mysqli_query($koneksi,"select * from user where id_user='$id'");
                                        while($d = mysqli_fetch_array($data)){
                                            ?>
                                    <form action="ubah-pengguna-proses.php" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="id_user" id="id_user" value="<?php echo $d['id_user']; ?>" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" id="nama" value="<?php echo $d['nama']; ?>"class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" value="<?php echo $d['username']; ?>" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" value="<?php echo $d['password']; ?>"class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" value="<?php echo $d['email']; ?>"class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" id="alamat" value="<?php echo $d['alamat']; ?>"class="form-control" required/>
                                        </div>
                                            <div class="form-group">
                                                <label for="hak_akses">Hak Akses</label>
                                                <select name="hak_akses" id="hak_akses" class="custom-select">
                                                    <option selected disabled value="">Pilih Level :</option>
                                                    <option value="distribusi">Distribusi</option>
                                                    <option value="marketing">Marketing</option>
                                                    <option value="produksi">Produksi</option>
                                                    <option value="dmin">Kepala Gudang</option>
                                                </select>
                                            </div>
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                                <select name="jabatan" id="jabatan" class="custom-select">
                                                    <option selected disabled value="">Pilih Level :</option>
                                                    <option value="Manajer Distribusi">Manajer Distribusi</option>
                                                    <option value="Manajer Marketing">Manajer Marketing</option>
                                                    <option value="Manajer Produksi">Manajer Produksi</option>
                                                    <option value="Kepala Gudang">Kepala Gudang</option>
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