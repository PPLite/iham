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
 
            <div class="form-group">
                <label>Peminjam</label>
                <input type="text" name="peminjam" class="form-control">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status_asset" class="form-control" >
                  <option value="Tersedia"> Tersedia </option>   
                  <option value="Dipinjam"> Dipinjam </option>
                  <option value="Habis"> Habis </option>
                  <option value="Rusak"> Rusak </option>
                  <option value="Peringatan"> Peringatan </option>
                  <option value="Validasi"> Validasi </option>
                </select>
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
            <th>Nama Alat</th>
            <th>RFID UID</th>
            <th>Deskripsi Alat</th>
            <th>Ditambahkan Pada</th>
            <th>Penanggung Jawab</th>
            <th>Peminjam</th>
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
            <td><?php echo $row['nama_alat']; ?></td>  <!--- 1 --->
            <td><?php echo $row['uid']; ?></td> <!--- 2 --->
            <td><?php echo $row['deskripsi']; ?></td> <!--- 3 --->
            <td><?php echo $row['tanggal']; ?></td> <!--- 4 --->
            <td><?php echo $row['penanggung_jawab']; ?></td> <!--- 5 --->
            <td><?php echo $row['peminjam']; ?></td> <!--- 6 --->
            <td><?php echo $row['status_asset']; ?></td>  <!--- 7 --->

            <td>
            <!--MODAL UNTUK EDIT/UBAH ASSET (DI TABEL) -->
            <button type="button" class="btn btn-success editbtnasset">Ubah</button>
            </td>

            <td>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusaset_btn"> Hapus </button>
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

<!------------------------------FUNGSI UNTUK UBAH PENGGUNA (MODAL)------------------------------------->

<div class="modal fade" id="editmodalasset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

        <input type="hidden" name="id" id="id">

            <div class="form-group">
                <label> Nama Asset </label>
                <input type="text" name="nama_alat" id="nama_alat" class="form-control" placeholder="Masukkan Nama">
            </div>

            <div class="form-group">
                <label>Kode UID</label>
                <input type="text" name="uid" id="uid" class="form-control" placeholder="Kode UID">
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi">
            </div>

            <div class="form-group">
                <label>Penanggung Jawab</label>
                <input type="text" name="penanggung_jawab" id="penanggung_jawab" class="form-control" placeholder="Penanggung Jawab">
            </div>

            <div class="form-group">
                <label>Peminjam</label>
                <input type="text" name="peminjam" id="peminjam" class="form-control" placeholder="peminjam">
            </div>

            <div class="form-group">
                <label>Status Asset</label>
                <select name="status_asset" class="form-control" id="status_asset" > 
                  <option value="Tersedia"> Tersedia </option>   
                  <option value="Dipinjam"> Dipinjam </option>
                  <option value="Habis"> Habis </option>
                  <option value="Rusak"> Rusak </option>
                  <option value="Peringatan"> Peringatan </option>
                  <option value="Validasi"> Validasi </option>
                </select>
             </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" name="updateasset" class="btn btn-primary">Perbarui</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<!------------------------------------------------------------------------------------------------------------------>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>