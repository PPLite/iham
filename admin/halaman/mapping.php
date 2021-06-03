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
       $query_2= "SELECT rfid_uid,timestamp,nama_anak
              FROM tb_scanner2_assetbayi
              ORDER BY `timestamp` DESC LIMIT 3
    "; 
    $query_run2 = mysqli_query($connection, $query_2);
	$row_2 = mysqli_fetch_assoc($query_run2);
	
    ?>
	


  <div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Keberadaan Pasien Bayi Pada Reader 1
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->

      <table class="table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Timestamp</th>
            <th>RFID UID</th>
            <th>Nama Anak</th>
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
			<?php
			//if($row['timestamp']>= $row_2['timestamp']){?>
			<td><?php echo $row['timestamp']; ?></td> 
			<td><?php echo $row['rfid_uid']; ?></td> 
			<td><?php echo $row['nama_anak']; ?></td> <?php
		//	}
			//else{
			//	echo "Data tidak ditemukan";
		//	}
			?>
			
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



<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Keberadaan Pasien Bayi Pada Reader 2
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->

      <table class="table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Timestamp</th>
            <th>RFID UID</th>
            <th>Nama Anak</th>
          </tr>
        </thead>
        <tbody>
        <?php
        //mengambil data dari database
        //tipe kolom yang nantinya akan diambil
        if(mysqli_num_rows($query_run2) > 0 )
        {
          while($row_2 = mysqli_fetch_assoc($query_run2))
          {
			  ?>
        <tr>
			<?php
		//	if ( $row['timestamp']<= $row_2['timestamp'] ){
			?>
			<td><?php echo $row_2['timestamp']; ?></td> 
			<td><?php echo $row_2['rfid_uid']; ?></td> 
			<td><?php echo $row_2['nama_anak']; ?></td><?php
			
		//	}
		//else{
			//	echo "Data tidak ditemukan";
		//	}?> 
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