<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php')
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card mt-5">
                <div class="card-header text-center">
                    <h4> Demo ambil data dan Kirim Data </h4>
                </div>
                    <div class="card-body">
                    <form action="" method="GET">

                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" name="rfid_uid" value="<?php if(isset($_GET['rfid_uid'])) {echo $_GET['rfid_uid'];} ?>" class="form-control">
                            </div>

                            <div class="col-md-4">
                                <button type="get" class="btn btn-primary">Ambil dari RFID</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php 
                                if(isset($_GET['rfid_uid']))
                                {
                                    $rfid_uid = $_GET['rfid_uid'];
                                    $query = "SELECT * FROM tb_status_scan WHERE id='$rfid_uid' ";
                                    $query_run = mysqli_query($connection, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Kode UID</label>
                                                        <input type="text" value="<?= $row["rfid_uid"]; ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Kode UID</label>
                                                        <input type="text" value="<?= $row["nama_alat"]; ?>" class="form-control">
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    }
                                    
                                    else
                                    {
                                       "Data Belum Terdaftar";
                                    }
                                 }      
                        
                            ?>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>