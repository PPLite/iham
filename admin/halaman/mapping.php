<?php
include('../database/dbconfig.php');
?>


<!---Buat ngambil data--->
<?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT rfid_uid,timestamp
              FROM tb_scanner1_assetbayi
              ORDER BY `timestamp` DESC LIMIT 1
    "; 
    $query_run = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($query_run)

    ?>
	<?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
       $query_2= "SELECT rfid_uid,timestamp
              FROM tb_scanner2_assetbayi
              ORDER BY `timestamp` DESC LIMIT 1 
    "; 
    $query_run2 = mysqli_query($connection, $query_2);
	$row_2= mysqli_fetch_assoc($query_run2)
    ?>
	
<div class="container-fluid">
	<div class="card shadow mb-4">
  		<div class="card-header py-3">
    		<h6 class="m-0 font-weight-bold text-primary">Posisi Aset</h6>
  		</div>
			<div class="card-body">
				<head>
					<link rel="stylesheet/less" type="text/css" href="styles/plan.less">
						<img src="vendors/bg.png" alt="Nature" class="responsive">
							<?php 
								try
								{
								$bdd = new PDO('mysql:host=localhost;dbname=exposants', 'root', '');
								}
								catch (Exception $e)
								{
								die('Error : ' . $e->getMessage());
								}
								$reponse1 = $bdd->query('SELECT * FROM exposants');
								$exposants = $reponse1->fetchAll();
								$reponse1->closeCursor();
							?>
				</head>
				<body oncontextmenu="return false;">
					<div class="stand">
						<?php
							$kotak = 10;
							if($row['rfid_uid'] == $row_2['rfid_uid'] && $row['timestamp'] == $row_2['timestamp']){
								echo '<div id="s'.$exposants[0][0].'
								"style="width:'.$kotak*$exposants[2][2].'px;height:'.$kotak*$exposants[2][3].'px;top:'.$kotak*$exposants[2][5].'px;left:'.$kotak*$exposants[2][4].'px;">'."\n";
                
              }
              
							if ($row['rfid_uid'] !== $row_2['rfid_uid'] && $row['timestamp'] == $row_2['timestamp']){
               // echo '<div id="s'.$exposants[2][0].'
								//"style="width:'.$kotak*$exposants[2][2].'px;height:'.$kotak*$exposants[2][3].'px;top:'.$kotak*$exposants[2][5].'px;left:'.$kotak*$exposants[2][4].'px;">'."\n";
								echo '<div id="s'.$exposants [0][0].'
								"style="width:'.$kotak*$exposants[0][2].'px;height:'.$kotak*$exposants[0][3].'px;top:'.$kotak*$exposants[0][5].'px;left:'.$kotak*$exposants[0][4].'px;">'."\n";
								echo '<div id="s'.$exposants [1][0].'
								"style="width:'.$kotak*$exposants[1][2].'px;height:'.$kotak*$exposants[1][3].'px;top:'.$kotak*$exposants[1][5].'px;left:'.$kotak*$exposants[1][4].'px;">'."\n";
							}
							else{
								if( $row['timestamp'] > $row_2['timestamp']){
								echo '<div id="s'.$exposants[1][0].'
								"style="width:'.$kotak*$exposants[1][2].'px;height:'.$kotak*$exposants[1][3].'px;top:'.$kotak*$exposants[1][5].'px;left:'.$kotak*$exposants[1][4].'px;">'."\n";
								}
								else{
								echo '<div id="s'.$exposants[0][0].'
								"style="width:'.$kotak*$exposants[0][2].'px;height:'.$kotak*$exposants[0][3].'px;top:'.$kotak*$exposants[0][5].'px;left:'.$kotak*$exposants[0][4].'px;">'."\n";									
								}								
							}

						?>
					</div>
					<script type="text/javascript" src="vendors/less-1.5.0.min.js"></script>
				</body>
    		</div>
	</div>
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
    $query = "SELECT * FROM tb_hasilscan1_asetbarang";
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Timestamp</th>
            <th>RFID UID</th>
            <th>Nama Alat</th>
            <th>Deskripsi</th>
            <th>Penanggung Jawab</th>
            <th>Status Aset</th>
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
            <td><?php echo $row['jumlah']; ?></td>  
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
    <h6 class="m-0 font-weight-bold text-primary"> Hasil Scanning RFID Reader 1 (Aset Bayi)
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->
    <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT COUNT(rfid_uid) AS jumlah, rfid_uid, id_pengenal, nama_anak, nama_ibu, penanggung_jawab_bayi, alamat, status, timestamp
              FROM tb_scanner1_assetbayi
              GROUP BY nama_anak
              ORDER BY `timestamp` DESC 
    "; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Timestamp</th>
            <th>RFID UID</th>
            <th>ID Pengenal</th>
            <th>Nama Anak</th>
            <th>Nama Ibu</th>
            <th>Penanggung Jawab Bayi</th>
            <th>Alamat</th></th>
            <th>Status</th>
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
            <td><?php echo $row['id_pengenal']; ?></td>
            <td><?php echo $row['nama_anak']; ?></td>
            <td><?php echo $row['nama_ibu']; ?></td>
            <td><?php echo $row['penanggung_jawab_bayi']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['status']; ?></td>
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
    $query = "SELECT * FROM tb_hasilscan2_asetbarang";
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Timestamp</th>
            <th>RFID UID</th>
            <th>Nama Alat</th>
            <th>Deskripsi</th>
            <th>Penanggung Jawab</th>
            <th>Status Aset</th>
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
    <h6 class="m-0 font-weight-bold text-primary"> Hasil Scanning RFID Reader 2 (Aset Bayi)
    </h6>
  </div>



<div class="card-body">

    <div class="table-responsive">


<!---Buat ngambil data--->
<?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT COUNT(rfid_uid) AS jumlah, rfid_uid, id_pengenal, nama_anak, nama_ibu, penanggung_jawab_bayi, alamat, status, timestamp
              FROM tb_scanner2_assetbayi
              GROUP BY nama_anak
              ORDER BY `timestamp` DESC 
    "; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Timestamp</th>
            <th>RFID UID</th>
            <th>ID Pengenal</th>
            <th>Nama Anak</th>
            <th>Nama Ibu</th>
            <th>Penanggung Jawab Bayi</th>
            <th>Alamat</th></th>
            <th>Status</th>
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
            <td><?php echo $row['id_pengenal']; ?></td>
            <td><?php echo $row['nama_anak']; ?></td>
            <td><?php echo $row['nama_ibu']; ?></td>
            <td><?php echo $row['penanggung_jawab_bayi']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['status']; ?></td>
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
include('../includes/scripts.php');
?>