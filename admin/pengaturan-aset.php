<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php')
?>

<!----Mulai Modal buat tambah aset baru. kotak yang ngawang ditengah-->
<!----Diambil dari https://getbootstrap.com/docs/4.0/components/modal/-->

<div class="modal fade" id="tambahinaset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <label> Nama Aset </label>
                <input type="text" name="nama_alat" class="form-control" placeholder="Masukkan Nama" required>
            </div>

            <div class="form-group">
                <label>Kode UID</label>
                <input type="text" name="uid" class="form-control" placeholder="Masukkan kode UID" required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi alat" required>
            </div>

            <div class="form-group">
                <label>Penanggung Jawab</label>
                <input type="text" name="penanggung_jawab" class="form-control" placeholder="Petugas yang bertanggungjawab" required>
            </div>
 
            <input type="hidden" name="status_asset" value="tersedia" >

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar_asset" id="gambar_asset" class="form-control">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" name="daftaraset_btn" class="btn btn-primary">Simpan</button>
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
    <h6 class="m-0 font-weight-bold text-primary">Menu Pengelolaan Aset
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahinaset">
              Tambahkan data Asset 
            </button>
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->
    <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT * FROM tb_rfid"; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>RFID UID</th>
            <th>Nama Alat</th>
            <th>Deskripsi Alat</th>
            <th>Ditambahkan Pada</th>
            <th>Penanggung Jawab</th>
            <th>Status</th>
            <th>Gambar</th>
            <th>Ubah</th>
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
            <td><?php echo $row['uid']; ?></td>
            <td><?php echo $row['nama_alat']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td><?php echo $row['tanggal']; ?></td>
            <td><?php echo $row['penanggung_jawab']; ?></td>
            <td><?php echo $row['status_asset']; ?></td>
            <td><?php echo $row['gambar_asset']; ?></td>

            <td>
            <!--MODAL UNTUK EDIT/UBAH ASSET (DI TABEL) -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editdataasset"> Ubah </button>
              </h6>
            </div>

            <!----Mulai Modal buat tambah aset baru. kotak yang ngawang ditengah-->
            <!----Diambil dari https://getbootstrap.com/docs/4.0/components/modal/-->

            <div class="modal fade" id="editdataasset" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Asset</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="code.php" method="POST">

                    <div class="modal-body">
            
                        <div class="form-group">
                            <label> Nama Aset </label>
                            <input type="text" name="nama_alat" class="form-control" placeholder="Masukkan Nama" required>
                        </div>

                        <div class="form-group">
                            <label>Kode UID</label>
                            <input type="text" name="uid" class="form-control" placeholder="Masukkan kode UID" required>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi alat" required>
                        </div>

                        <div class="form-group">
                            <label>Penanggung Jawab</label>
                            <input type="text" name="penanggung_jawab" class="form-control" placeholder="Petugas yang bertanggungjawab" required>
                        </div>
            
                        <input type="hidden" name="status_asset" value="tersedia" >

                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="gambar_asset" id="gambar_asset" class="form-control">
                        </div>                    
                    </div>
                    <!----FOOTER MODAL BUTTON---->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="daftaraset_btn" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusaset_btn"> Hapus </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="container-fluid">
            </tr>
                    <!----FOOTER MODAL BUTTON---->


                  <!----MODAL HAPUS---->
                  </div>
            <div class="modal fade" id="hapusaset_btn" tabindex="2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus data Asset</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">Apakah anda yakin untuk menghapus pengguna ini?</div>

            <div class="modal-body">
              <div class="form-group">
                </div>
                  <form action="code.php" method="POST">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger">Hapus</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
                   <!----MODAL HAPUS---->
                    
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