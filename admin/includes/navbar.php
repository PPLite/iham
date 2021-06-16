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
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Registrasi</span></a>
</li>

<!-- Pasien-->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kolapsitem1" aria-expanded="true" aria-controls="kolapsitem1">
    <i class="fas fa-fw fa-cog"></i>
    <span>Pasien Bayi</span>
  </a>
  <div id="kolapsitem1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
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
<!-- Peralatan Medis-->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Peralatan Medis</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
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

          
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>

              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
<!-------- Mengambil Data Pasien yang terdaftar ----------------->
<div class="topbar-divider d-none d-sm-block"></div>

<div class="container my-auto">
<div class="copyright text-center my-auto">
  Jumlah Bayi               
  <?php
              $query = "SELECT id FROM tb_stat_anak ORDER BY id";
              $query_run = mysqli_query($connection, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h6>'.$row.'</h6>';
              ?>
              </div>
</div>

<!-------- Mengambil Data dokter yang terdaftar ----------------->
<div class="topbar-divider d-none d-sm-block"></div>

<div class="container my-auto">
<div class="copyright text-center my-auto">
  Jumlah Pasien               
              <?php
              $query = "SELECT id FROM register ORDER BY id";
              $query_run = mysqli_query($connection, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h7>'.$row.'</h7>';
              ?>
</div>



</div>
<!-------- Mengambil kelas pengguna dari database ----------------->

<!-------- Mengambil kelas pengguna dari database ----------------->
            <div class="topbar-divider d-none d-sm-block"></div>

          <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span span class="mr-2 d-none d-lg-inline text-gray-600 small">
            Anda terdaftar sebagai <?php echo $_SESSION['usertype']; ?>
            </span>
          </div>
        </div>
            <div class="topbar-divider d-none d-sm-block"></div>
<!-------- Mengambil kelas pengguna dari database ----------------->

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">

              <!--- Untuk menampilkan pengguna yang sedang aktif saat itu--->
              <?php
               echo $_SESSION['username']; 
              ?> 
              
                </span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
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