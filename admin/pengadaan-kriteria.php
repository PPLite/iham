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
    <h6 class="m-0 font-weight-bold text-primary">Tabel Kriteria Pengadaan Barang
    </h6>
  </div>
  <!-- Buat nambah tombol kriteria baru -->
  <div class="card-header py-4">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahkriteriamodal">
              Tambah Kriteria Baru
            </button>
  </div>
  <!-- akhir tombol kriteria -->
<div class="card-body">

    <div class="table-responsive">
<!---Buat ngambil data--->
    <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT * FROM `tb_kriteria`"; 
    $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="tabelkriteria" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama Kriteria</th> 
            <th>Tipe Kriteria</th>  
            <th>Bobot</th>
            <th>Hapus</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($query_run) > 0 )
        {
          while($data = mysqli_fetch_array($query_run))
          {
            ?>
          <tr>
          <!---Mengambil data dari database kemudian menampilkan ke tabel, serta menentukan kolom mana saja yang akan diambil datanya-->
            <td><?php echo $data ['nama_kriteria']; ?></td>
            <td><?php echo $data ['tipe_kriteria']; ?></td>
            <td><?php echo $data ['bobot']; ?></td>
            <td>
            <!--MODAL UNTUK EDIT/UBAH ASSET (DI TABEL) -->
            <button type="button" class="btn btn-success tomboleditpeserta">Ubah</button>
            </td>
            <td>
            <button type="button" class="btn btn-danger tombolhapuspeserta">Hapus</button>
            </td>
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


<!-- MODAL Tambah Kriteria-->
<div class="modal fade" id="tambahkriteriamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="crud-topsis/tambah_kriteria.php" method="post" role="form">
        <div class="modal-body">
        
        <input type="hidden" value="Benefit" id="tipe_kriteria">

            <div class="form-group"> 
                <label for="">Nama Kriteria :</label> 
                <input type="text" class="form-control" id="nama_Kriteria" name="nama_kriteria" placeholder="Isikan Kriteria, Contoh = 'Kualitas Produk' " required="">
            </div> 

            <!-- Buat milih tipe kriteria
                Jika Benefit = Nilai tertinggi semakin baik
                Jika Cost = Nilai tertinggi semakin buruk
                Berpengaruh di hasil kodingan. namun masih belum dibutuhkan
            -->
            <!-- 
                <div class="form-group">
                <label for="">Tipe Kriteria:</label>
                <select class="form-control" id="tipe_kriteria"name="tipe_kriteria" >
                    <option value="Cost" id="tipe_kriteria">Cost</option>
                    <option value="Benefit" id="tipe_kriteria">Benefit</option>
                </select>
            </div> -->

            <div class="form-group"> 
                <label for="">Bobot :</label> 
                <input type="text" class="form-control" id="bobot" name="bobot" placeholder="Isikan Bobot nilai" required="">
            </div>
            
            <button type="submit" name="submit" class="btn btn-success">Tambah</button>      
            <type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        </div>
    </form> 





    </div>
  </div>
</div>



























<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

