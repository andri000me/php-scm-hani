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

        <?php include '../../layout/sidebar-distribusi.php' ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../../layout/topbar.php' ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail Distribusi</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="container row-12">
                        <div class="col">
                            <div class="card mb-5">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-bordered">
                                        <?php
                                        include "../../koneksi.php";

                                        //$no = 1;
                                        $id = $_GET['id'];
                                        $data = mysqli_query($koneksi, "SELECT * FROM kendaraan k JOIN distribusi d JOIN detail_distribusi dd WHERE d.id_distribusi = $id AND dd.id_distribusi = $id AND d.no_polisi = k.no_polisi");
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
                                                    <th>ID PEMESANAN</th>
                                                    <td class="align-middle"><?php echo $item['id_pesanproduk']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>TANGGAL PENGIRIMAN</th>
                                                    <td class="align-middle"><?php echo $item['tanggal_pengiriman']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>TANGGAL SAMPAI (estimasi)</th>
                                                    <td class="align-middle"><?php echo $item['tanggal_sampai']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>DIKIRIM MENGGUNAKAN</th>
                                                    <td class="align-middle"><?php echo $item['no_polisi']; ?> - <?php echo strtoupper($item['jenis']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>KOTA / WILAYAH TUJUAN</th>
                                                    <td class="align-middle"><?php echo strtoupper($item['kota_wilayah']); ?> </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" colspan="2">
                                                        <table class="table table-responsive table-hover table-bordered" id="Table">
                                                            <thead class="thead-light text-center">
                                                                <tr>
                                                                    <th width=6% class="align-middle">No</th>
                                                                    <th class="align-middle">No Pesanan Produk</th>
                                                                    <th class="align-middle">Tanggal Pesan</th>
                                                                    <th class="align-middle">Nama Pelanggan</th>
                                                                    <th class="align-middle">Nama Produk</th>
                                                                    <th class="align-middle">QTY</th>
                                                                    <th class="align-middle">Ukuran</th>
                                                                    <th class="align-middle">Keterangan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                        $no = 1;
                                                                        $id_pesanproduk = $item['id_pesanproduk'];
                                                                        $data = mysqli_query($koneksi, "SELECT * FROM pesanproduk p JOIN detail_pesanproduk dp JOIN produk pr WHERE p.id_pesanproduk=$id_pesanproduk AND dp.id_pesanproduk=$id_pesanproduk AND dp.id_produk = pr.id_produk");
                                                                        if (!$data) {
                                                                            ?>
                                                                    <tr>
                                                                        <td colspan="10" class="text-center font-weight-bold">Data Kosong</td>
                                                                    </tr>
                                                                    <?php
                                                                            } else {
                                                                                while ($item = mysqli_fetch_array($data)) {

                                                                                    $tanggal_pemesanan = date('d-m-Y', strtotime($item['tanggal_pemesanan']));
                                                                                    ?>
                                                                        <tr>
                                                                            <td class="text-center align-middle"><?php echo $no++; ?></td>
                                                                            <td class="align-middle"><?php echo $item['id_pesanproduk']; ?></td>
                                                                            <td class="align-middle"><?php echo $tanggal_pemesanan; ?></td>
                                                                            <td class="align-middle"><?php echo strtoupper($item['nama_customer']); ?></td>
                                                                            <td class="align-middle"><?php echo $item['nama_produk']; ?></td>
                                                                            <td class="align-middle"><?php echo $item['qty']; ?> <?php echo $item['satuan_produk']; ?></td>

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
                                        <a href="kelola-distribusi.php" class="btn btn-sm btn-primary">Kembali</a>
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