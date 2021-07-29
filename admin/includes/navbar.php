<?php
include_once('code.php');
?>


   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class=""></i>
  </div>
  <div class="sidebar-brand-text mx-3">IHAM Dashboard</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Main Menu
</div>

<!-- Item  -->
<li class="nav-item">
  <a class="nav-link" href="registrasi.php">
    <i class="fas fa-portrait"></i>
    <span>Registrasi</span></a>
</li>

<!-- Pasien-->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sidebarbayi" aria-expanded="true" aria-controls="kolapsitem1">
    <i class="fas fa-baby-carriage"></i>
    <span>Pasien Bayi</span>
  </a>
  <div id="sidebarbayi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub-menu:</h6>
      
      <a class="collapse-item" href="daftar-bayi.php">Daftar Pasien Bayi</a>
      <a class="collapse-item" href="log-data-bayi.php">Log Data Pasien</a>
      <a class="collapse-item" href="formulir-bayi.php">Pindah Ruang</a>
      <a class="collapse-item" href="konfirmasi-pindah-ruang.php">Konfirmasi Pindah Ruang</a>
      <a class="collapse-item" href="pengaturan-aset-bayi.php">Pengaturan Data Pasien</a>
    </div>
  </div>
</li>


<!-- Pasien-->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sidebardewasa" aria-expanded="true" aria-controls="kolapsitem1">
    <i class="fas fa-procedures"></i>
    <span>Pasien Dewasa</span>
  </a>
  <div id="sidebardewasa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub-menu:</h6>
      
      <a class="collapse-item" href="daftar-pasien.php">Daftar Pasien Dewasa</a>
      <a class="collapse-item" href="#">Log Data Pasien</a>
      <a class="collapse-item" href="#">Pindah Ruang</a>
      <a class="collapse-item" href="#">Konfirmasi Pindah Ruang</a>
      <a class="collapse-item" href="pengaturan-pasien.php">Pengaturan Data Pasien</a>
    </div>
  </div>
</li>




<!-- Peralatan Medis-->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sidebarmedis" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-briefcase-medical"></i>
    <span>Peralatan Medis</span>
  </a>
  <div id="sidebarmedis" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub-menu:</h6>
      <a class="collapse-item" href="daftar-barang.php">Daftar Barang</a>
      <a class="collapse-item" href="formulir.php">Form Peminjaman Barang</a>
      <a class="collapse-item" href="validasi-peminjaman-aset.php">Konfirmasi Peminjaman </a>
      <a class="collapse-item" href="log-data-aset.php">Log Data Barang</a>
      <a class="collapse-item" href="pengaturan-aset-barang.php">Pengaturan Data Barang</a>
    </div>
  </div>
</li>

<!-- Dokter-->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sidebardokter" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-user-md"></i>
    <span>Dokter</span>
  </a>
  <div id="sidebardokter" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub-menu:</h6>
      <a class="collapse-item" href="daftar-dokter.php">Daftar Dokter</a>
      <a class="collapse-item" href="log-data-dokter.php">Log Data Dokter</a>
      <a class="collapse-item" href="pengaturan-dokter.php">Pengaturan Data Dokter</a>
      
    </div>
  </div>
</li>

<!-- perawat-->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sidebarperawat" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-user-nurse"></i>
    <span>Perawat</span>
  </a>
  <div id="sidebarperawat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub-menu:</h6>
      <a class="collapse-item" href="daftar-perawat.php">Daftar Perawat</a>
      <a class="collapse-item" href="log-data-perawat.php">Log Data Perawat</a>
      <a class="collapse-item" href="pengaturan-perawat.php">Pengaturan Data Perawat</a>
    </div>
  </div>
</li>

<!-- Karyawan?-->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sidebarkaryawan" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-user fa"></i>
    <span>Karyawan</span>
  </a>
  <div id="sidebarkaryawan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub-menu:</h6>
      <a class="collapse-item" href="daftar-karyawan.php">Daftar Karyawan</a>
      <a class="collapse-item" href="log-data-karyawan.php">Log Data Karyawan</a>
      <a class="collapse-item" href="pengaturan-karyawan.php">Pengaturan Data Karyawan</a>
    </div>
  </div>
</li>


<!-- Pengadaan barang?-->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sidebarpengadaan" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-boxes"></i>
    <span>Pengadaan Barang</span>
  </a>
  <div id="sidebarpengadaan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub-menu:</h6>
      <a class="collapse-item" href="pengadaan-kriteria.php">Kriteria Pengadaan</a>
      <a class="collapse-item" href="pengadaan-peserta.php">Peserta Pengadaan</a>
      <a class="collapse-item" href="pengadaan-ranking.php">Penilaian Peserta</a>
      <a class="collapse-item" href="pengadaan-hasil.php">Hasil Perhitungann</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" href="pengaturan-pengguna.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Pengaturan Pengguna</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="pesan-ruang.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Pesan Kamar</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Pengaturan Asset RFID
</div>

<li class="nav-item">
  <a class="nav-link" href="baca-tag.php">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Pencarian Asset</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="status-asset.php">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Patient Monitoring</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">

<!-------- Mengambil Data Dokter yang terdaftar ----------------->
<div class="topbar-divider d-none d-sm-block"></div>

<div class="container my-auto">
<div class="copyright text-center my-auto">
<a href="daftar-dokter.php"  style="text-decoration:none;" class="text-secondary">
 Dokter         
  <?php
              $query = "SELECT id FROM tb_dokter ORDER BY id";
              $query_run = mysqli_query($connection, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h5 class="text-dark">'.$row.'</h5>';
              ?>
</a>
</div>
</div>
<!-------- Mengambil Data Perawat yang terdaftar ----------------->
<div class="topbar-divider d-none d-sm-block"></div>

<div class="container my-auto">
<div class="copyright text-center my-auto">
<a href="daftar-perawat.php"  style="text-decoration:none;" class="text-secondary">
 Perawat         
  <?php
              $query = "SELECT id FROM tb_perawat ORDER BY id";
              $query_run = mysqli_query($connection, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h5 class="text-warning">'.$row.'</h5>';
              ?>
</a>
</div>
</div>
<!-------- Mengambil Data Staff yang terdaftar ----------------->
<div class="topbar-divider d-none d-sm-block"></div>

<div class="container my-auto">
<div class="copyright text-center my-auto">
<a href="daftar-karyawan.php"  style="text-decoration:none;" class="text-secondary">
 Staff         
  <?php
              $query = "SELECT id FROM tb_non_medis ORDER BY id";
              $query_run = mysqli_query($connection, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h5 class="text-primary">'.$row.'</h5>';
              ?>
</a>
</div>
</div>

<!-------- Mengambil Data Pasien yang terdaftar ----------------->
<div class="topbar-divider d-none d-sm-block"></div>

<div class="container my-auto">
<div class="copyright text-center my-auto">
<a href="daftar-pasien.php"  style="text-decoration:none;" class="text-secondary">
  Pasien            
  <?php
              $query = "SELECT id FROM tb_pasien_dewasa ORDER BY id";
              $query_run = mysqli_query($connection, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h5 class="text-danger">'.$row.'</h5>';
              ?>
</a>
</div>
</div>

<!-------- Mengambil Data Bayi yang terdaftar ----------------->
<div class="topbar-divider d-none d-sm-block"></div>

<div class="container my-auto">
<div class="copyright text-center my-auto">

<a href="daftar-bayi.php"  style="text-decoration:none;" class="text-secondary">
Bayi           
              <?php
              $query = "SELECT id FROM tb_stat_anak ORDER BY id";
              $query_run = mysqli_query($connection, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h5 class="text-success">'.$row.'</h5>';
              ?>
</a>
</div>
</div>

<div class="topbar-divider d-none d-sm-block"></div>


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">

              <!--- Untuk menampilkan pengguna yang sedang aktif saat itu--->
              <?php
               echo $_SESSION['username']; 
              ?> 
              
                </span>
                <img class="img-profile rounded-circle" src="">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Pengaturan
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Log Aktivitas
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Akhiri Sesi</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pastikan semua data telah tersimpan, Tekan "Keluar" untuk mengakhiri sesi ini</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>

          <form action="logout.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Keluar</button>

          </form>


        </div>
      </div>
    </div>
  </div>