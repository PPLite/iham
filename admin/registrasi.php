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
                    <h4> Registrasi Asset Barang Baru</h4>
                </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                
                            <div class="col-lg-5 mb-4">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body">
                                    <a href="tambah-aset-barang.php" class="text-white">Registrasi Barang </a>
                                    <i class="fas fa-archive fa-2x text-gray-300 float-right"></i>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-5 mb-4">
                                <div class="card bg-success text-white shadow">
                                    <div class="card-body">
                                    <a href="tambah-aset-bayi.php" class="text-white">Registrasi Bayi</a>
                                    <i class="fas fa-baby-carriage fa-2x text-gray-300 float-right"></i>
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