<?php
include('database/dbconfig.php');
?>


<!---Buat ngambil data--->
<?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT rfid_uid,timestamp
              FROM tb_scanner1_assetbayi
              ORDER BY `timestamp` DESC LIMIT 3
    "; 
    $query_run = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($query_run)

    ?>
	<?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
       $query_2= "SELECT rfid_uid,timestamp
              FROM tb_scanner2_assetbayi
              ORDER BY `timestamp` DESC LIMIT 3
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
								$bdd = new PDO('mysql:host=localhost;dbname=mjdr3247_adminpanel', 'mjdr3247_admin', 'semogacepatlulus2021');
								}
								catch (Exception $e)
								{
								die('Error : ' . $e->getMessage());
								}
								$reponse1 = $bdd->query('SELECT * FROM tb_rfid');
								$response2 = $bdd->query('SELECT * FROM tb_stat_anak');
								$exposants = $reponse1->fetchAll();
								$exposants_2= $response2->fetchAll();
								$reponse1->closeCursor();
								$response2->closeCursor();
							?>
				</head>
				<body oncontextmenu="return false;">
					<div class="stand">
						<?php
							
							$posY = 0;
							//foreach($row as $j){
								
							//}
					//while(mysqli_num_rows($query_run) > 0  || mysqli_num_rows($query_run_2) > 0) {
							$kotak = 10;
							foreach($exposants as $i){
								if($i['rfid_uid']==$row['rfid_uid'] && $i['rfid_uid']==$row_2['rfid_uid'] && $row['timestamp'] == $row_2['timestamp']){
									$width = 5;
									$height = 5;
									$posX = 60;
									$posY = $posY +10;
									
									echo '<div id= "s'. $i['nama_alat'].'
									"style="width:'.$kotak*$width.'px;height:'.$kotak*$height.'px;top:'.$kotak*$posX.'px;left:'.$kotak*$posY.'px;">'."\n";
                  echo $i['nama_alat']."\n";
                  echo '</div>'."\n";	
									break;
								}
								if($i['rfid_uid']!==$row['rfid_uid'] && $i['rfid_uid']==$row_2['rfid_uid'] && $row['timestamp'] !== $row_2['timestamp']){
									$width = 5;
									$height = 5;
									$posX = -30;
									$posY = $posY +10;
									
									echo '<div id= "s'. $i['nama_alat'].'
									"style="width:'.$kotak*$width.'px;height:'.$kotak*$height.'px;top:'.$kotak*$posX.'px;left:'.$kotak*$posY.'px;">'."\n";
									echo $i['nama_alat']."\n";
                  echo '</div>'."\n";	
                  break;
								}
								if($i['rfid_uid']==$row['rfid_uid'] && $i['rfid_uid']!==$row_2['rfid_uid'] && $row['timestamp'] !== $row_2['timestamp']){
									$width = 5;
									$height = 5;
									$posX = 100;
									$posY = $posY +10;
									
									echo '<div id= "s'. $i['nama_alat'].'
									"style="width:'.$kotak*$width.'px;height:'.$kotak*$height.'px;top:'.$kotak*$posX.'px;left:'.$kotak*$posY.'px;">'."\n";	
									echo $i['nama_alat']."\n";
                  echo '</div>'."\n";	
                  break;
								}
									
							}	
							$kotak= 5;
							foreach($exposants_2 as $j){
								if($j['rfid_uid']==$row['rfid_uid'] && $j['rfid_uid']==$row_2['rfid_uid'] && $row['timestamp'] == $row_2['timestamp']){
									$width = 5;
									$height = 5;
									$border_radius = 50%
									//$display = 'inline-block';
									$posX = 60;
									$posY = $posY +10;
									
									echo '<div id= "s'. $j['nama_anak'].'
									"style="width:'.$kotak*$width.'px;height:'.$kotak*$height.'px;top:'.$kotak*$posX.'px;left:'.$kotak*$posY.'px;">'."\n";		
									echo $j['nama_anak']."\n";
                  echo '</div>'."\n";	
                  break;
								}
								if($j['rfid_uid']!==$row['rfid_uid'] && $j['rfid_uid']==$row_2['rfid_uid'] && $row['timestamp'] !== $row_2['timestamp']){
									$width = 5;
									$height = 5;
									$border_radius = 50%
									//$display = 'inline-block';
									$posX = -30;
									$posY = $posY +10;
									
									echo '<div id= "s'. $j['nama_anak'].'
									"style="width:'.$kotak*$width.'px;height:'.$kotak*$height.'px;top:'.$kotak*$posX.'px;left:'.$kotak*$posY.'px;">'."\n";		
									echo $j['nama_anak']."\n";
                  echo '</div>'."\n";
                  break;
								}
								if($j['rfid_uid']==$row['rfid_uid'] && $j['rfid_uid']!==$row_2['rfid_uid'] && $row['timestamp'] !== $row_2['timestamp']){
									$width = 5;
									$height = 5;
									$border_radius = 50%
									//$display = 'inline-block';
									$posX = 100;
									$posY = $posY +10;
									
									echo '<div id= "s'. $j['nama_anak'].'
									"style="width:'.$kotak*$width.'px;height:'.$kotak*$height.'px;top:'.$kotak*$posX.'px;left:'.$kotak*$posY.'px;">'."\n";	
									echo $j['nama_anak']."\n";
                  echo '</div>'."\n";
                  break;
								}
									
							}
					//}
							//if ($row['rfid_uid'] !== $row_2['rfid_uid'] && $row['timestamp'] == $row_2['timestamp']){
								 //echo '<div id="s'.$exposants[2][0].'
								//"style="width:'.$kotak*$exposants[2][2].'px;height:'.$kotak*$exposants[2][3].'px;top:'.$kotak*$exposants[2][5].'px;left:'.$kotak*$exposants[2][4].'px;">'."\n";
								//echo '<div id="s'.$exposants [0][1].'
								//"style="width:'.$kotak*$exposants[0][2].'px;height:'.$kotak*$exposants[0][3].'px;top:'.$kotak*$exposants[0][5].'px;left:'.$kotak*$exposants[0][4].'px;">'."\n";
								//echo '<div id="s'.$exposants [1][0].'
								//"style="width:'.$kotak*$exposants[1][2].'px;height:'.$kotak*$exposants[1][3].'px;top:'.$kotak*$exposants[1][5].'px;left:'.$kotak*$exposants[1][4].'px;">'."\n";
							//}
							//else{
								//if( $row['timestamp'] > $row_2['timestamp']){
								//echo '<div id="s'.$exposants[1][1].'
								//"style="width:'.$kotak*$exposants[1][2].'px;height:'.$kotak*$exposants[1][3].'px;top:'.$kotak*$exposants[1][5].'px;left:'.$kotak*$exposants[1][4].'px;">'."\n";
								//}
								//else{
								//echo '<div id="s'.$exposants[0][1].'
								//"style="width:'.$kotak*$exposants[0][2].'px;height:'.$kotak*$exposants[0][3].'px;top:'.$kotak*$exposants[0][5].'px;left:'.$kotak*$exposants[0][4].'px;">'."\n";									
								//}								
							//}
							
		
							//$Array_Area_1 = $row['rfid_uid']

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
            <th>Status Asset</th>
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
            <th>Status Asset</th>
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

<!------BIKIN JSON OTOMATIS------>

<?php
function get_data()
{
    $connect = mysqli_connect("localhost", "mjdr3247_admin","semogacepatlulus2021","mjdr3247_adminpanel");
    $query = "SELECT COUNT(rfid_uid) AS jumlah, rfid_uid, nama_alat, deskripsi, penanggung_jawab, status_asset, peminjam, timestamp
              FROM tb_scanner1_assetbarang
              GROUP BY nama_alat
              ORDER BY `timestamp` DESC";
    $results = mysqli_query($connect, $query);
    

    $rfid_scanner1_aset = array();
    while($row = mysqli_fetch_array($results))
    {
        $rfid_scanner1_aset[] = array(
            'jumlah' => $row["jumlah"],
            'rfid_uid' => $row["rfid_uid"],
            'nama_alat' => $row["nama_alat"],
            'deskripsi' => $row["deskripsi"],
            'penanggung_jawab' => $row["penanggung_jawab"],
            'status_asset' => $row["status_asset"],
            'peminjam' => $row["peminjam"],
            'timestamp' => $row["timestamp"]
        );
    }
    return json_encode($rfid_scanner1_aset);
}

$file_name = 'rfid_scaner1_aset.json';
if(file_put_contents($file_name, get_data()))
{
    echo' ';
}
else
{
    echo 'Error?';
}

?>


<?php
include('includes/scripts.php');
?>