<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<form action="code.php" method="POST">

<div class="modal-body">

        <div class="form-group">
        <label>Kode UID</label>
        <input type="text" name="rfid_uid" class="form-control" placeholder="Masukkan kode UID" disabled required>
        </div>
        <button type="button" name="ambildata_btn" class="btn btn-secondary" >AmbilData</button>      

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

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>