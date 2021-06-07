<?php
include('../database/dbconfig.php');
?>


<!---Buat ngambil data--->
<?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT rfid_uid,timestamp,nama_anak
              FROM tb_scanner1_assetbayi
              ORDER BY `timestamp` DESC LIMIT 3
    "; 
    $query_run = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($query_run);
	

    ?>
	<?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
       $query_2= "SELECT rfid_uid,timestamp, nama_anak
              FROM tb_scanner2_assetbayi
              ORDER BY `timestamp` DESC LIMIT 3
    "; 
    $query_run2 = mysqli_query($connection, $query_2);
	$row_2 = mysqli_fetch_assoc($query_run2);
	
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
								$tb_1 = $bdd->query('SELECT * FROM tb_area_1 ORDER BY `timestamp` DESC LIMIT 1');
								$tb_2 = $bdd->query('SELECT * FROM tb_area_2 ORDER BY `timestamp` DESC LIMIT 1');
								$tb_3 = $bdd->query('SELECT * FROM tb_area_3 ORDER BY `timestamp` DESC LIMIT 1');
								$area_1 = $tb_1->fetchAll();
								$area_2 = $tb_2->fetchAll();
								$area_3 = $tb_3->fetchAll();
								$tb_1->closeCursor();
								$tb_2->closeCursor();
								$tb_3->closeCursor();
							?>
				</head>
				<body oncontextmenu="return false;">
					<div class="stand">
						<?php
						//Get reader condition
						if($row['timestamp']==$row_2['timestamp']){
							//Get Area Position
							if($row['rfid_uid']==$row_2['rfid_uid']){// area 2
								$object = [2];
								$posX = 30;
							}
							else{
								$object = [1,3];
								$posX = [100,-30];
							}
						}
						if($row['timestamp']>=$row_2['timestamp']){
							$object = [1];
							$posX = 100;
						}
						else{
							$object= [3];
							$posX = 100;
						}
						// List Object in Spesific area
						foreach($object as $j){
							if($j == 1){
								foreach($area_1 as $a_1){
									$id = $row['rfid_uid'];
									$name = $row['nama_anak'];
									$Ynew = $a_1['posY']+1;
									if($id == $a_1['rfid_uid']){
										$new_tot =$a_1['total'] + 1;	
									}
									else {
										$new_tot = 1;
									}
									$data = "INSERT INTO tb_area_1 (rfid_uid,nama_anak,total,posX,posY)
									VALUES ('$id','$name','$new_tot','$posX','$Ynew')";
									$run_1 = mysqli_query($connection, $data);
								}
							}
							if($j==2){
								foreach($area_2 as $a_2){
									$id = $row['rfid_uid'];
									$name = $row['nama_anak'];
									$Ynew = $a_2['posY']+1;
									if($id == $a_2['rfid_uid']){
										$new_tot =$a_2['total'] + 1;	
									}
									else {
										$new_tot = 1;
									}
									$data = "INSERT INTO tb_area_2 (rfid_uid,nama_anak,total,posX,posY)
									VALUES ('$id','$name','$new_tot','$posX','$Ynew')";
									$run_2 = mysqli_query($connection, $data);
								}
								
							}
							else{
								foreach($area_3 as $a_3){
									$id   = $row_2['rfid_uid'];
									$name = $row_2['nama_anak'];
									$Ynew = $a_3['posY']+1;
									if($id !== $a_3['rfid_uid']){
										$new_tot = array( array($id,1));
										$data = "INSERT INTO tb_area_3 (rfid_uid,nama_anak,posX, posY)
										VALUES ('$id','$name','$posX','$Ynew')";
										$run_3 = mysqli_query($connection, $data);

										$delete = " DELETE FROM tb_area_3 WHERE total = '0'
										LIMIT 1 ";
										$del_3 = mysqli_query($connection, $delete);
									}
									else {
										$new_tot = $a_3['total'] + 1;
										$data = "INSERT INTO tb_area_3 (total)
										VALUES ('$new_tot')";
										$run_3 = mysqli_query($connection, $data);
										//$data = "UPDATE tb_area_3 SET total = $new_tot 
										//WHERE rfid_uid = $id ";
										//$run_3 = mysqli_query($connection, $data);
									}
								}

							}

							//$tot_read = $area_3['tot_all'] +1;
							//if ($tot_read == 10){
							//	foreach($area_3 as $b_3){
							//		if($b_3['total']< 5){
							//			$delete = "DELETE FROM tb_area_3 WHERE tot_all < 5
							//			LIMIT 1";
							//		}
							//	}
							//}
						//tampilan objek pada peta
						$kotak = 10;
						$width = 5;
						$height = 5;
						foreach($area_1 as $p_1){
							echo '<div id= "s'. $p_1['nama_anak'].'
							"style="width:'.$kotak*$width.'px;height:'.$kotak*$height.'px;top:'.$kotak*$p_1['posY'].'px;left:'.$kotak*$p_1['posX'].'px;">'."\n";
							echo $p_1['nama_anak']."\n";
							echo '</div>'."\n";
						}
						
						foreach($area_2 as $p_2){
							echo '<div id= "s'. $p_2['nama_anak'].'
							"style="width:'.$kotak*$width.'px;height:'.$kotak*$height.'px;top:'.$kotak*$p_2['posY'].'px;left:'.$kotak*$p_2['posX'].'px;">'."\n";
							echo $p_2['nama_anak']."\n";
							echo '</div>'."\n";
						}
						
						foreach($area_3 as $p_3){
							echo '<div id= "s'. $p_3['nama_anak'].'
							"style="width:'.$kotak*$width.'px;height:'.$kotak*$height.'px;top:'.$kotak*$p_3['posY'].'px;left:'.$kotak*$p_3['posX'].'px;">'."\n";
							echo $p_3['nama_anak']."\n";
							echo '</div>'."\n";
						}
						
						//filter object loss
						//$tot_read = $area_1['tot_all'] +1;
						//$read_all= "INSERT INTO tb_area_1 (tot_all) VALUES ('$tot_read')";
						}
						?>
					</div>
					<script type="text/javascript" src="vendors/less-1.5.0.min.js"></script>
				</body>
    		</div>
	</div>
</div>


<?php
include('../includes/scripts.php');
?>