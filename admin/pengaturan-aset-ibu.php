<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php')
?>

<!----Mulai Modal buat tambah aset baru. kotak yang ngawang ditengah-->
<!----Diambil dari https://getbootstrap.com/docs/4.0/components/modal/-->

<div class="modal fade" id="tambahinasetanak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Asset Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">
                <div class="form-group">
                <label>Kode UID</label>
                <input type="text" name="rfid_uid" class="form-control" placeholder="Masukkan kode UID" required>

                <button type="button" class="btn btn-success" data-target="#"> Ambil dari RFID Scanner </button>
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" name="daftarasetanak_btn" class="btn btn-primary">Simpan</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<!------Akhir dari Modal------->

<?php
  //Status berhasil ditambahkan
    if(isset($_SESSION['success']) && $_SESSION['success'] !='')
    {
      echo '<h2>'.$_SESSION['success'].' </h2>';
      unset($_SESSION['success']);
    }

    //Status gagal ditambahkan
    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
      echo '<h2>'.$_SESSION['status'].' </h2>';
      unset($_SESSION['status']);
    }
  ?>




<!---- Untuk tombol "tambah aset"--->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Menu Pengelolaan Aset Anak
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahinasetanak">
              Tambahkan data Asset 
            </button>
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->
    <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT * FROM tb_stat_anak"; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>RFID UID</th>
            <th>ID Pengenal</th>
            <th>Nama Anak</th>
            <th>Nama Ibu</th>
            <th>Penanggung Jawab</th>
            <th>Alamat</th>
            <th>Waktu Masuk</th>
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
          <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['rfid_uid']; ?></td>
            <td><?php echo $row['id_pengenal']; ?></td>
            <td><?php echo $row['nama_anak']; ?></td>
            <td><?php echo $row['nama_ibu']; ?></td>
            <td><?php echo $row['penanggung_jawab']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['waktu_masuk']; ?></td>
            <td><?php echo $row['status']; ?></td>

            <!--------------------TOMBOL UNTUK EDIT/HAPUS ASSET (DI DALAM TABEL) ----------------->
            <td>
                  <form action="pengaturan-aset-ibu_edit.php" method="post">
                      <input type="hidden" name="edit_id_bayi" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="edit_btn_bayi" class="btn btn-success">Ubah</button>
                  </form>
            </td>

            
            
            
            <td>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusaset_btn"> Hapus </button>
            </td>
            </div>
            <!------------------------------------------------------------------------------------->
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
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>