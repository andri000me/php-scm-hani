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
                        <h1 class="h3 mb-0 text-gray-800">Detail Pengadaan</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="container row-12">
                        <div class="col">
                            <div class="card mb-5">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive-lg table-bordered">
                                        <?php
                                        include "../../koneksi.php";

                                        //$no = 1;
                                        $id = $_GET['id'];
                                        $data = mysqli_query($koneksi, "SELECT * FROM peramalan pe JOIN pengadaan p JOIN detail_pengadaan dp JOIN bahanbaku bb WHERE pe.id_peramalan = p.id_peramalan AND p.id_pengadaan=dp.id_pengadaan AND dp.id_bahanbaku = bb.id_bahanbaku AND p.id_pengadaan = $id");
                                        if (!$data) {
                                            ?>
                                            <tr>
                                                <td colspan="3" class="text-center font-weight-bold">Data Kosong</td>
                                            </tr>
                                            <?php
                                            } else {
                                                while ($item = mysqli_fetch_array($data)) {
                                                    ?>
                                                <tr>
                                                    <th width=5%>ID PENGADAAN</th>
                                                    <td class="align-middle"><?php echo $item['id_pengadaan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>TANGGAL PENGADAAN</th>
                                                    <td class="align-middle"><?php echo $item['tgl_pengadaan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>JUMLAH PENGADAAN</th>
                                                    <td class="align-middle"><?php echo $item['qty']; ?> <?php echo $item['satuan_bahanbaku']; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" colspan="2">
                                                        <table class="table table-responsive-lg table-hover table-bordered" id="Table">
                                                            <thead class="thead-light text-center">
                                                                <tr>
                                                                    <th width=6% class="align-middle">No</th>
                                                                    <th>Nama Bahan Baku</th>
                                                                    <th>Harga</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                        $no = 1;
                                                                        $data = mysqli_query($koneksi, "SELECT * FROM bahanbaku p JOIN detail_pengadaan dp JOIN pengadaan pe WHERE p.id_bahanbaku = dp.id_bahanbaku AND pe.id_pengadaan = $id AND dp.id_pengadaan=$id");
                                                                        if (!$data) {
                                                                            ?>
                                                                    <tr>
                                                                        <td colspan="3" class="text-center font-weight-bold">Data Kosong</td>
                                                                    </tr>
                                                                    <?php
                                                                            } else {
                                                                                while ($item = mysqli_fetch_array($data)) {
                                                                                    ?>
                                                                        <tr>
                                                                            <td class="text-center align-middle"><?php echo $no++; ?></td>
                                                                            <td class="align-middle"><?php echo $item['nama_bahanbaku']; ?></td>
                                                                            <td class="align-middle"><?php echo $item['harga']; ?></td>
                                                                        </tr>

                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </table>

                                    <div class="nav-item">
                                        <a href="kelola-pengadaan.php" class="btn btn-sm btn-primary">Kembali</a>
                                    </div>
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