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

                <!--Mulai kode php--->
                <?php

                //Menampilkan status jika login berhasil atau salah
                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                    }
                ?>
                <!--Akhir dari kode php-->
              </div>

              <!---Mulai untuk login-->
                <form class="user" action="logincode.php" method="POST">

                    <div class="form-group">
                    <!--- Form untuk memasukkan email dan password ---->
                    <!--- Baris kedua berfungsi untuk custom error ketika user salah memasukkan email/password---->
                    <input type="email" name=email class="form-control form-control-user" placeholder="Masukkan Email Anda"
                      oninvalid="this.setCustomValidity('Masukkan Email yang telah terdaftar')"
                      oninput="this.setCustomValidity('Masukkan alamat email yang sesuai ____@__.com')"/>

                    </div>
                    <div class="form-group">
                    <input type="password" name="passwordd" class="form-control form-control-user" placeholder="Password"
                      oninvalid="this.setCustomValidity('Password anda Salah')"
                      oninput="this.setCustomValidity('Masukkan password yang sesuai')"/>

                    </div>
            
                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
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