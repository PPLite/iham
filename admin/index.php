<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php');
include_once('database/dbconfig.php'); 
?>

<!-- Begin Page Content -->
  <div class="container-fluid">
  <P class="h3 mb-0 text-gray-800">IHAM Dashboard </P>
    <P class="h5 mb-0 text-gray-800">Rumah Sakit Ibu Dan Anak </P>
    <P class="h7 mb-0 text-gray-800">Jl. Arif Rahmad Hakim. No 39. Sukolilo Surabaya </P>


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>



<!-- Content Row -->
<div class="row">

    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">

              <div style="text-align: center">
                <span class="fa fa-user-md fa-2x text-center text-primary"></span>
              </div>

              <div style="text-align: center">
                <div class=" text-m text-primary" >Dokter</div>
              </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">

              <div style="text-align: center">
                <span class="fa fa-user-nurse fa-2x text-center text-success"></span>
              </div>

              <div style="text-align: center">
                <div class=" text-m text-success" >Perawat</div>
              </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">

              <div style="text-align: center">
                <span class="fa fa-user-injured fa-2x text-center text-danger"></span>
              </div>

              <div style="text-align: center">
                <div class=" text-m text-danger" >Pasien</div>
              </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">

              <div style="text-align: center">
                <span class="fa fa-baby fa-2x text-center text-info"></span>
              </div>

              <div style="text-align: center">
                <div class=" text-m text-info" >Bayi</div>
              </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">

              <div style="text-align: center">
                <span class="fa fa-procedures fa-2x text-center text-dark"></span>
              </div>

              <div style="text-align: center">
                <div class=" text-m text-dark" >Pesan Kamar</div>
              </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">

              <div style="text-align: center">
                <span class="fa fa-cogs fa-2x text-center text-secondary"></span>
              </div>

              <div style="text-align: center">
                <div class=" text-m text-secondary" >Pengaturan Pengguna</div>
              </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">

              <div style="text-align: center">
                <span class="fa fa-search-location fa-2x text-center text-dark"></span>
              </div>

              <div style="text-align: center">
                <div class=" text-m text-dark" >Monitoring Aset</div>
              </div>
            </div>
        </div>
    </div>

    </div>
</div>

<!-- Content Row -->

<div class="row">


    </div>
</div>













<?php
include('includes/scripts.php');
include('includes/footer.php');
?>