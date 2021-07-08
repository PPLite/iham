<?php
include('database/dbconfig.php');
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
?>

<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Peserta Pengadaan Barang
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->
    <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT * FROM `tb_peserta`"; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="tabelpasien" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No Vendor</th> 
            <th>Vendor</th>  
            <th>Alamat</th>
            <th>Hapus</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($query_run) > 0 )
        {
          while($data = mysqli_fetch_array($query_run))
          {
            ?>
          <tr>
          <!---Mengambil data dari database kemudian menampilkan ke tabel, serta menentukan kolom mana saja yang akan diambil datanya-->
          <!--<td><?php //echo $row['id']; ?></td> -->
            <!--<td><?php //echo $row['rfid_uid']; ?></td>-->
            <td><?php echo $data ['no_vendor']; ?></td>
            <td><?php echo $data ['vendor']; ?></td>
            <td><?php echo $data ['alamat']; ?></td>
            <td>
            <!--MODAL UNTUK EDIT/UBAH ASSET (DI TABEL) -->
            <button type="button" class="btn btn-success tomboleditpeserta">Ubah</button>
            </td>
            <td>
            <button type="button" class="btn btn-danger tombolhapuspeserta  ">Hapus</button>
            </td>
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







