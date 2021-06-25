<div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Daftar barang akan dipinjam / dipindah
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">


<!---Buat ngambil data--->
<?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"    
    $query = "SELECT * FROM tb_rfid WHERE `status_asset` = 'konfirmasi_pinjam' OR `status_asset` = 'konfirmasi_pindah'";
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="validasiaset" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID Barang</th>
            <th>RFID UID</th>
            <th>Nama Alat</th>
            <th>Deskripsi</th>
            <th>Penanggung Jawab</th>
            <th>Status Asset</th>
            <th>Peminjam</th>
            <th>Keterangan</th>
            <th>Terima</th>
            <th>Tolak</th>

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
            <td><?php echo $row['id']; ?></td> 
            <td><?php echo $row['rfid_uid']; ?></td> 
            <td><?php echo $row['nama_alat']; ?></td> 
            <td><?php echo $row['deskripsi']; ?></td> 
            <td><?php echo $row['penanggung_jawab']; ?></td>  
            <td><?php echo $row['status_asset']; ?></td>
            <td><?php echo $row['peminjam']; ?></td>
            <td><?php echo $row['keterangan']; ?></td>
            <td>
            <!--MODAL UNTUK EDIT/UBAH ASSET (DI TABEL) -->
            <button type="button" class="btn btn-success editbtnasset">Terima</button>
            </td>

            <td>
            <button type="button" class="btn btn-danger tolakvalidasiaset">Tolak</button>
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

<!------------------------------FUNGSI UNTUK HAPUS (MODAL)------------------------------------->

<div class="modal fade" id="tolakvalidasiasetmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tolak Validasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

        <input type="hidden" name="tolak_aset" id="tolak_aset">

            <input type="hidden" name="id" id="id">
            <input type="hidden" name="rfid_uid" id="rfid_uid">
            <input type="hidden" name="nama_alat" id="nama_alat">
            <input type="hidden" name="deskripsi" id="deskripsi">
            <input type="hidden" name="penanggung_jawab" id="penanggung_jawab">
            <input type="hidden" name="status_asset" value="tersedia" id="status_asset">
            <input type="hidden" name="peminjam" value=" " id="peminjam">
            <input type="hidden" name="keterangan" value=" " id="keterangan">

        <h5> Apakah anda yakin untuk Menolak Peminjaman/Pemindahan Asset ini?</h5>

      </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
            <button type="submit" name="tolak_aset" class="btn btn-danger">Tolak</button>
        </div>
      </form>

    </div>
  </div>
</div>