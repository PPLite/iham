<?php
include('database/dbconfig.php');
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Penilaian Peserta Vendor Pengadaan Barang
            </h6>
        </div>

        <!-- Buat nambah tombol kriteria baru -->
        <div class="card-header py-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambahranking">
                Tambah Penilaian Baru
            </button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalhapusemuaperingkat">
                Hapus Semua Penilaian
            </button>
        </div>
        <!-- akhir tombol kriteria -->

        <div class="card-body">

            <div class="table-responsive">

                <!---Buat ngambil data--->

                <div id="page-wrapper">
                    <div class="main-page">
                        <div class="tables">
                            <div class="panel-body widget-shadow">
                                <table class="table table-bordered" id="tabelperingkat">
                                    <thead>

                                        <th>No Vendor</th>
                                        <th style="display:none;">ID Peringkat</th>
                                        <th>Nama Vendor</th>

                                        <?php
                                        $query = "select * from tb_peringkat ";
                                        $result = mysqli_query($connection, $query);

                                        $query2 = "select * from tb_kriteria";
                                        $result2 = mysqli_query($connection, $query2);
                                        while ($dt1 = mysqli_fetch_array($result2)) {
                                            echo "<th>$dt1[nama_kriteria]</th>";
                                        }

                                        ?>

                                        <th>Ubah</th>
                                        <th>Hapus</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no_vendor = "";
                                        while ($data = mysqli_fetch_array($result)) {
                                            if ($no_vendor == $data['no_vendor']) {
                                            } else {
                                                $query3 = "select * from tb_peringkat where no_vendor='" . $data['no_vendor'] . "' ";
                                                $result3 = mysqli_query($connection, $query3);
                                        ?>
                                                <tr>
                                                    <td><?php echo $data['no_vendor']; ?></td>
                                                    <td style="display:none;"><?php echo $data['id_peringkat']; ?></td>
                                                    <td><?php echo $data['nama_peserta']; ?></td>
                                                    <?php
                                                    while ($dt2 = mysqli_fetch_array($result3)) {
                                                        echo '<td>' . $dt2['nilai'] . '</td>';
                                                    }
                                                    ?>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-flat tomboleditperingkatvendor"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-flat tombolhapusperingkat"><i class="far fa-trash-alt">
                                                    </td>
                                                </tr>

                                        <?php
                                            }
                                            $no_vendor = $data['no_vendor'];
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->

    <!-------------------------------------MODAL BUAT TAMBAH RANKING-----------------------  -->
    <div class="modal fade" id="modaltambahranking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Penilaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code-topsis.php" method="POST">

                    <div class="modal-body">
                        <P class="h5 mb-0 text-gray-800" style="text-align: center">Form Penilaian Vendor </P>
                        <P class="h6 mb-0 text-gray-800" style="text-align: center">Isi Penilaian dengan Angka 1 hingga 5 </P>
                        <br>
                        <div class="form-group">
                            <label for="">Nama Vendor :</label>
                            <select class="form-control" id="vendor" name="vendor">
                                <?php
                                $query = "select * from tb_peserta ";
                                $result = mysqli_query($connection, $query);
                                while ($data = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?php echo $data['vendor'] ?>">
                                        <?php echo $data['vendor'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">

                            <select class="form-control" id="no_vendor" name="no_vendor" style="display:none">
                                <?php
                                $query = "select * from tb_peserta ";
                                $result = mysqli_query($connection, $query);
                                while ($data = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?php echo $data['no_vendor'] ?>">
                                        <?php echo $data['no_vendor'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <?php
                        $query1 = mysqli_query($connection, "select * from tb_kriteria");
                        while ($data = mysqli_fetch_array($query1)) {
                            echo '<div class="form-group">';
                            echo '<label for="">' . $data['nama_kriteria'] . '</label>';
                            $stripped = str_replace(' ', '', $data['nama_kriteria']);
                            echo '<input    type="number"
                                min="1" 
                                max="5" 
                                class="form-control" 
                                id="nilai" 
                                name="' . $stripped . '" 
                                placeholder="' . $data['keterangan'] . '"
                                required="true"
                        >';
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="tambahranking" class="btn btn-success">Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<!------------------------------FUNGSI UNTUK HAPUS RANKING------------------------------------->
<div class="modal fade" id="modalhapusperingkat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Peringkat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code-topsis.php" method="POST">

                <div class="modal-body">
                   <h5> Apakah anda yakin untuk menghapus data Peringkat ini?</h5>
                    <h6> Data yang sudah terhapus tidak dapat dikembalikan</h6>
                </div>

                <input type="text" name="hapus_peringkat_no_vendor" id="hapus_peringkat_no_vendor">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="hapusperingkat" class="btn btn-danger">Hapus</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!------------------------------FUNGSI UNTUK HAPUS SEMUA RANKING------------------------------------->
<div class="modal fade" id="modalhapusemuaperingkat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Semua Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code-topsis.php" method="POST">

                <div class="modal-body">
                   <h5> Apakah anda yakin untuk menghapus Seluruh Data Penilaian Ini?</h5>
                    <h6> Data yang sudah terhapus tidak dapat dikembalikan</h6>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="hapusemuaperingkat" class="btn btn-danger">Hapus</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!------------------------------FUNGSI UNTUK edit (MODAL)------------------------------------->
<div class="modal fade" id="modaleditperingkatvendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Penilaian Vendor</a></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code-topsis.php" method="POST">

                <div class="modal-body">
                    <P class="h5 mb-0 text-gray-800" style="text-align: center">Form Ubah Penilaian Vendor </P>
                    <P class="h6 mb-0 text-gray-800" style="text-align: center">Isi Penilaian dengan Angka 1 hingga 5 </P>
                        <br>
                    <div class="form-group">
                        <label> No Vendor </label>
                        <input type="text" name="id_peringkat" id="edit_no_vendor" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label> Nama Vendor </label>
                        <input type="text" name="edit_nama_vendor" id="edit_nama_vendor" class="form-control" readonly>
                    </div>

                    <?php
                        $query1 = mysqli_query($connection, "select * from tb_kriteria");
                        while ($data = mysqli_fetch_array($query1)) {
                            echo '<div class="form-group">';
                            echo '<label for="">' . $data['nama_kriteria'] . '</label>';
                            $stripped = str_replace(' ', '', $data['nama_kriteria']);
                            echo '<input    type="number"
                                min="1" 
                                max="5" 
                                class="form-control" 
                                id="nilai" 
                                name="' . $stripped . '" 
                                placeholder="' . $data['keterangan'] . '"
                                required="true"
                        >';
                            echo "</div>";
                        }
                        ?>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="editranking" class="btn btn-success">Ubah</button>
                </div>
            </form>

        </div>
    </div>
</div>





<?php
include('includes/scripts.php');
include('includes/scripts-topsis.php');
include('includes/footer.php');
?>`