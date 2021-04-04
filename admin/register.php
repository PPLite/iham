<?php
session_start();
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
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Ulangi Kata sandi</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
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
  <!----Untuk nambahin status---->
  <?php
  //Status berhasil ditambahkan
  if(isset($_SESSION['sukses']) && $_SESSION['sukses'!=''])
  {
    echo '<h2>'.$_SESSION['sukses'].' </h2>';
    unset($_SESSION['sukses']);
  }
    //Status gagal ditambahkan
    if(isset($_SESSION['perhatian']) && $_SESSION['perhatian'!=''])
    {
      echo '<h2 class="bg-info">'.$_SESSION['perhatian'].' </h2>';
      unset($_SESSION['perhatian']);
    }

  ?>
    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     
          <tr>
            <td> 1 </td>
            <td>MojoNetworks</td>
            <td> admin@mjdb.my.id</td>
            <td> *** </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
        
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
