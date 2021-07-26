<?php
include('security.php');
include('includes/header.php');
include('includes/navbar-tamu.php');
include_once('database/dbconfig.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <P class="h3 mb-0 text-gray-800">Ruang Tunggu Anak </P>
  <P class="h5 mb-0 text-gray-800">Pilih permainan yang kamu suka </P>


  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>



  <!-- Content Row -->
  <div class="row">

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
        <a href=ruang-tunggu-kue.php style="text-decoration:none;">
            <div style="text-align: center">
              <span class="fas fa-birthday-cake fa-2x text-center text-primary"></span>
            </div>

            <div style="text-align: center">
              <div class=" text-m text-primary">Membuat Kue</div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
        <a href=ruang-tunggu-perbaiki.php style="text-decoration:none;">
            <div style="text-align: center">
              <span class="fas fa-tools fa-2x text-center text-success"></span>
            </div>

            <div style="text-align: center">
              <div class=" text-m text-success">Perbaiki Rumah</div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
            <a href=ruang-tunggu-petakumpet.php style="text-decoration:none;">
            <div style="text-align: center">
              <span class="fas fa-street-view fa-2x text-center text-warning"></span>
            </div>

            <div style="text-align: center">
              <div class=" text-m text-warning">Petak Umpet</div>
            </div>
          </a>
        </div>
      </div>
    </div>




  </div>

  <div style="text-align: center">
  <P class="h7 mb-0 text-gray-800"> Permainan disediakan oleh PBS-Kids</P>
<P class="h7 mb-0 text-blue-800"> pbskids.org </P>
</div>
</div>




<br>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>