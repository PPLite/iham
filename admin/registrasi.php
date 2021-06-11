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

                    <div class="row"> <!-- Pembuka buat "ROW" / kotak werno werni -->
                        <div class="row justify-content-center">
                                <div class="col-lg-5 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                            <div class="float-right">
                                            <i class="fas fa-archive fa-2x text-gray-300"></i></div>
                                        </div>
                                    </div>
                                </div>
                        </row>
                    </div> <!-- Penutup buat "ROW" -->

                        <div class="card-body">
                            <div class="col-md-12">
                                <button type="SUBMIT" class="btn btn-primary">Scan RFID</button>
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