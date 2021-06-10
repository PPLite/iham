<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php');
include_once('database/dbconfig.php'); 
?>

<html>
<body>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Buat Laporan</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="pengaturan-pengguna.php">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pengguna Terdaftar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
              $query = "SELECT id FROM register ORDER BY id";
              $query_run = mysqli_query($connection, $query);

              $row = mysqli_num_rows($query_run);

              echo '<h4>'.$row.'&nbsp Pengguna</h4>';
              ?>
              </div>
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
      </a>
    </div>


    <!-- Kartu 2 -->
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="daftar-barang.php">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Aset Terdaftar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
              $query = "SELECT id FROM tb_rfid ORDER BY id";
              $query_run = mysqli_query($connection, $query);

              $row = mysqli_num_rows($query_run);

              echo '<h4>'.$row.'&nbsp Asset</h4>';
              ?>
              </div>
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
    </a>
    </div>

    <!-- Kartu 3 -->
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="pengaturan-aset-bayi-keterangan.php">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Bayi terdaftar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
              $query = "SELECT id FROM tb_stat_anak ORDER BY id";
              $query_run = mysqli_query($connection, $query);

              $row = mysqli_num_rows($query_run);

              echo '<h4>'.$row.'&nbsp Anak</h4>';
              ?>
              </div>
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
      </a>
    </div>


    <!-- Kartu 4 -->
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="status-asset.php">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Aset Perlu ditangani</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              Cek Status Aset
              
            </div>
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
    </div>
  </a>
  </div>

  <!-- Content Row -->

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
                                </div>
                            </div>
                            </div>
                    </div>

                </div>







<?php
include('includes/scripts.php');
include('includes/footer.php');
?>