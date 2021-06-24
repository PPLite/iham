<form method="POST">
 <select name="nama_ibu" id="nama_ibu">
  <option disabled selected> Pilih </option>
 <?php 
  $sql=mysql_query("SELECT * FROM tb_stat_anak");
  while ($data=mysql_fetch_array($sql)) {
 ?>
   <option value="<?=$data['nama_ibu']?>"><?=$data['nama_ibu']?></option> 
 <?php
  }
 ?>
</select>
  <input type="submit" name="simpan" value="Simpan">
</form>
<?php
 if (isset($_POST['simpan'])) {
  echo "<br>Data yang dipilih:<br>";
  echo $_POST['nama_ibu'];
 }
?>
</body>
</html>


<div class="container-fluid">

<!---- Untuk tombol "tambah aset"--->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Pindah Bayi
    </h6>
  </div>

                <div class="card-body">

                    <div class="table-responsive">
                    <form action="code.php" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Anak</label>
                        <input type="text" name="nama_anak" id="nama_anak" class="form-control" placeholder="Pilih aset terlebih dahulu" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Ibu</label>
                        <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" placeholder="Masukkan Nama Ibu" required>
                    </div>

                    <div class="form-group">
                        <label>No KTP/SIM </label>
                        <input type="text" readonly name="id" id="id" class="form-control" placeholder="Pilih aset terlebih dahulu" readonly>
                    </div>

                    <div class="form-group">
                        <label>RFID UID</label>
                        <input type="text" readonly name="rfid_uid" id="rfid_uid" class="form-control" placeholder="Pilih aset terlebih dahulu" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" required>
                    </div>

                    <div class="form-group">
                        <label>Penanggung Jawab</label>
                        <input type="text" readonly name="penanggung_jawab" id="penanggung_jawab" class="form-control" placeholder="Pilih aset terlebih dahulu" required>
                    </div>

                    <div class="form-group">
                        <label>Status Bayi</label>
                        <input type="text" readonly name="status_asset" id="status_asset" class="form-control" placeholder="Pilih aset terlebih dahulu" required>
                    </div>

                    <div class="form-group">
                        <label>Dipindahkan Ke</label>
                        <input type="text" name="tujuan" id="tujuan" class="form-control" placeholder="Nama Peminjam" required>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Isikan Keterangan" required>
                    </div>

                    <div class="form-group">
                                <label>Status</label>
                                <select name="status_asset" class="form-control" id="status_asset" >   
                                <option value="konfirmasi_pinjam"> Dipinjam </option>
                                <option value="konfirmasi_pindah"> Dipindah </option>
                                </select>
                        </div>
                    </div>
                <div class="modal-footer">
                <button type="reset" value="Reset" class="btn btn-danger">Hapus isi Form</button>
                <button type="POST" name="formpinjam" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->