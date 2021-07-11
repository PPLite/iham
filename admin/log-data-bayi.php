<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
include('database/dbconfig.php');
?>

<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"> Hasil Scanning RFID Reader 1 (Aset Bayi)
      </h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">

        <!---Buat ngambil data--->
        <?php
        //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
        $query = "SELECT * FROM tb_hasil_pasienbayi";
        $query_run = mysqli_query($connection, $query);
        ?>

        <table class="table table-bordered" id="tabelrfidscan2" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>RFID UID</th>
              <th>Nama Anak</th>
      
            </tr>
          </thead>
          <tbody>
            <?php
            //mengambil data dari database
            //tipe kolom yang nantinya akan diambil
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                <tr>
                  <!---Mengambil data dari database kemudian menampilkan ke tabel, serta menentukan kolom mana saja yang akan diambil datanya-->
                  <td><?php echo $row['rfid_uid']; ?></td>
                  <td><?php echo $row['nama_anak']; ?></td>
                  
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
      <h6 class="m-0 font-weight-bold text-primary"> Hasil Scanning RFID Reader 2 (Aset Bayi)
      </h6>
    </div>



    <div class="card-body">

      <div class="table-responsive">


        <!---Buat ngambil data--->
        <?php
        //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
        $query = "SELECT * FROM tb_hasil_pasienbayi";
        $query_run = mysqli_query($connection, $query);
        ?>

        <table class="table table-bordered" id="tabelrfidscan4" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>RFID UID</th>
              <th>Nama Anak</th>
            </tr>
          </thead>
          <tbody>
            <?php
            //mengambil data dari database
            //tipe kolom yang nantinya akan diambil
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                <tr>
                  <!---Mengambil data dari database kemudian menampilkan ke tabel, serta menentukan kolom mana saja yang akan diambil datanya-->
                  <td><?php echo $row['rfid_uid']; ?></td>
                  <td><?php echo $row['nama_anak']; ?></td>  
              <?php
              }
            }
            //Jika gagal ngambil data akan mengeluarkan peringatan/
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