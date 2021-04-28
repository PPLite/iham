<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
?>

<!----Mulai Modal buat pengguna baru. kotak yang ngawang ditengah-->
<!----Diambil dari https://getbootstrap.com/docs/4.0/components/modal/-->

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
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <label>Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="Kata Sandi">
            </div>
            <div class="form-group">
                <label>Ulangi Kata sandi</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Ulangi Kata Sandi">
            </div>

            <input type="hidden" name="usertype" value="admin">
        
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
<!------Akhir dari Modal------->


<!---- Untuk tombol "tambah admin"--->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Profil Admin 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Tambahkan data Pengguna 
            </button>
    </h6>
  </div>

<div class="card-body">
  <!----Untuk nambahin status----->
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

    <div class="table-responsive">

<!---Buat ngambil data--->
    <?php
    //Nyambungin dulu ke database, untuk ngambil data username dan password
    $connection = mysqli_connect("localhost","mjdr3247_admin","semogacepatlulus2021","mjdr3247_adminpanel");
    //dari database, dipilih semua (bintang = semuanya) dari tabel "register"
    $query = "SELECT * FROM register"; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
            
            <!--Tombol buat edit pengguna-->
            <!--Kodingan full dialihkan ke register_edit.php-->
            <!-- Pada input type="hidden". dibuat hidden untuk menyembunyikan target yang akan diedit/ diambil datanya-->
            <!-- Jika ingin ditampilkan data yang akan diambil untuk diubah, "hidden" dapat diganti dengan "text"-->

            <td>
                  <form action="register_edit.php" method="post">
                      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="edit_btn" class="btn btn-success">Ubah</button>
                  </form>
            </td>

            <!----Menu buat hapus data pengguna--->
            <!--Kodingan full dialihkan ke register_edit.php-->
            <td>
            <form action="code.php" method="post">
              
              <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">

              <button type="submit" name="delete_btn" class="btn btn-danger">Hapus</button>
              </form>
            </td>

            </tr>
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