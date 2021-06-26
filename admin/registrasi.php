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
                    <h4>Pilih Aset yang akan Di Registrasi</h4>
                </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                
                    <div class="col-lg-2 mb-3">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body">
                                    <a href="tambah-aset-barang.php" class="text-white">Peralatan Medis </a>
                                    <i class="fas fa-archive fa-2x text-gray-300 float-right"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 mb-3">
                                <div class="card bg-success text-white shadow">
                                    <div class="card-body">
                                    <a href="tambah-aset-bayi.php" class="text-white">Pasien</a>
                                    <i class="fas fa-procedures fa-2x text-gray-300 float-right"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 mb-3">
                                <div class="card bg-success text-white shadow">
                                    <div class="card-body">
                                    <a href="tambah-dokter.php" class="text-white">Dokter</a>
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
                                        <input type="hidden" name="rfid_uid" value="<?php if(isset($_GET['rfid_uid'])) {echo $_GET['rfid_uid'];} ?>" class="form-control">
                                    </div>
                                <div class="col-md-4">
                                    <button type="SUBMIT" class="btn btn-primary">Scan RFID</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--------Library------>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>