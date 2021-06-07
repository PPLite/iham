<!--------------------------------HEADER DAN TOMBOL UNTUK TAMBAH ADMIN------------------------------------------->
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Halaman Pengguna Terdaftar
    </h6>
  </div>

  <div class="card-header py-4">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Tambahkan Pengguna Baru
            </button>
  </div>
  <!---------------------------------------------------------------------------------------------------------->

<!------------------------------FUNGSI UNTUK TAMBAH PENGGUNA BARU (MODAL)------------------------------------->

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Nama Pengguna </label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan Nama">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control check_email" placeholder="Masukkan Email">
                <small class="error_email" style="color:red;"></small>
            </div>
            <div class="form-group">
                <label>Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="Kata Sandi">
            </div>
            <div class="form-group">
                <label>Ulangi Kata sandi</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Ulangi Kata Sandi">
            </div>
            <div class="form-group">
                <label>Hak Akses</label>
                <select name="usertype" class="form-control" > 
                <option value="admin"> Admin </option>
                  <option value="engginer"> Engginer </option>
                  <option value="operator"> Operator </option>
                  <option value="manajer-aset"> Manajer Asset </option>
                </select>
             </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Simpan</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">




<div class="container-fluid">
<div class="card-body">
<div class="table-responsive">

    <?php
    $query = "SELECT * FROM register"; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="tabelpengguna" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Hak Akses</th>
            <th>Ubah</th>
            <th>Hapus</th>
          </tr>
        </thead>
        <tbody>
        <?php
        //mengambil data dari database
        //tipe kolom yang nantinya akan diambil
        if(mysqli_num_rows($query_run) >0 )
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
          <tr>
          <!---Mengambil data dari database kemudian menampilkan ke tabel, serta menentukan kolom mana saja yang akan diambil datanya-->
          <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['usertype']; ?></td>
          <!----------------------------------------------------------------------------------------------------------------->

           <!------------------------------------TOMBOL UNTUK UBAH DATA PENGGUNA----------------------------->
            <td>
                      <button type="button" class="btn btn-success editbtn">Ubah</button>
            </td>
          <!----------------------------------------------------------------------------------------------->
          <!------------------------------------TOMBOL UNTUK HAPUS DATA PENGGUNA----------------------------->
            <td>
                <button type="submit" name="delete_btn" class="btn btn-danger deletebtn">Hapus</button>
            </td>
            <!----------------------------------------------------------------------------------------------->
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

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <label> Nama Pengguna </label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Nama">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <label>Kata Sandi</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Kata Sandi">
            </div>
            <div class="form-group">
                <label>Hak Akses</label>
                <select name="usertype" class="form-control" id="usertype" > 
                  <option value="admin"> Admin </option>
                  <option value="engginer"> Engginer </option>
                  <option value="operator"> Operator </option>
                  <option value="manajer-aset"> Manajer Asset </option>
                </select>
             </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" name="updatepengguna" class="btn btn-primary">Perbarui</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<!------------------------------------------------------------------------------------------------------------------>

<!------------------------------FUNGSI UNTUK HAPUS (MODAL)------------------------------------->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

        <input type="hidden" name="hapus_id" id="hapus_id">

        <h5> Apakah anda yakin untuk menghapus Pengguna ini?</h5>
        <h6>  Data yang sudah terhapus tidak dapat dikembalikan</h6>

      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" name="deletepengguna" class="btn btn-danger">Hapus</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
