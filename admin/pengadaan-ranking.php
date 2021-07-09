<?php
include('database/dbconfig.php');
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
?>

<!--  -->

<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Penilaian Peserta Vendor Pengadaan Barang
    </h6>
  </div>

<div class="card-body">

    <div class="table-responsive">

<!---Buat ngambil data--->

        <div id="page-wrapper">
            <div class="main-page">
                <div class="tables">
                    <div class="panel-body widget-shadow">
                        <table class="table table-bordered"> <thead>

                            <th>No</th> 
                            <th>No Vendor</th> 
                            <th>Nama Vendor</th> 
                             
                            <?php         
                                $query = "select * from tb_peringkat ";
                                $result = mysqli_query($connection, $query); 
                                $query2 = "select * from tb_kriteria";
                                $result2 = mysqli_query($connection, $query2);
                                while($dt1 = mysqli_fetch_array($result2)){
                                    echo "<th>$dt1[nama_kriteria]</th>";
                                }

                            ?>
                            
                            <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $no_vendor = "";
                                while ($data = mysqli_fetch_array($result)) {
                                    if($no_vendor == $data['no_vendor']){

                                    }else{
                                        $query3 = "select * from tb_peringkat where no_vendor='".$data['no_vendor']."' ";
                                        $result3 = mysqli_query($connection, $query3);
                                ?>
                                        <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data ['no_vendor']; ?></td>
                                        <td><?php echo $data ['nama_peserta']; ?></td>
                                <?php 
                                        while ($dt2 = mysqli_fetch_array($result3)){
                                            echo '<td>'.$dt2 ['nilai'].'</td>';
                                        } 
                                ?>
                                        <td>
                                        <a href="ubah_data_rangking.php?kode=<?php echo $data ['id_peringkat']; ?>" >
                                        <button type="button" class="btn btn-primary btn-flat "><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                                        <a href="../crud/hapus_rangking.php?id=<?php echo $data['no_vendor'] ?>" onclick="return confirm('Anda Yakin Menghapus Data ini ?')">
                                            <button type="button" class="btn btn-warning btn-flat "><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                        </td></tr>
                                     
                                <?php 
                                    } 
                                $no_vendor = $data['no_vendor'];
                                
                                }
                                
                                ?>

                                        </tbody>
                                        </table> 
                                        <div>
                                            <!-- Standard button -->
                                            <a href="form_tambah_rangking.php" type="button" class="btn btn-success">Tambah Data</a>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>


  