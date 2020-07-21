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
                        <h1 class="h3 mb-0 text-gray-800">Detail Produk</h1>
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
                                        $data = mysqli_query($koneksi, "SELECT * FROM produk p JOIN detail_produk dp JOIN bahanbaku b WHERE dp.id_produk = p.id_produk AND p.id_produk='$id' AND dp.id_bahanbaku = b.id_bahanbaku");
                                        if (!$data) {
                                            ?>
                                            <tr>
                                                <td colspan="1" class="text-center font-weight-bold">Data Kosong</td>
                                            </tr>
                                            <?php
                                            } else {
                                                while ($item = mysqli_fetch_array($data)) {
                                                    ?>
                                                <tr>
                                                    <th width=5%>ID PRODUK</th>
                                                    <td class="align-middle"><?php echo $item['id_produk']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>NAMA PRODUK</th>
                                                    <td class="align-middle"><?php echo $item['nama_produk']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>SATUAN PRODUK</th>
                                                    <td class="align-middle"><?php echo $item['satuan_produk']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>HARGA PRODUK</th>
                                                    <td class="align-middle"><?php echo $item['harga']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" colspan="2">
                                                        <table class="table table-responsive table-hover table-bordered" id="Table">
                                                            <thead class="thead-light text-center">
                                                                <tr>
                                                                    <th width=6% class="align-middle">No</th>
                                                                    <th class="align-middle">Kode Bahan Baku</th>
                                                                    <th class="align-middle">Nama Bahan Baku</th>
                                                                    <th class="align-middle">Satuan</th>
                                                                    <th class="align-middle">Harga</th>
                                                                    <th class="align-middle">Nama Supplier</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                        $no = 1;
                                                                        $id_bahanbaku = $item['id_bahanbaku'];
                                                                        $data = mysqli_query($koneksi, "SELECT * FROM bahanbaku b JOIN supplier s WHERE b.id_supplier = s.id_supplier AND b.id_bahanbaku='$id_bahanbaku'");
                                                                        if (!$data) {
                                                                            ?>
                                                                    <tr>
                                                                        <td colspan="10" class="text-center font-weight-bold">Data Kosong</td>
                                                                    </tr>
                                                                    <?php
                                                                            } else {
                                                                                while ($item = mysqli_fetch_array($data)) {
                                                                                    ?>
                                                                        <tr>
                                                                            <td class="text-center align-middle"><?php echo $no++; ?></td>
                                                                            <td class="align-middle"><?php echo $item['id_bahanbaku']; ?></td>
                                                                            <td class="align-middle"><?php echo $item['nama_bahanbaku']; ?></td>
                                                                            <td class="align-middle"><?php echo $item['satuan_bahanbaku']; ?></td>

                                                                            <td class="align-middle"><?php echo $item['harga']; ?></td>
                                                                            <td class="align-middle"><?php echo $item['nama_supplier']; ?></td>
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
                                        <a href="kelola-produk.php" class="btn btn-sm btn-primary">Kembali</a>
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