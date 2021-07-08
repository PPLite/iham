<?php
include('database/dbconfig.php');
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');

$query = "select * from tb_peringkat ";
$result = mysqli_query($connection, $query);
?>

<!--  -->

<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Penilaian Peserta Vendor Pengadaan Barang
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">




lalalal yeyeye






    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>


  