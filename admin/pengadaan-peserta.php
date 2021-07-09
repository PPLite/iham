<?php
include('database/dbconfig.php');
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Data Peserta Pengadaan Barang
      </h6>
    </div>

    <!-- Buat nambah tombol kriteria baru -->
    <div class="card-header py-4">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahvendormodal">
        Tambah Vendor Baru
      </button>
    </div>
    <!-- akhir tombol kriteria -->

    <div class="card-body">

      <div class="table-responsive">

        <!---Buat ngambil data--->
        <?php
        //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
        $query = "SELECT * FROM `tb_peserta`";
        $query_run = mysqli_query($connection, $query);
        ?>

        <table class="table table-bordered" id="tabelvendor" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No Vendor</th>
              <th>Vendor</th>
              <th>Alamat</th>
              <th>Hapus</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
              while ($data = mysqli_fetch_array($query_run)) {
            ?>
                <tr>
                  <!---Mengambil data dari database kemudian menampilkan ke tabel, serta menentukan kolom mana saja yang akan diambil datanya-->
                  <!--<td><?php //echo $row['id']; 
                          ?></td> -->
                  <!--<td><?php //echo $row['rfid_uid']; 
                          ?></td>-->
                  <td><?php echo $data['no_vendor']; ?></td>
                  <td><?php echo $data['vendor']; ?></td>
                  <td><?php echo $data['alamat']; ?></td>
                  <td>
                    <!--MODAL UNTUK EDIT/UBAH ASSET (DI TABEL) -->
                    <button type="button" class="btn btn-success tomboleditvendor">Ubah</button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger tombolhapusvendor">Hapus</button>
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
<!-- /.container-fluid -->

<!---------------------------------------- MODAL TAMBAH VENDOR------------------------------------------------>
<div class="modal fade" id="tambahvendormodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Vendor Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code-topsis.php" method="post" role="form">
        <div class="modal-body">


          <div class="form-group">
            <label for="">Nama Vendor</label>
            <input type="text" class="form-control" id="vendor" name="vendor" placeholder="Isi nama vendor" required="">
          </div>

          <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Iskian Alamat Vendor" required="">
          </div>
          <div class=modal-footer>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            <button type="submit" name="tambahvendor" class="btn btn-success">Tambah</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<!---------------------------------------- MODAL EDIT VENDOR------------------------------------------------>
<div class="modal fade" id="modaleditvendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Vendor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code-topsis.php" method="post" role="form">
        <div class="modal-body">
          <input type="hidden" id="edit_no_vendor" name="no_vendor">
          <div class="form-group">
            <label for="">Nama Vendor</label>
            <input type="text" class="form-control" id="edit_vendor" name="vendor" placeholder="Isi nama vendor" required="">
          </div>

          <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control" id="edit_alamat" name="alamat" placeholder="Iskian Alamat Vendor" required="">

          </div>
          <div class=modal-footer>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            <button type="submit" name="editvendor" class="btn btn-success">Ubah</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<!------------------------------MODAL HAPUS VENDOR------------------------------------->
<div class="modal fade" id="modalhapusvendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Vendor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code-topsis.php" method="POST">

        <div class="modal-body">

          <input type="hidden" name="hapus_no_vendor" id="hapus_no_vendor">

          <h5> Apakah anda yakin untuk menghapus data Vendor ini?</h5>
          <h6> Data yang sudah terhapus tidak dapat dikembalikan</h6>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" name="hapusvendor" class="btn btn-danger">Hapus</button>
        </div>
      </form>

    </div>
  </div>
</div>






<?php
include('includes/scripts.php');
include('includes/footer.php');
include('includes/scripts-topsis.php');
?>