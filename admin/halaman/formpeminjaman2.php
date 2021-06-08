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
                        <label>Nama Alat</label>
                        <input type="text" name="nama_alat" id="nama_alat" class="form-control" placeholder="Pilih aset terlebih dahulu" required>
                    </div>

                    <div class="form-group">
                        <label>Kode Alat</label>
                        <input type="text" name="id" id="id" class="form-control" placeholder="Pilih aset terlebih dahulu" required data-readonly>
                    </div>

                    <div class="form-group">
                        <label>RFID UID</label>
                        <input type="text" name="rfid_uid" id="rfid_uid" class="form-control" placeholder="Pilih aset terlebih dahulu" required data-readonly>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Pilih aset terlebih dahulu" required data-readonly>
                    </div>

                    <div class="form-group">
                        <label>Penanggung Jawab</label>
                        <input type="text" name="penanggung_jawab" id="penanggung_jawab" class="form-control" placeholder="Pilih aset terlebih dahulu" required data-readonly>
                    </div>

                    <div class="form-group">
                        <label>Status Aset Sekarang</label>
                        <input type="text" name="status_asset" id="status_asset" class="form-control" placeholder="Pilih aset terlebih dahulu" required data-readonly>
                    </div>

                    <div class="form-group">
                        <label>Peminjam</label>
                        <input type="text" name="peminjam" id="peminjam" class="form-control" placeholder="Nama Peminjam" required>
                    </div>

                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="Jabatan" id="Jabatan" class="form-control" placeholder="Jabatan Peminjam" required>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Isikan Keterangan" required> 
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
                <button type="reset" value="Reset" class="btn btn-danger">Hapus isi Form</button>
                <button type="POST" name="formpinjam" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


<!-------------------Autocomplete. didalam $.noConflict() Biar gak tawuran------------->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="Stylesheet"></link>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $.noConflict();
            jQuery( document ).ready(function( $ ) {
            // Code that uses jQuery's $ can follow here.
            var ac_config = {
            source: "halaman/ajaxBarang.php",
            select: function(event, ui){
            $("#nama_alat").val(ui.item.nama_alat);
            $("#id").val(ui.item.id);
            $("#rfid_uid").val(ui.item.rfid_uid);
            $("#deskripsi").val(ui.item.deskripsi);
            $("#penanggung_jawab").val(ui.item.penanggung_jawab);
            $("#status_asset").val(ui.item.status_asset);
            $("#keterangan").val(ui.item.keterangan);
            $("#peminjam").val(ui.item.peminjam);
            },
            minLength:1,
            mustMatch:true
            
            };
            $("#nama_alat").autocomplete(ac_config);
            });
            
            // Code that uses other library's $ can follow here.
            </script>
            