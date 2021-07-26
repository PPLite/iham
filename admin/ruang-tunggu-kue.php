<?php
include('security.php');
include('includes/header.php');
include('includes/navbar-tamu.php');
include_once('database/dbconfig.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <P class="h3 mb-0 text-gray-800">Membuat Kue Ulang Tahun</P>
  <P class="h7 mb-0 text-gray-800">Sesuaikan buah dan lilin sesuai potongan kue yang ada</P>


  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>



  <!-- Content Row -->
  <div style="text-align: center">
  <iframe width="900" height="480" data-game="make-the-cake" data-rock="17" data-name="Make the Cake" frameborder="0" scrolling="no" id="gamePlayer" class="gamePlayer" src="https://springroll-tc.pbskids.org/make-the-cake/2da4341030c41989dc3603c3b5b2fc2b0968bf9d/release/index.html"> </iframe>

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