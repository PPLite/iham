<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php')
?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Menu Pengelolaan Aset
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahinaset">
              Tambahkan data Asset 
            </button>
    </h6>
  </div>

<div class="card-body">
    <div class="table-responsive">
    <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT * FROM tb_rfid"; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="dataaset" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>Nama Alat</th>
            <th>RFID UID</th>
            <th>Deskripsi Alat</th>
            <th>Ditambahkan Pada</th>
            <th>Penanggung Jawab</th>
            <th>Peminjam</th>
            <th>Status</th>
            <th>Ubah</th>
            <th>Hapus</th>
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
          <td><?php echo $row['id']; ?></td> <!--- 0 --->
            <td><?php echo $row['nama_alat']; ?></td>  <!--- 1 --->
            <td><?php echo $row['uid']; ?></td> <!--- 2 --->
            <td><?php echo $row['deskripsi']; ?></td> <!--- 3 --->
            <td><?php echo $row['tanggal']; ?></td> <!--- 4 --->
            <td><?php echo $row['penanggung_jawab_bayi']; ?></td> <!--- 5 --->
            <td><?php echo $row['peminjam']; ?></td> <!--- 6 --->
            <td><?php echo $row['status_asset']; ?></td>  <!--- 7 --->

            <td>
            <!--MODAL UNTUK EDIT/UBAH ASSET (DI TABEL) -->
            <button type="button" class="btn btn-success editbtnasset">Ubah</button>
            </td>

            <td>
            <button type="button" class="btn btn-danger deletebtnasset">Hapus</button>
            </td>
            </div>

            <div class="container-fluid">

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



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>