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
                    <h4> Registrasi Asset Bayi Baru</h4>
                </div>
                            <div class="card-body">
                                <form action="" method="GET">
                                <div class="row">
                                    <div class="">
                                        <input type="hidden" name="rfid_uid" value="<?php if(isset($_GET['rfid_uid'])) {echo $_GET['rfid_uid'];} ?>" class="form-control">
                                    </div>
                                <div class="col-md-4">
                                    <button type="SUBMIT" class="btn btn-primary">Ambil dari RFID</button>
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







<!DOCTYPE html>
<html>
<style>
table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
}
th,td {
  padding: 5px;
}
</style>
<body>

<h1>The XMLHttpRequest Object</h1>

<form action=""> 
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="customers" value="<?= $row["rfid_uid"]; ?>" onchange="showCustomer(this.value)" class="form-control" placeholder="Masukkan kode RFID" required>
    </div>
</form>

<br>
<div id="txtHint">Customer info will be listed here...</div>

</body>
</html>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>