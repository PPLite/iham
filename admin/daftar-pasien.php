<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
include('database/dbconfig.php');
?>


<div class="container-fluid">

  <!---- Untuk tombol "tambah aset"--->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Pasien Dewasa Terdaftar
      </h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">

        <!---Buat ngambil data--->
        <?php
        //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
        $query = "SELECT DATE_FORMAT(`timestamp`, '%d/%m/%Y %H:%i') AS timestamp , rfid_uid, nama_pasien, id_pengenal, usia, jenis_kelamin, tinggi_badan, berat_badan, alamat, status FROM tb_pasien_dewasa";
        $query_run = mysqli_query($connection, $query);
        ?>

        <table class="table table-bordered" id="tabelpasien" width="100%" cellspacing="0">
          <thead>
            <tr>
              <!--<th>ID</th>-->
              <!--<th>RFID UID</th>-->
              <th>Nama Pasien</th>
              <th>No KTP/SIM</th>
              <th>Usia</th>
              <th>Jenis Kelamin</th>
              <th>Tinggi Badan</th>
              <th>Berat Badan</th>
              <th>Alamat</th>
              <th>Status</th>
              <th>Waktu Masuk</th>
            </tr>
          </thead>
          <tbody>
            <?php
            //mengambil data dari database
            //tipe kolom yang nantinya akan diambil
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_array($query_run)) {
            ?>
                <tr>
                  <!---Mengambil data dari database kemudian menampilkan ke tabel, serta menentukan kolom mana saja yang akan diambil datanya-->
                  <!--<td><?php //echo $row['id']; 
                          ?></td> -->
                  <!--<td><?php //echo $row['rfid_uid']; 
                          ?></td>-->
                  <td><?php echo $row['nama_pasien']; ?></td>
                  <td><?php echo $row['id_pengenal']; ?></td>
                  <td><?php echo $row['usia']; ?></td>
                  <td><?php echo $row['jenis_kelamin']; ?></td>
                  <td><?php echo $row['tinggi_badan']; ?></td>
                  <td><?php echo $row['berat_badan']; ?></td>
                  <td><?php echo $row['alamat']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td><?php echo $row['timestamp']; ?></td>
                  </td>

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
<!-- /.container-fluid -->





<?php
include('includes/scripts.php');
include('includes/footer.php');
?>