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
                <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="col-lg-5 mb-4">
                        <a href="tambah-aset-barang.php">
                            <div class="card bg-primary text-white shadow">
                                <div class="card-body">
                                    Registrasi Barang
                                    <div class="float-right">
                                        <i class="fas fa-archive fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
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