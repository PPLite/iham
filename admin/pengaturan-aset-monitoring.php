<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php');
?>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"> Menu Pengelolaan Database</h6>
        <div class="card-body">
          <form action="code.php" method="post">
            <button type="submit" name="hapushasilscan1" class="btn btn-danger">
              Hapus Semua Data Scan Reader 1 
            </button>
      
            <button type="submit" name="hapushasilscan2" class="btn btn-danger">
              Hapus Semua Data Scan Reader 2
            </button>

            <!-- <button type="submit" name="" class="btn btn-primary">
              Tambah Data Reader 1
            </button>

            <button type="submit" name="" class="btn btn-primary">
              Tambah Data Reader 2
            </button>
            -->
        </div>
    </div>
  </div>
</div>


<div class="container-fluid">
<?php
  //Status berhasil ditambahkan
    if(isset($_SESSION['success']) && $_SESSION['success'] !='')
    {
      echo '<h2>'.$_SESSION['success'].' </h2>';
      unset($_SESSION['success']);
    }

    //Status gagal ditambahkan
    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
      echo '<h2>'.$_SESSION['status'].' </h2>';
      unset($_SESSION['status']);
    }
  ?>
</div>



  <div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Hasil Scanning RFID Reader 1 (Aset Barang)
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->
    <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"    
    $query = "SELECT COUNT(rfid_uid) AS jumlah, rfid_uid, nama_alat, deskripsi, penanggung_jawab, status_asset, peminjam, timestamp
              FROM tb_scanner1_assetbarang
              GROUP BY nama_alat
              ORDER BY `timestamp` DESC";
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="tabelrfidscan1" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Timestamp</th>
            <th>RFID UID</th>
            <th>Nama Alat</th>
            <th>Deskripsi</th>
            <th>Penanggung Jawab</th>
            <th>Status Asset</th>
            <th>Peminjam</th>
            <th>Jumlah Terbaca</th>
          </tr>
        </thead>
        <tbody>
        <?php
        //mengambil data dari database
        //tipe kolom yang nantinya akan diambil
        if(mysqli_num_rows($query_run) > 0 )
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
          <tr>
          <!---Mengambil data dari database kemudian menampilkan ke tabel, serta menentukan kolom mana saja yang akan diambil datanya-->
            <td><?php echo $row['timestamp']; ?></td>
            <td><?php echo $row['rfid_uid']; ?></td>
            <td><?php echo $row['nama_alat']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td><?php echo $row['penanggung_jawab']; ?></td>
            <td><?php echo $row['status_asset']; ?></td>
            <td><?php echo $row['peminjam']; ?></td>
            <td><?php echo $row['jumlah']; ?>x</td>  
          <?php
          }
        }
        //Jika gagal ngambil data akan mengeluarkan peringatan
        else {
          echo "Data tidak ditemukan";   
        }
        ?>        
        </tbody>
      </table>

    </div>
  </div>
</div>
</div>

<div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Hasil Scanning RFID Reader 2 (Aset Barang)
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">


<!---Buat ngambil data--->
<?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"    
    $query = "SELECT COUNT(rfid_uid) AS jumlah, rfid_uid, nama_alat, deskripsi, penanggung_jawab, status_asset, peminjam, timestamp
              FROM tb_scanner2_assetbarang
              GROUP BY nama_alat
              ORDER BY `timestamp` DESC";
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="tabelrfidscan3" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Timestamp</th>
            <th>RFID UID</th>
            <th>Nama Alat</th>
            <th>Deskripsi</th>
            <th>Penanggung Jawab</th>
            <th>Status Asset</th>
            <th>Peminjam</th>
            <th>Jumlah Terbaca</th>
          </tr>
        </thead>
        <tbody>
        <?php
        //mengambil data dari database
        //tipe kolom yang nantinya akan diambil
        if(mysqli_num_rows($query_run) > 0 )
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
          <tr>
          <!---Mengambil data dari database kemudian menampilkan ke tabel, serta menentukan kolom mana saja yang akan diambil datanya-->
            <td><?php echo $row['timestamp']; ?></td>
            <td><?php echo $row['rfid_uid']; ?></td>
            <td><?php echo $row['nama_alat']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td><?php echo $row['penanggung_jawab']; ?></td>
            <td><?php echo $row['status_asset']; ?></td>
            <td><?php echo $row['peminjam']; ?></td>
            <td><?php echo $row['jumlah']; ?>x</td>  

          <?php
          }
        }
        //Jika gagal ngambil data akan mengeluarkan peringatan
        else {
          echo "Data tidak ditemukan";   
        }
        ?>        
        </tbody>
      </table>

    </div>
  </div>
</div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>