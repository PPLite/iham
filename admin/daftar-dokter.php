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
    <h6 class="m-0 font-weight-bold text-primary">Tabel Daftar Dokter
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->
    <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT * FROM `tb_dokter`"; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="tabelpasien" width="100%" cellspacing="0">
        <thead>
          <tr>
            <!--<th>ID</th>-->
            <!--<th>RFID UID</th>-->
            <th>Nama Dokter</th>
            <th>No ID Dokter</th>
            <th>Jenis Kelamin Dokter</th>
            <th>Alamat Dokter</th>
            <th>Spesialis</th>
          </tr>
        </thead>
        <tbody>
        <?php
        //mengambil data dari database
        //tipe kolom yang nantinya akan diambil
        if(mysqli_num_rows($query_run) > 0 )
        {
          while($row = mysqli_fetch_array($query_run))
          {
            ?>
          <tr>
          <!---Mengambil data dari database kemudian menampilkan ke tabel, serta menentukan kolom mana saja yang akan diambil datanya-->
          <!--<td><?php //echo $row['id']; ?></td> -->
            <!--<td><?php //echo $row['rfid_uid']; ?></td>-->
            <td><?php echo $row['nama_dokter']; ?></td>
            <td><?php echo $row['id_dokter']; ?></td>
            <td><?php echo $row['jenis_kelamin_dokter']; ?></td>
            <td><?php echo $row['alamat_dokter']; ?></td>
            <td><?php echo $row['spesialis']; ?></td>
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