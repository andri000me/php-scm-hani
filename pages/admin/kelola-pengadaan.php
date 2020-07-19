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
                        <h1 class="h3 mb-0 text-gray-800">Kelola Pengadaan</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="container row-12">
                        <div class="col">
                            <div class="card mb-5">
                                <div class="card-header">
                                    <div class="nav-item">
                                        <a href="tambah-pengadaan.php" class="btn btn-sm btn-primary">Tambah Pengadaan</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive-lg table-hover table-bordered" id="Table">
                                        <thead class="thead-light text-center">
                                            <tr>
                                                <th width=6%>No</th>
                                                <th>No Pengadaan</th>
                                                <th>Tanggal Pengadaan</th>
                                                <th width=23%></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "../../koneksi.php";

                                            $no = 1;
                                            $data = mysqli_query($koneksi, "SELECT * FROM pengadaan");
                                            if (mysqli_num_rows($data) == 0) {
                                                ?>
                                                <tr>
                                                    <td colspan="7" class="text-center font-weight-bold">Data Kosong</td>
                                                </tr>
                                                <?php
                                                } else {
                                                    while ($item = mysqli_fetch_array($data)) {
                                                        ?>
                                                    <tr>
                                                        <td class="text-center align-middle"><?php echo $no++; ?></td>
                                                        <td class="align-middle"><?php echo $item['id_pengadaan']; ?></td>
                                                        <td class="align-middle"><?php echo $item['tgl_pengadaan']; ?></td>
                                                        <td class="text-center">
                                                            <a href="ubah-pengadaan.php?id=<?php echo $item['id_pengadaan'] ?>" class="btn btn-info btn-sm mx-1 float-left">Ubah</a>
                                                            <a href="detail-pengadaan.php?id=<?php echo $item['id_pengadaan'] ?>" class="btn btn-success btn-sm mx-1 float-left">Detail</a>

                                                            <form action="hapus-pengadaan.php?id=<?php echo $item['id_pengadaan'] ?>" method="post">
                                                                <button type="submit" class="btn btn-danger btn-sm mx-1 float-left">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>

                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
    <script>
        $(document).ready(function() {
            $('#Table').DataTable();
        });
    </script>

</body>

</html>