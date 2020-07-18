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

        <?php include '../../layout/sidebar-marketing.php' ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../../layout/topbar.php' ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kelola Pesanan Produk</h1>
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
                                        $data = mysqli_query($koneksi, "SELECT p.id_pesanproduk,p.tanggal_pemesanan,p.nama_customer FROM pesanproduk p JOIN detail_pesanproduk dp WHERE p.id_pesanproduk = dp.id_pesanproduk");
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
                                                    <th width=5%>ID PESANAN</th>
                                                    <td class="align-middle"><?php echo $item['id_pesanproduk']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>TANGGAL PEMESANAN</th>
                                                    <td class="align-middle"><?php echo $item['tanggal_pemesanan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>NAMA PELANGGAN</th>
                                                    <td class="align-middle">(Bpk/Ibu) <?php echo $item['nama_customer']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" colspan="2">
                                                        <table class="table table-responsive-lg table-hover table-bordered" id="Table">
                                                            <thead class="thead-light text-center">
                                                                <tr>
                                                                    <th width=6% class="align-middle">No</th>
                                                                    <th>Nama Produk</th>
                                                                    <th>Harga</th>
                                                                    <th>Qty</th>
                                                                    <th>Ukuran</th>
                                                                    <th>Keterangan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                        $no = 1;
                                                                        $data = mysqli_query($koneksi, "SELECT * FROM produk p JOIN detail_pesanproduk dp WHERE p.id_produk = dp.id_produk");
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
                                                                            <td class="align-middle"><?php echo $item['nama_produk']; ?></td>
                                                                            <td class="align-middle"><?php echo $item['harga']; ?></td>
                                                                            <td class="align-middle"><?php echo $item['qty']; ?></td>
                                                                            <td class="align-middle"><?php echo $item['ukuran']; ?></td>
                                                                            <td class="align-middle"><?php echo $item['keterangan']; ?></td>
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
                                        <a href="kelola-pesanproduk.php" class="btn btn-sm btn-primary">Kembali</a>
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