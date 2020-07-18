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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Pesanan Produk</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="container row">
                        <div class="col-12">
                            <div class="card mb-5">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <!-- Content -->
                                    <form action="tambah-pesanproduk-proses.php" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                                            <label for="tanggal_pemesanan">Tanggal Pemesanan </label>
                                            <input type="date" name="tanggal_pemesanan" id="tanggal_pemesanan" placeholder="Isikan Tanggal Pemesanan" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_customer">Nama Pelanggan</label>
                                            <input type="text" name="nama_customer" id="nama_customer" placeholder="Isikan Nama Pelanggan" class="form-control" required />
                                        </div>

                                        <div class="form-group">
                                            <label for="id_produk">Nama Produk</label>
                                            <select name="id_produk" id="id_produk" class="custom-select">
                                                <option selected disabled value="">Pilih Produk :</option>
                                                <?php
                                                include "../../koneksi.php";

                                                $sql = mysqli_query($koneksi, "SELECT id_produk,nama_produk FROM produk");
                                                while ($data = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                    <option value="<?php echo $data['id_produk']; ?>"><?php echo $data['nama_produk']; ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="qty">Banyak Pesanan</label>
                                            <input type="text" name="qty" id="qty" placeholder="Isikan Banyak Pesanan" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="ukuran">Ukuran</label>
                                            <select name="ukuran" id="ukuran" class="custom-select">
                                                <option selected disabled value="">Pilih Ukuran Sepatu :</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <select name="keterangan" id="keterangan" class="custom-select">
                                                <option selected disabled value="">Pilih Keterangan :</option>
                                                <option value="Sepatu">Sepatu</option>
                                                <option value="Sandal">Sandal</option>
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