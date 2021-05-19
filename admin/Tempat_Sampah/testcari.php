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
                                    $query = "SELECT * FROM tb_reader_scan WHERE id='$rfid_uid' ";
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
                                            <?php
                                        }
                                    }
                                    
                                    else
                                    {
                                        $query = "SELECT * FROM `tb_reader_scan` order by id desc limit 1";
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
                                            <?php
                                        }
                                    }
                                 }      
                        }
                        
                            ?>


                            <div class="col-md-12">
                            <form action="code.php" method="POST">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" value="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Id Pengenal</label>
                                    <input type="text" name="id_pengenal" value=999 id="id_pengenal" class="form-control" placeholder="Masukkan Nomor KTP">
                                </div>

                                <div class="form-group">
                                    <label>Nama Anak</label>
                                    <input type="text" name="nama_anak" id="nama_anak" class="form-control" placeholder="Masukkan Nama Anak">
                                </div>

                                <div class="form-group">
                                    <label>Nama Ibu</label>
                                    <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" placeholder="Masukkan Nama Ibu">
                                </div>

                                <div class="form-group">
                                    <label>Penanggung Jawab</label>
                                    <input type="text" name="penanggung_jawab" id="penanggung_jawab" class="form-control" placeholder="Masukkan Penanggung Jawab">
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control" >
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" name="daftarasetanak_btn" class="btn btn-primary ">Perbarui</button>
                            </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
include('includes/scripts.php');
include('includes/footer.php');
?>