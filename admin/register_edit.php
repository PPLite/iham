<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!--Bagian atas -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Pengguna</h6>
    </div>
<div class="card-body">
<!---Akhir bagian atas---->


<?php
//inisialisasi sambungan ke database
$connection = mysqli_connect("localhost","mjdr3247_admin","semogacepatlulus2021","mjdr3247_adminpanel");
//Ngambil data dari database----->
// Pakai kodingan PHP----->
if (isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    $query = "SELECT * FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
    {
?>
        
<!---Form untuk editing pengguna---->
<!---Mengambil data spesifik dari database---->
    <div class="form-group">
        <label> Nama Pengguna </label>
        <input type="text" name="username" value="<?php echo $row['username']?>" class="form-control" placeholder="Enter Username">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $row['email']?>" class="form-control" placeholder="Enter Email">
    </div>
    <div class="form-group">
        <label>Kata Sandi</label>
        <input type="password" name="password" value="<?php echo $row['password']?>" class="form-control" placeholder="Enter Password">
    </div>

<!---Tombol untuk hapus dan simpan perubahan editing pengguna-->
<a href="register.php" class="btn btn-danger"> Batalkan</a>
<button class="btn btn-primary"> Perbarui </button>

  </div>
  </div>
</div>


<?php 
    }
}
?>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>