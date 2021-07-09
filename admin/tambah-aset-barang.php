<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
include('database/dbconfig.php');


?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-18">

            <div class="card mt-5">

                <div class="card-header text-center">
                    <h4> Registrasi Peralatan Medis</h4>
                </div>

                <div class="card-body">
                    <div class="row justify-content-center">

                        <div class="col-lg-3 mb-3">
                            <div class="card bg-primary text-white shadow">
                                <div class="card-body">
                                    <a href="tambah-aset-barang.php" class="text-white">Peralatan Medis </a>
                                    <i class="fa fa-medkit fa-2x text-gray-300 float-right"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-3">
                            <div class="card bg-success text-white shadow">
                                <div class="card-body">
                                    <a href="tambah-pasien.php" class="text-white">Pasien &nbsp;&nbsp;&nbsp;</a>
                                    <i class="fas fa-procedures fa-2x text-gray-300 float-right"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 mb-3">
                            <div class="card bg-success text-white shadow">
                                <div class="card-body">
                                    <a href="tambah-dokter.php" class="text-white">Dokter &nbsp;&nbsp;&nbsp;</a>
                                    <i class="fas fa-user-md fa-2x text-gray-300 float-right"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 mb-3">
                            <div class="card bg-success text-white shadow">
                                <div class="card-body">
                                    <a href="tambah-perawat.php" class="text-white">Perawat</a>
                                    <i class="fas fa-user-nurse fa-2x text-gray-300 float-right"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 mb-3">
                            <div class="card bg-success text-white shadow">
                                <div class="card-body">
                                    <a href="tambah-karyawan.php" class="text-white">Karyawan</a>
                                    <i class="fas fa-user fa-2x text-gray-300 float-right"></i>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="">
                                        <input type="hidden" name="rfid_uid" value="<?php if (isset($_GET['rfid_uid'])) {
                                                                                        echo $_GET['rfid_uid'];
                                                                                    } ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="SUBMIT" class="btn btn-primary">Scan RFID</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <hr>
                                        <?php
                                        if (isset($_GET['rfid_uid'])) {
                                            $query = "SELECT * FROM `tb_registrasi` order by id desc limit 1";
                                            $query_run = mysqli_query($connection, $query);


                                            if (mysqli_num_rows($query_run) > 0)
                                                foreach ($query_run as $row) {
                                        ?>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Kode UID</label>
                                                        <input type="text" value="<?= $row["rfid_uid"]; ?>" class="form-control" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Waktu Di Scan</label>
                                                        <input type="text" value="<?= $row["time_stamp"]; ?>" class="form-control" disabled>
                                                    </div>
                                                    <?php
                                                    // IKLAN DULU. BUAT BERSIHI SPASI DAN DOSA-DOSA YANG PERNAH ADA
                                                    $karakterasal = $row["rfid_uid"];
                                                    $karakterakhir = str_replace(' ', '', $karakterasal);
                                                    //LANJUT
                                                    ?>
                                                </div>
                                        <?php
                                                }
                                            else {
                                                $row["rfid_uid"] = "";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-body">

                        <form action="code.php" method="POST">

                            <div class="modal-body">

                                <div class="form-group">
                                    <input type="hidden" name="rfid_uid" class="form-control check_rfid_barang" value="<?php echo $karakterakhir ?>" placeholder="Masukkan kode UID" required>
                                </div>

                                <div class="form-group">
                                    <label> Nama Aset </label>
                                    <input type="text" name="nama_alat" class="form-control" placeholder="Masukkan Nama Asset" required>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi alat" required>
                                </div>

                                <div class="form-group">
                                    <label>Penanggung Jawab</label>
                                    <input type="text" name="penanggung_jawab" class="form-control" placeholder="Petugas yang bertanggungjawab" required>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="status_asset" id="status_asset" value="tersedia" class="form-control">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="daftaraset_btn" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include('includes/scripts.php');
        include('includes/footer.php');
        ?>