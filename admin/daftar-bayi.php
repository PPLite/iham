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
    <h6 class="m-0 font-weight-bold text-primary">Tabel Bayi Terdaftar
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->
    <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query1 = "SELECT * FROM tb_stat_anak";
    $query2 = "SELECT DATE_FORMAT(`waktu_masuk`, '%Y/%M/%d %H:%i') AS timestamp FROM tb_stat_anak"; 
    $query_run = mysqli_query($connection, $query1, $query2);
    ?>

      <table class="table table-bordered" id="tabelasetbayi" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <!--<th>RFID UID</th>-->
            <th>Nomor KTP/SIM</th>
            <th>Nama Anak</th>
            <th>Nama Ibu</th>
            <th>Penanggung Jawab</th>
            <th>Alamat</th>
            <th>Waktu Masuk</th>
            <th>Status</th>
            <th>Keterangan</th>
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
            <!--<td><?php //echo $row['rfid_uid']; ?></td>-->
            <td><?php echo $row['id_pengenal']; ?></td>
            <td><?php echo $row['nama_anak']; ?></td>
            <td><?php echo $row['nama_ibu']; ?></td>
            <td><?php echo $row['penanggung_jawab_bayi']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['timestamp']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['keterangan']; ?></td>
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