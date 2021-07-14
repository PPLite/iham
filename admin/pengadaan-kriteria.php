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
        $query = "SELECT * FROM `tb_kriteria`";
        $query_run = mysqli_query($connection, $query);
        ?>

        <table class="table table-bordered" id="tabelkriteria" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="display:none;">ID Kriteria</th>
              <th>Nama Kriteria</th>
              <th>Bobot</th>
              <th>Keterangan</th>
              <th>Edit</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
              while ($data = mysqli_fetch_array($query_run)) {
            ?>
                <tr>
                  <td style="display:none;"><?php echo $data['id_kriteria']; ?></td>
                  <td><?php echo $data['nama_kriteria']; ?></td>
                  <!-- 
                    <td><?php //echo $data ['tipe_kriteria']; ?></td> 
                  -->
                  <td><?php echo $data['bobot']; ?></td>
                  <td><?php echo $data['keterangan']; ?></td>
                  <td>
                    <!--MODAL UNTUK EDIT/UBAH ASSET (DI TABEL) -->
                    <button type="button" class="btn btn-success tomboleditkriteria">Ubah</button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger tombolhapuskriteria">Hapus</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code-topsis.php" method="post" role="form">
        <div class="modal-body">

          <input type="hidden" id="tipe_kriteria" name="tipe_kriteria" value="Benefit">

          <div class="form-group">
            <label for="">Nama Kriteria :</label>
            <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" placeholder="Isikan Kriteria, Contoh = 'Kualitas Produk' " required="">
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
            <input type="text" class="form-control" id="bobot" name="bobot" placeholder="Isikan Bobot nilai (angka 1-100)" required="">
          </div>

          <div class="form-group">
            <label for="">Keterangan :</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan Pendukung Kriteria" required="">
          </div>

          <div class=modal-footer>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            <button type="submit" name="tambahkriteria" class="btn btn-success">Tambah</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<!------------------------ MODAL  Edit Kriteria----------------------->
<div class="modal fade" id="modaleditkriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code-topsis.php" method="post" role="form">
        <div class="modal-body">
          <input type="hidden" id="edit_tipe_kriteria" name="tipe_kriteria" value="Benefit">
          <input type="hidden" id="edit_id_kriteria" name="id_kriteria"">

            <div class=" form-group">
          <label>Nama Kriteria :</label>
          <input type="text" class="form-control" id="edit_nama_kriteria" name="nama_kriteria" placeholder="Isikan Kriteria, Contoh = 'Kualitas Produk' " required="">
        </div>

        <div class="form-group">
          <label for="">Bobot :</label>
          <input type="text" class="form-control" id="edit_bobot_kriteria" name="bobot" placeholder="Isikan Bobot nilai" required="">
        </div>

        <div class="form-group">
          <label for="">Keterangan :</label>
          <input type="text" class="form-control" id="edit_keterangan_kriteria" name="keterangan" placeholder="Isikan Keterangan dari Kriteria" required="">
        </div>

        <div class=modal-footer>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" name="editkriteria" class="btn btn-success">Ubah</button>
        </div>

    </div>
    </form>

  </div>
</div>
</div>

<!------------------------------MODAL HAPUS KRITERIA------------------------------------->

<div class="modal fade" id="modalhapuskriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code-topsis.php" method="POST">

        <div class="modal-body">

          <input type="hidden" name="hapus_id_kriteria" id="hapus_id_kriteria">

          <h5> Apakah anda yakin untuk menghapus data kriteria ini?</h5>
          <h6> Data yang sudah terhapus tidak dapat dikembalikan</h6>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" name="hapuskriteria" class="btn btn-danger">Hapus</button>
        </div>
      </form>

    </div>
  </div>
</div>





<?php
include('includes/scripts.php');
include('includes/scripts-topsis.php');
include('includes/footer.php');
?>