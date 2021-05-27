<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php')
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- 404 Error Text -->
          <div class="text-center">
            <div class="error mx-auto" data-text="403">403</div>
            <p class="lead text-gray-800 mb-5">Anda Tidak Berhak untuk Mengakses Halaman Ini</p>
            <p class="text-gray-500 mb-0">Jika Terdapat Kesalahan. Mohon Kontak tim Admin Rumah Sakit</p>
            <a href="index.php">&larr; Kembali ke Halaman Awal</a>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
