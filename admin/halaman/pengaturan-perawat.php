<div class="container-fluid">
<!------Akhir dari Modal------->

<!---- Kotak Di Atas buat judul--->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel Karyawan Terdaftar
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->
    <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT * FROM tb_perawat"; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="tabelperawat" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>RFID UID</th>
            <th>Nama Perawat</th>
            <th>ID Perawat</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Status</th>
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
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
          <tr>
          <!---Mengambil data dari database kemudian menampilkan ke tabel, serta menentukan kolom mana saja yang akan diambil datanya-->
          <td><?php echo $row['id']; ?></td> <!--- 0 --->
            <td><?php echo $row['rfid_uid']; ?></td>  <!--- 1 --->
            <td><?php echo $row['nama_perawat']; ?></td> <!--- 2 --->
            <td><?php echo $row['id_perawat']; ?></td> <!--- 3 --->
            <td><?php echo $row['jenis_kelamin']; ?></td> <!--- 4 --->
            <td><?php echo $row['alamat']; ?></td> <!--- 5 --->
            <td><?php echo $row['status']; ?></td> <!--- 6 --->

            <td>
            <!--MODAL UNTUK EDIT/UBAH ASSET (DI TABEL) -->
            <button type="button" class="btn btn-success tomboleditperawat">Ubah</button>
            </td>

            <td>
            <button type="button" class="btn btn-danger tombolhapusperawat">Hapus</button>
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

<!------------------------------FUNGSI UNTUK UBAH ASSET (MODAL)------------------------------------->

<div class="modal fade" id="editmodalperawat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <label>Nama Perawat</label>
                <input type="text" name="nama_perawat" id="nama_perawat" class="form-control"">
            </div>

            <div class="form-group">
                <label>ID Perawat</label>
                <input type="text" name="id_perawat" id="id_perawat" class="form-control" placeholder="Deskripsi">
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" > 
                  <option value="pria"> Pria </option>   
                  <option value="wanita"> Wanita </option>
                </select>
             </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="peminjam">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" id="status" > 
                  <option value="masuk"> Masuk </option>
                  <option value="Pulang"> Pulang </option>   
                  <option value="izin"> Izin </option>
                  <option value="keluar"> Keluar </option>
                </select>
             </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" name="updateperawat" class="btn btn-primary">Perbarui</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!------------------------------------------------------------------------------------------------------------------>

<!------------------------------FUNGSI UNTUK HAPUS (MODAL)------------------------------------->

<div class="modal fade" id="deletemodalperawat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Perawat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

        <input type="hidden" name="hapus_id_perawat" id="hapus_id_perawat">

        <h5> Apakah anda yakin untuk menghapus data perawat ini?</h5>
        <h6>  Data yang sudah terhapus tidak dapat dikembalikan</h6>

      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" name="hapusperawat" class="btn btn-danger">Hapus</button>
        </div>
      </form>

    </div>
  </div>
</div>
