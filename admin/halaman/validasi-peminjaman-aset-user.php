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
    <h6 class="m-0 font-weight-bold text-primary"> Daftar barang akan dipinjam / dipindah
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">


<!---Buat ngambil data--->
<?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"    
    $query = "SELECT * FROM tb_rfid WHERE `status_asset` = 'konfirmasi_pinjam' OR `status_asset` = 'konfirmasi_pindah'";
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="validasiaset" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID Barang</th>
            <th>RFID UID</th>
            <th>Nama Alat</th>
            <th>Deskripsi</th>
            <th>Penanggung Jawab</th>
            <th>Status Asset</th>
            <th>Peminjam</th>
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
            <td><?php echo $row['rfid_uid']; ?></td> 
            <td><?php echo $row['nama_alat']; ?></td> 
            <td><?php echo $row['deskripsi']; ?></td> 
            <td><?php echo $row['penanggung_jawab']; ?></td>  
            <td>Menunggu <?php echo $row['status_asset']; ?></td>
            <td><?php echo $row['peminjam']; ?></td>
            <td><?php echo $row['keterangan']; ?></td>

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