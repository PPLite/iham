<?php
session_start();
include('includes/header.php'); 
?>

<!----Mulai <body> buat background---->
<body class="bg-gradient-primary">

<!---Mulai container buat kotakan login--->
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">
<!----bayangan kotak login--->
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
              <!--Bagian Judul----->
                <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                <h4 class="h4 text-gray-900 mb-4">Silahkan Masukkan Email dan Password Anda</h4>

                <!--Mulai kode php--->
                <?php

                //Menampilkan status jika login berhasil atau salah
                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<h2 class="bg-info"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                    }
                ?>
                <!--Akhir dari kode php-->
              </div>

              <!---Mulai untuk login-->
                <form class="user" action="code.php" method="POST">

                    <!--- Form untuk memasukkan email dan password ---->
                    <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Masukkan Email Anda">
                    </div>
                       
                    <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                    </div>
                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Masuk </button>
                    <hr>
                </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
</body>

<?php
include('includes/scripts.php'); 
?>