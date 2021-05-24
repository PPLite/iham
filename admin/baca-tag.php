<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php')
?>

<div class="container-fluid">

<!---- Untuk tombol "tambah aset" dan header--->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Menu Pengelolaan Aset Anak
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

      <table class="table table-bordered" id="tabelasetbayi" width="100%" cellspacing="0">
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
            </div>
            <!------------------------------------------------------------------------------------->
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



include('includes/scripts.php');
include('includes/footer.php');
?>



