<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php')
?>



<div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Hasil Scanning RFID Reader 1
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->
    <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT * FROM tb_status_scan"; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="tabelasetbayi" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th>ID </th>
            <th>RFID UID</th>
            <th>Nama Alat</th>
            <th>Deskripsi</th>
            <th>Penanggung Jawab</th>
            <th>Status Asset</th>
            <th>Peminjam</th>
            <th>Tanggal</th>

            <th>ID Pengenal</th>
            <th>Nama Anak</th>
            <th>Nama Ibu</th>
            <th>Deskripsi</th>
            <th>Penanggung_jawab_bayi</th>
            <th>Waktu Masuk
            <th>Alamat</th></th>
            <th>Status</th>

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
            <td><?php echo $row['rfid_uid']; ?></td>
            <td><?php echo $row['nama_alat']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td><?php echo $row['penanggung_jawab']; ?></td>
            <td><?php echo $row['status_asset']; ?></td>
            <td><?php echo $row['peminjam']; ?></td>
            <td><?php echo $row['tanggal']; ?></td>

            <td><?php echo $row['id_pengenal']; ?></td>
            <td><?php echo $row['nama_anak']; ?></td>
            <td><?php echo $row['nama_ibu']; ?></td>
            <td><?php echo $row['penanggung_jawab_bayi']; ?></td>
            <td><?php echo $row['waktu_masuk']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['status']; ?></td>
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
    <h6 class="m-0 font-weight-bold text-primary"> Hasil Scanning RFID Reader 1
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->
    <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT * FROM tb_reader_scan"; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="tabelrfidscan1" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th>ID </th>
            <th>RFID UID</th>
            <th>Reader ID</th>
            <th>Time Stamp</th>
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
          <td><?php echo $row['id']; ?></td> 
            <td><?php echo $row['rfid_uid']; ?></td>
            <td><?php echo $row['reader_id']; ?></td>
            <td><?php echo $row['timestamp']; ?></td>
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
    <h6 class="m-0 font-weight-bold text-primary"> Scanning RFID Reader 1
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->
    <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT * FROM tb_reader_scan"; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="tabelrfidscan1" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th>ID </th>
            <th>RFID UID</th>
            <th>Reader ID</th>
            <th>Time Stamp</th>
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
          <td><?php echo $row['id']; ?></td> 
            <td><?php echo $row['rfid_uid']; ?></td>
            <td><?php echo $row['reader_id']; ?></td>
            <td><?php echo $row['timestamp']; ?></td>
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
    <h6 class="m-0 font-weight-bold text-primary"> Scanning RFID Reader 2
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->
    <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT * FROM tb_reader_scan2"; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="tabelrfidscan2" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th>ID </th>
            <th>RFID UID</th>
            <th>Reader ID</th>
            <th>Time Stamp</th>
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
          <td><?php echo $row['id']; ?></td> 
            <td><?php echo $row['rfid_uid']; ?></td>
            <td><?php echo $row['reader_id']; ?></td>
            <td><?php echo $row['timestamp']; ?></td>
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