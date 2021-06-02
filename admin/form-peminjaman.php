<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php');
//$mysqli = NEW MySQLi ('localhost','root','',);
$resultSet = $connection -> query("SELECT nama_alat FROM tb_rfid");
?>


<div class="container-fluid">

<!---- Untuk tombol "tambah aset"--->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Menu Pengelolaan Aset Anak
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">
    <form action="code.php" method="POST">

<div class="modal-body">
    <div class="form-group">
        <label>Nama Peminjam</label>
        <input type="text" name="rfid_uid" class="form-control" placeholder="Nama" required>
    </div>     

    <div class="form-group">
        <label>Jabatan</label>
        <input type="text" name="id_pengenal" class="form-control" placeholder="Jabatan" required>
    </div>

    <div class="form-group">
        <label>Nama Barang</label>
        <?php while ($rows = $resultSet -> fetch_assoc()) 
                {
                    $nama_barang = rows['nama-barang'];
                    echo "<option value='$nama_barang'> $nama_barang </option>";
                }
        ?>
    </div>

    <div class="form-group">
        <label>Keperluan</label>
        <input type="text" name="nama_ibu" class="form-control" placeholder="Keperluan" required>
    </div>

    <div class="form-group">
        <label>Durasi</label>
        <input type="text" name="penanggung_jawab_bayi" class="form-control" placeholder="Durasi" required>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
    </div>

    <div class="form-group">
        <label>Status</label>
            <select name="status" class="form-control" >
                <option value="masuk"> Dipindahkan </option>   
                <option value="checkin"> Perawatan </option>
                <option value="peringatan"> Peringatan </option>
                <option value="checkout"> Check Out </option>
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

</div>
<!-- /.container-fluid -->





<?php
include('includes/scripts.php');
include('includes/footer.php');
?>