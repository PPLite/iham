<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php');
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
							foreach ($exposants as $i) {
							echo '<div id="s'.$i[0].'
							"style="width:'.$kotak*$i[2].'px;height:'.$kotak*$i[3].'px;top:'.$kotak*$i[5].'px;left:'.$kotak*$i[4].'px;">'."\n";
							echo $i[1]."\n".$i[6];
							echo '</div>'."\n";
							}
						?>
					</div>
					<script type="text/javascript" src="vendors/less-1.5.0.min.js"></script>
				</body>
    		</div>
	</div>
</div>

<?php
include('includes/scripts.php');
?>