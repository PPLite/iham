<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php');
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card mt-5">
                <div class="card-header text-center">
                    <h4> Registrasi Aset Baru </h4>
                </div>

<!--------MEMBUAT DROPDOWN UNTUK PEMILIHAN JENIS ASET----->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
        <div class="container mt-5">
</div>
    </div>
        </div>
        </div>

        <div class="card-body">
            <div class="text-center">
             <h5> Silahkan Pilih Aset yang akan Di Registrasi </h5>
        </div>

        <div class="row">
                    <div class="col-lg-5 mb-4">
                      <div class="card bg-primary text-white shadow">
                        <a href="tambah-aset-barang.php">
                        <div class="card-body">
                            Registrasi Barang
                        <div class="float-right">
                          <i class="fas fa-archive fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="col-lg-5 mb-4">
                    <div class="card bg-success text-white shadow">
                    <a href="tambah-aset-bayi.php">
                  <div class="card-body" >
                            Registrasi bayi
                  <div class="float-right">
                <i class="fas fa-baby-carriage fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

<!--- Yang dulunya pernah jadi dropdown
<div class="bs-example">
    <div class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jenis Aset</a>
        <div class="dropdown-menu">
            <a href="tambah-aset-barang.php" class="dropdown-item">barang</a>
            <a href="tambah-aset-bayi.php" class="dropdown-item">bayi</a>
        </div>
    </div>
</div>
</div>
--->

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

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php 
                                if(isset($_GET['rfid_uid']))
                                    {
                                        $query = "SELECT * FROM `tb_reader_scan` order by id desc limit 1";
                                        $query_run = mysqli_query($connection, $query);
                                        

                                    if(mysqli_num_rows($query_run) > 0)
                                    foreach($query_run as $row)
                                    ?>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Kode UID</label>
                                                <input type="text" value="<?= $row["rfid_uid"]; ?>" class="form-control" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Waktu Di Scan</label>
                                                <input type="text" value="<?= $row["timestamp"]; ?>" class="form-control" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Di Scan oleh Reader</label>
                                                <input type="text" value="<?= $row["reader_id"]; ?>" class="form-control" disabled>
                                            </div>

                                    <?php
                                 }
                                 else
                                 $row["rfid_uid"] = "";                                  
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

<!--------Library------>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>