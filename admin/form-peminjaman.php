<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php');
?>


<div class="container-fluid">

<!---- Untuk tombol "tambah aset"--->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Peminjaman Aset Barang
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">
    <form action="code.php" method="POST">

<div class="modal-body">



<div class="form-group">
        <label>Nama Peminjam</label>
        <input type="text" name="peminjam" id="peminjam" class="form-control" placeholder="Pilih Aset Terlebih Dahulu" required>
    </div>

    <div class="form-group">
        <label>Jabatan</label>
        <input type="text" name="Jabatan" id="Jabatan" class="form-control" placeholder="Pilih Aset Terlebih Dahulu" required>
    </div>




    <div class="form-group">
        <label>Nama Alat</label>
            <select name="nama_alat" id="nama_alat" class="form-control" onchange='changeValue(this.value)'required>
                <?php   
                    $query = mysqli_query($connection, "select * from tb_rfid order by id desc");  
                    $result = mysqli_query($connection, "select * from tb_rfid");  
                         $a = "var deskripsi = new Array();\n;";
                         //$b = "var id = new Array();\n;";
                         $c = "var keterangan = new Array();\n;";
                               while ($row = mysqli_fetch_array($result)) {  
                                     echo '<option name="nama_alat" value="'.$row['nama_alat'] . '">' . $row['nama_alat'] . '</option>';   
                                          $a .= "deskripsi['" . $row['nama_alat'] . "'] = {deskripsi:'" . addslashes($row['deskripsi'])."'};\n";
                                          //$c .= "id['" . $row['nama_alat'] . "'] = {id:'" . addslashes($row['id'])."'};\n";
                                          $c .= "keterangan['" . $row['nama_alat'] . "'] = {keterangan:'" . addslashes($row['keterangan'])."'};\n";
                            }  
                          ?>  
            </select>
    </div>



    <div class="form-group">
        <label>deskripsi</label>
        <input type="text" name="Deskripsi" id="deskripsi" class="form-control" placeholder="Pilih Aset Terlebih Dahulu" required>
    </div>

    <div class="form-group">
        <label>Keterangan</label>
        <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Pilih Aset Terlebih Dahulu" required>
    </div>

    <div class="form-group">
                <label>Status Asset</label>
                <select name="status_asset" class="form-control" id="status_asset" >   
                  <option value="konfirmasi_pinjam"> Dipinjam </option>
                  <option value="konfirmasi_pindah"> Dipindah </option>
                </select>
             </div>



</div>

<div class="modal-footer">
    <button type="submit" name="formpinjam" class="btn btn-primary">Simpan</button>
</div>
</form>




    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>