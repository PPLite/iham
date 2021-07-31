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
						<img src="vendors/bg_3.png" width= "10%" height="50%" class="responsive">
							<?php 
								try
								{
								$bdd = new PDO('mysql:host=localhost;dbname=mjdr3247_adminpanel', 'mjdr3247_admin', 'semogacepatlulus2021');
								}
								catch (Exception $e)
								{
								die('Error : ' . $e->getMessage());
								}
								$tb_1 = $bdd->query('SELECT * FROM tb_area_1 ORDER BY timestamp DESC LIMIT 10');
								$tb_2 = $bdd->query('SELECT * FROM tb_area_2 ORDER BY timestamp DESC LIMIT 10');
								$tb_3 = $bdd->query('SELECT * FROM tb_area_3 ORDER BY timestamp DESC LIMIT 10');
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
						$ts1 = strtotime($row['timestamp']);
						$ts2 = strtotime($row_2['timestamp']); 
						$time_diff  = $ts1 - $ts2;
						$time_diff2 = $ts2 - $ts1;
						$object = array (0);
						$posX =0;

						if($time_diff > -5 && $time_diff2 < 5 && $time_diff <= 0 && $time_diff2 >= 0){
							//Get Area Position
							if($row['rfid_uid']==$row_2['rfid_uid']){// area 2
								$object = array(2);
								$posX = 30;
							}
							else{
								$object = array(1,3);
								$posX = array(-30,100);
								
							}
						}
						if($time_diff < -5 && $time_diff2 > 5){
							$object = array(1);
							$posX = -30;
						}
						if($time_diff > 5 && $time_diff2 < -5){
							$object= array(3);
							$posX = 100;
						}

						// List Object in Spesific area
						foreach($object as $j){
							if($j == 1){
								$same = 0;
								$new_Y = 0;
								foreach($area_1 as $a_1){
									$id   = $row['rfid_uid'];
									$posY = $a_1['posY'];
									if($id == $a_1['rfid_uid']){
										$new_tot = $a_1['total'] + 1;
										$new_Y = $a_1['posY'] ;
										$data= "UPDATE tb_area_1 SET 
												total='$new_tot'
												WHERE rfid_uid='$id'";

										$run_1= mysqli_query($connection,$data);
										$same =1;
										break;
									}
									else{
										$total = $a_1['total'];
										$new_Y = $a_1['posY'];
									}
									
								}
								
								if($same == 0){
									$id   = $row['rfid_uid'];
									$name = $row['nama_anak'];
									$new_tot = 1;
									$Ynew = $new_Y+ 10;
									$data = "INSERT INTO tb_area_1 (rfid_uid,nama_anak,total,posX, posY)
									VALUES ('$id', '$name',' $new_tot', '$posX' , '$Ynew')";
									$run_1 = mysqli_query($connection, $data);

									$delete = " DELETE FROM tb_area_1 WHERE total = '0'
									LIMIT 1 ";
									$del_1 = mysqli_query($connection, $delete);
								}					
							}
							if($j==2) {
								$same = 0;
								$new_Y = 0;
								foreach($area_2 as $a_2){
									$id   = $row_2['rfid_uid'];
									$posY = $a_2['posY'];
									if($id == $a_2['rfid_uid']){
										$new_tot = $a_2['total'] + 1;
										$new_Y = $a_2['posY'] ;
										$data= "UPDATE tb_area_2 SET 
												total='$new_tot'
												WHERE rfid_uid='$id'";

										$run_2= mysqli_query($connection,$data);
										$same =1;
										break;
									}
									else{
										$total = $a_2['total'];
										$new_Y = $a_2['posY'];
									}
									
								}
								
								if($same == 0){
									$id   = $row_2 ['rfid_uid'];
									$name = $row_2 ['nama_anak'];
									$new_tot = 1;
									$Ynew = $new_Y+ 10;
									$data = "INSERT INTO tb_area_2 (rfid_uid,nama_anak,total,posX, posY)
									VALUES ('$id', '$name',' $new_tot', '$posX' , '$Ynew')";
									$run_3 = mysqli_query($connection, $data);

									$delete = " DELETE FROM tb_area_2 WHERE total = '0'
									LIMIT 1 ";
									$del_3 = mysqli_query($connection, $delete);
								}
								
							}
							else {
								$same = 0;
								$new_Y = 0;
								foreach($area_3 as $a_3){
									$id   = $row_2['rfid_uid'];
									$posY = $a_3['posY'];
									if($id == $a_3['rfid_uid']){
										$new_tot = $a_3['total'] + 1;
										$new_Y = $a_3['posY'] ;
										$data= "UPDATE tb_area_3 SET 
												total='$new_tot'
												WHERE rfid_uid='$id'";

										$run_3= mysqli_query($connection,$data);
										$same =1;
										break;
									}
									else{
										$total = $a_3['total'];
										$new_Y = $a_3['posY'];
									}
									
								}
								
								if($same == 0){
									$id   = $row_2 ['rfid_uid'];
									$name = $row_2 ['nama_anak'];
									$new_tot = 1;
									$Ynew = $new_Y+ 10;
									$data = "INSERT INTO tb_area_3 (rfid_uid,nama_anak,total,posX, posY)
									VALUES ('$id', '$name',' $new_tot', '$posX' , '$Ynew')";
									$run_3 = mysqli_query($connection, $data);

									$delete = " DELETE FROM tb_area_3 WHERE total = '0'
									LIMIT 1 ";
									$del_3 = mysqli_query($connection, $delete);
								}

							}

							try
							{
							$bdd = new PDO('mysql:host=localhost;dbname=mjdr3247_adminpanel', 'mjdr3247_admin', 'semogacepatlulus2021');
							}
							catch (Exception $e)
							{
							die('Error : ' . $e->getMessage());
							}

							$it_1 = $bdd->query('SELECT * FROM tb_area_1 ORDER BY timestamp DESC ');
							$it_2 = $bdd->query('SELECT * FROM tb_area_2 ORDER BY timestamp DESC ');
							$it_3 = $bdd->query('SELECT * FROM tb_area_3 ORDER BY timestamp DESC ');
							$obj_1 = $it_1->fetchAll();
							$obj_2 = $it_2->fetchAll();
							$obj_3 = $it_3->fetchAll();
							$it_1->closeCursor();
							$it_2->closeCursor();
							$it_3->closeCursor();
							//$con = $result = mysql_query($connection, $it_1);
			
						//Filter Data
						//initiialization
						$t_1 = 0;
						$t_2 = 0;
						$t_3 = 0;
						$reset_all = 0;
						
						//Sum Object in All Area
						foreach ($obj_1 as $n_1){
							$t_1 = $t_1 + $n_1['total'];
						}

						foreach ($obj_2 as $n_2){
							$t_2 = $t_2 + $n_2['total'];
						}
			
						foreach ($obj_3 as $n_3){
							$t_3 = $t_3 + $n_3['total'];
						}
						
						$reset_all = $t_1 + $t_2 + $t_3;
						$min_v = $reset_all/3;

						// Filter area 1
						if( $reset_all >= 10){
							// Area 1
								$delete_1 = "DELETE FROM tb_area_1 WHERE total <= $min_v";
								$del_1 = mysqli_query($connection, $delete_1);
								$data = "INSERT INTO tb_area_1 (rfid_uid,nama_anak,total,posX, posY)
									VALUES ('00000000000', ' ','  ', ' ' , ' ')";
							        $up_1= mysqli_query($connection,$data);
						
							foreach($obj_1 as $x_1){
								$new_r   = 0;
								$id_new  = $x_1['rfid_uid'];
								$data_r  = "UPDATE tb_area_1 SET total = '$new_r' WHERE total > $min_v";
								$run_r   = mysqli_query($connection,$data_r);
							}

							// Area 2
							$delete_2 = "DELETE FROM tb_area_2 WHERE total <= 10";
							$del_2 = mysqli_query($connection, $delete_2);
							$data = "INSERT INTO tb_area_2 (rfid_uid,nama_anak,total,posX, posY)
							VALUES ('00000000000', ' ','  ', ' ' , ' ')";
							$up_2= mysqli_query($connection,$data);
					
					
							foreach($obj_2 as $x_2){
								$new_r   = 0;
								$id_new  = $x_2['rfid_uid'];
								$data_r  = "UPDATE tb_area_2 SET total = '$new_r' WHERE total > 10";
								$run_r   = mysqli_query($connection,$data_r);
							}

							//Area 3
							$delete_3 = "DELETE FROM tb_area_3 WHERE total <= $min_v";
							$del_3 = mysqli_query($connection, $delete_3);
							$data = "INSERT INTO tb_area_3 (rfid_uid,nama_anak,total,posX, posY)
									VALUES ('00000000000', ' ','  ', ' ' , ' ')";
							$up_3= mysqli_query($connection,$data);
							
							
							foreach($obj_3 as $x_3){
								$new_r   = 0;
								$id_new  = $x_3['rfid_uid'];
								$data_r  = "UPDATE tb_area_3 SET total = '$new_r' WHERE total > $min_v";
								$run_r   = mysqli_query($connection,$data_r);
							}

						}

						// Filter area 2
						//if($t_2 >= 5 || $reset_all >= 10){

						//		$delete_2 = "DELETE FROM tb_area_2 WHERE total <= 10";
						//		$del_2 = mysqli_query($connection, $delete_2);
						//		$data = "INSERT INTO tb_area_2 (rfid_uid,nama_anak,total,posX, posY)
						//			VALUES ('00000000000', ' ','  ', ' ' , ' ')";
						//		$up_2= mysqli_query($connection,$data);
						//	//}
							
						//	foreach($obj_2 as $x_2){
						//		$new_r   = 0;
						//		$id_new  = $x_2['rfid_uid'];
						//		$data_r  = "UPDATE tb_area_2 SET total = '$new_r' WHERE total > 10";
						//		$run_r   = mysqli_query($connection,$data_r);
						//	}
						//}


						// Filter area 3
						//if($t_3 >= 5 || $reset_all >= 10){
						//		$delete_3 = "DELETE FROM tb_area_3 WHERE total <= $min_v";
						//		$del_3 = mysqli_query($connection, $delete_3);
						//		$data = "INSERT INTO tb_area_3 (rfid_uid,nama_anak,total,posX, posY)
						//			VALUES ('00000000000', ' ','  ', ' ' , ' ')";
						//		$up_3= mysqli_query($connection,$data);
						//	//}
							
						//	foreach($obj_3 as $x_3){
						//		$new_r   = 0;
						//		$id_new  = $x_3['rfid_uid'];
						//		$data_r  = "UPDATE tb_area_3 SET total = '$new_r' WHERE total > $min_v";
						//		$run_r   = mysqli_query($connection,$data_r);
						//	}
						//}

						//tampilan objek pada peta di setiap area
						$kotak = 10;
						$width = 5;
						$height = 5;
						
						foreach($obj_1 as $p_1){
							if($p_1['rfid_uid'] !== '00000000000' && $p_1['rfid_uid'] !== ' ' ){
								$textY = ($kotak*$p_1['posY']) - 20;
								echo '<div id="ok">';
								echo '<img src="img\baby.png" alt="'.$p_1['nama_anak'].'" width = '.$kotak*$width.' height= '.$kotak*$height.' style="position: absolute; top:'.$kotak*$p_1['posY'].'px;left:'.$kotak*$p_1['posX'].'px;">';
								echo '<p style="font-size:10px;font-style:bold;position: absolute;top:'.$textY.'px;left:'.$kotak*$p_1['posX'].'px;">'.$p_1['nama_anak'].'</p>';
								echo '</div>';
							}
						}


						foreach($obj_2 as $p_2){
							if($p_2['rfid_uid'] !== '00000000000' && $p_2['rfid_uid'] !== ' '){
								$textY = ($kotak*$p_2['posY']) - 20;
								echo '<div id="ok">';
								echo '<img src="img\baby.png" alt="'.$p_2['nama_anak'].'" width = '.$kotak*$width.' height= '.$kotak*$height.' style="position: absolute; top:'.$kotak*$p_2['posY'].'px;left:'.$kotak*$p_2['posX'].'px;">';
								echo '<p style="font-size:10px;font-style:bold;position: absolute;top:'.$textY.'px;left:'.$kotak*$p_2['posX'].'px;">'.$p_2['nama_anak'].'</p>';
								echo '</div>';
							}

						}

						foreach($obj_3 as $p_3){
							if($p_3['rfid_uid'] !== '00000000000' && $p_3['rfid_uid'] !== ' '){
								$textY = ($kotak*$p_3['posY']) - 20;
								echo '<div id="ok">';
								echo '<img src="img\baby.png" alt="'.$p_3['nama_anak'].'" width = '.$kotak*$width.' height= '.$kotak*$height.' style="position: absolute; top:'.$kotak*$p_3['posY'].'px;left:'.$kotak*$p_3['posX'].'px;">';
								echo '<p style="font-size:10px;font-style:bold;position: absolute;top:'.$textY.'px;left:'.$kotak*$p_3['posX'].'px;">'.$p_3['nama_anak'].'</p>';
								echo '</div>';
							}

						}
						//Filter object
						//$total_all = $obj_1['tot_all'] + 1;
						
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