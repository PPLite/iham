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
                            <div class="">
                                <input type="hidden" name="tag_id" value="<?php if(isset($_GET['tag_id'])) {echo $_GET['tag_id'];} ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <button type="SUBMIT" class="btn btn-primary">Ambil dari RFID</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php 
                                if(isset($_GET['tag_id']))
                                    {
                                        $query = "SELECT * FROM `tb_reader_scan` order by id desc limit 1";
                                        $query_run = mysqli_query($connection, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    foreach($query_run as $row)
                                    ?>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Kode UID</label>
                                                <input type="text" value="<?= $row["tag_id"]; ?>" class="form-control" disabled>
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



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card mt-5">
                    <div class="card-body">

<form action="code.php" method="POST">

<div class="modal-body">

        <div class="form-group">
        <label>Kode UID</label>
        <input type="text" name="rfid_uid" class="form-control" value="<?= $row["tag_id"]; ?>" placeholder="Masukkan kode UID" required>
        </div>     

    <div class="form-group">
        <label>Id Pengenal</label>
        <input type="text" name="id_pengenal" class="form-control" placeholder="Masukkan Nomor KTP" required>
    </div>

    <div class="form-group">
        <label>Nama Anak</label>
        <input type="text" name="nama_anak" class="form-control" placeholder="Masukkan Nama Anak" required>
    </div>

    <div class="form-group">
        <label>Nama Ibu</label>
        <input type="text" name="nama_ibu" class="form-control" placeholder="Masukkan Nama Ibu" required>
    </div>

    <div class="form-group">
        <label>Penanggung Jawab</label>
        <input type="text" name="penanggung_jawab" class="form-control" placeholder="Masukkan Penanggung Jawab" required>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control" >
          <option value="masuk"> Masuk </option>   
          <option value="checkin"> Check In </option>
          <option value="perawatan"> Perawatan </option>
          <option value="checkout"> Check Out </option>
          <option value="peringatan"> Peringatan </option>
          <option value="validasi"> Validasi </option>
        </select>
     </div>

</div>
<div class="modal-footer">
    <button type="submit" name="daftarasetanak_btn" class="btn btn-primary">Simpan</button>
</div>
</form>
            </div>
        </div>
    </div>
</div


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>