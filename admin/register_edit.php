<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!--Bagian atas -->>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Pengguna</h6>
    </div>
<div class="card-body">
<!---Akhir bagian atas---->

<!---Mulai untuk form---->
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

</div>
</div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>