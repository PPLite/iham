<div class="container-fluid">

<!---- Untuk tombol "tambah aset"--->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Pengaturan Pasien Dewasa  
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->
    <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT DATE_FORMAT(`timestamp`, '%d/%m/%Y %H:%i') AS timestamp ,rfid_uid, nama_pasien, id_pengenal, usia, jenis_kelamin, tinggi_badan, berat_badan, alamat,id, status FROM tb_pasien_dewasa"; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="tabelpasien" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>RFID UID</th>
            <th>Nama Pasien</th>
            <th>No KTP/SIM</th>
            <th>Usia</th>
            <th>Jenis Kelamin</th>
            <th>Tinggi Badan</th>
            <th>Berat Badan</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Waktu Masuk</th>
            <th>Ubah</th>
            <th>Hapus</th>
          </tr>
        </thead>
        <tbody>
        <?php
        //mengambil data dari database
        //tipe kolom yang nantinya akan diambil
        if(mysqli_num_rows($query_run) > 0 )
        {
          while($row = mysqli_fetch_array($query_run))
          {
            ?>
          <tr>
          <!---Mengambil data dari database kemudian menampilkan ke tabel, serta menentukan kolom mana saja yang akan diambil datanya-->
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['rfid_uid']; ?></td>
            <td><?php echo $row['nama_pasien']; ?></td>
            <td><?php echo $row['id_pengenal']; ?></td>
            <td><?php echo $row['usia']; ?></td>
            <td><?php echo $row['jenis_kelamin']; ?></td>
            <td><?php echo $row['tinggi_badan']; ?></td>
            <td><?php echo $row['berat_badan']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['timestamp']; ?></td>
            <td>
            <!--MODAL UNTUK EDIT/UBAH ASSET (DI TABEL) -->
            <button type="button" class="btn btn-success tomboleditpasien">Ubah</button>
            </td>

            <td>
            <button type="button" class="btn btn-danger tombolhapuspasien">Hapus</button>
            </td>
            </div>

            <div class="container-fluid">
            </td>     

          <?php
          }
        }
        //Jika gagal ngambil data akan mengeluarkan peringatan
        else {
          echo "Data tidak ditemukan";   
        }
        ?>        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->



<!------------------------------FUNGSI UNTUK UBAH ASSET (MODAL)------------------------------------->

<div class="modal fade" id="editmodalpasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit data Asset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

        <input type="hidden" name="id" id="id">

            <div class="form-group">
                <label> RFID UID </label>
                <input type="text" name="rfid_uid" id="rfid_uid" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label>Nama Pasien</label>
                <input type="text" name="nama_pasien" id="nama_pasien" class="form-control"">
            </div>

            <div class="form-group">
                <label>No KTP/SIM</label>
                <input type="text" name="id_pengenal" id="id_pengenal" class="form-control" placeholder="Deskripsi">
            </div>

            <div class="form-group">
                <label>Usia</label>
                <input type="text" name="usia" id="usia" class="form-control" placeholder="Deskripsi">
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" > 
                  <option value="pria"> Pria </option>   
                  <option value="wanita"> Wanita </option>
                </select>
             </div>

            <div class="form-group">
                <label>Tinggi Badan</label>
                <input type="text" name="tinggi_badan" id="tinggi_badan" class="form-control" placeholder="Tinggi Badan">
            </div>

            <div class="form-group">
                <label>Berat Badan</label>
                <input type="text" name="berat_badan" id="berat_badan" class="form-control" placeholder="Berat Badan">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" id="status" > 
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
            <button type="submit" name="updatepasien" class="btn btn-primary">Perbarui</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!------------------------------------------------------------------------------------------------------------------>

<!------------------------------FUNGSI UNTUK HAPUS (MODAL)------------------------------------->

<div class="modal fade" id="deletemodalpasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

        <input type="hidden" name="hapus_id_pasien" id="hapus_id_pasien">

        <h5> Apakah anda yakin untuk menghapus data Pasien ini?</h5>
        <h6>  Data yang sudah terhapus tidak dapat dikembalikan</h6>

      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" name="hapuspasien" class="btn btn-danger">Hapus</button>
        </div>
      </form>

    </div>
  </div>
</div>
