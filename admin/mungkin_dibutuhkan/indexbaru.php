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

      </div>
    </div>

