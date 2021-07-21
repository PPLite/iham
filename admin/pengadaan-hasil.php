<?php
include('database/dbconfig.php');
include('security.php');
include('includes/header.php');
include('includes/navbar.php');

$query = "select * from tb_peringkat ";
$result = mysqli_query($connection, $query);
?>

<!--  -->

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Penilainan Vendor menggunakan TOPSIS
            </h6>
        </div>

        <div class="card-body">
            <div id="page-wrapper">
                <div class="main-page">
                    <div class="tables">
                        <!-- ITUNG-ITUNGAN BOS -->
                        <div class="panel-body widget-shadow">
                            <?php
                            ////////////hitung normalisasi///////////////////////////////
                            $query = "select * from tb_kriteria";
                            $result = mysqli_query($connection, $query);
                            $no_vendor = "";
                            $no = 0;
                            $kriterialist = array();
                            $kritlist = array();
                            while ($data = mysqli_fetch_array($result)) {
                                $kriterialist[$no] = $data['nama_kriteria'];
                                $bobot[$no] = $data['bobot'];
                                $kritlist[$no] = $data['tipe_kriteria'];
                                $no++;
                            }

                            for ($i = 0; $i < count($kriterialist); $i++) {
                                ${$kriterialist[$i]} = array();
                                $query2 = "select * from tb_peringkat where nama_kriteria='" . $kriterialist[$i] . "'";
                                $result2 = mysqli_query($connection, $query2);
                                $no = 0;

                                while ($dt1 = mysqli_fetch_array($result2)) {
                                    ${$kriterialist[$i]}[$no] = $dt1['nilai'];
                                    $nama[$no] = $dt1['no_vendor'];
                                    $no++;
                                }
                                ${'x' . $i} = array();
                                $c = count(${$kriterialist[$i]});
                            }

                            //////////////////////Perhitungan Normalisasi aja/////////////////////////////
                            for ($i = 0; $i < count($kriterialist); $i++) {
                                for ($b = 0; $b < count(${$kriterialist[$i]}); $b++) {
                                    ${'x' . $i}[$b] = ${$kriterialist[$i]}[$b] * ${$kriterialist[$i]}[$b];
                                }
                                ${'xplus' . $i} = 0;
                            }
                            for ($i = 0; $i < count($kriterialist); $i++) {
                                for ($b = 0; $b < count(${$kriterialist[$i]}); $b++) {
                                    ${'xplus' . $i} += ${'x' . $i}[$b];
                                }
                            }
                            for ($i = 0; $i < count($kriterialist); $i++) {
                                for ($b = 0; $b < count(${$kriterialist[$i]}); $b++) {
                                    ${'xsqrt' . $i} = sqrt(${'xplus' . $i});
                                }
                            }
                            for ($i = 0; $i < count($kriterialist); $i++) {
                                for ($b = 0; $b < count(${$kriterialist[$i]}); $b++) {
                                    ${'R' . $i}[$b] = ${$kriterialist[$i]}[$b] / ${'xsqrt' . $i};
                                }
                            }

                            ////////////////////Perhitungan Normalisasi Terbobot//////////////////////////////
                            for ($i = 0; $i < count($kriterialist); $i++) {
                                for ($b = 0; $b < count(${$kriterialist[$i]}); $b++) {
                                    ${'r' . $i}[$b] = $bobot[$i] * ${'R' . $i}[$b];
                                }
                            }

                            //////////////////////////////Pencarian max min positif dan negatif////////////////////////
                            for ($i = 0; $i < count($kriterialist); $i++) {
                                if ($kritlist[$i] == "Benefit") {
                                    $YPOS[$i] = max(${'r' . $i});
                                    $YNEG[$i] = min(${'r' . $i});
                                } elseif ($kritlist[$i] == "Cost") {
                                    $YPOS[$i] = min(${'r' . $i});
                                    $YNEG[$i] = max(${'r' . $i});
                                }
                                ${'P' . $i} = array();
                            }
                            ///////////////////////Perhitungan Positif///////////////////////////////
                            for ($i = 0; $i < $c; $i++) {
                                ${'D' . $i . 'Pos'} = 0;
                                for ($b = 0; $b < count($kriterialist); $b++) {
                                    ${'P' . $i}[$b] = $YPOS[$b] - ${'r' . $b}[$i];
                                    ${'P' . $i}[$b] *= ${'P' . $i}[$b];
                                    ${'D' . $i . 'Pos'} += ${'P' . $i}[$b];
                                }
                                ${'hasilD' . $i . 'Pos'} = sqrt(${'D' . $i . 'Pos'});
                            }

                            //////////////////////Perhitungan Negatif////////////////////////////////
                            for ($i = 0; $i < $c; $i++) {
                                ${'D' . $i . 'Neg'} = 0;
                                for ($b = 0; $b < count($kriterialist); $b++) {
                                    ${'L' . $i}[$b] =  ${'r' . $b}[$i] - $YNEG[$b];
                                    ${'L' . $i}[$b] *= ${'L' . $i}[$b];
                                    ${'D' . $i . 'Neg'} += ${'L' . $i}[$b];
                                }
                                ${'hasilD' . $i . 'Neg'} = sqrt(${'D' . $i . 'Neg'});
                            }

                            /////////////////////////////Hitung V//////////////////////////////////
                            for ($i = 0; $i < $c; $i++) {
                                $V[$i] = ${'hasilD' . $i . 'Neg'} / (${'hasilD' . $i . 'Neg'} + ${'hasilD' . $i . 'Pos'});
                            }
                            ?>

                            <!--------------------------- AKHIR ITUNG ITUNGAN----------------- -->


                            <!------------ TABEL 1 DATA RANGKING (HASIL DARI TB_KRITERIA + TB_PERINGKAT TAMPILIN KESINI SEMUA) ------->
                            <h4>Tabel Penilaian</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>

                                        <th>No</th>
                                        <th>No Vendor</th>
                                        <th>Nama Vendor</th>

                                        <?php
                                        $query2 = "select * from tb_kriteria";
                                        $result2 = mysqli_query($connection, $query2);
                                        while ($dt1 = mysqli_fetch_array($result2)) {
                                            echo "<th>$dt1[nama_kriteria]</th>";
                                        }
                                        ?>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "select * from tb_peringkat ";
                                        $result = mysqli_query($connection, $query);
                                        $no = 1;
                                        $no_vendor = "";
                                        while ($data = mysqli_fetch_array($result)) {
                                            if ($no_vendor == $data['no_vendor']) {
                                            } else {
                                                $query3 = "select * from tb_peringkat where no_vendor='" . $data['no_vendor'] . "' ";
                                                $result3 = mysqli_query($connection, $query3);
                                        ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $data['no_vendor']; ?></td>
                                                    <td><?php echo $data['nama_peserta']; ?></td>
                                                    <?php
                                                    while ($dt2 = mysqli_fetch_array($result3)) {
                                                        echo '<td>' . $dt2['nilai'] . '</td>';
                                                    }
                                                    ?>
                                                </tr>
                                        <?php
                                            }
                                            $no_vendor = $data['no_vendor'];
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <!---------------------------------AKHIR TABEL PERTAMA-------------------------------------------------------------->

                            <!-- Semacam pembatas-->
                            <BR>
                            <!-- akhir pembatas -->

                            <!------------------------TABEL TERNORMALISASI------------------------------------------------------->
                            <h4>Tabel Normalisasi</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered" style="font-size: 13px">
                                    <thead>

                                        <th>No Vendor</th>
                                        <?php
                                        for ($i = 0; $i < count($kriterialist); $i++) {
                                            echo "<th>Kriteria " . ($i + 1) . "</th>";
                                        }
                                        ?>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < $c; $i++) {
                                            echo "<tr>";
                                            echo '<td>' . $nama[$i] . '</td>';
                                            for ($b = 0; $b <= count($kriterialist) - 1; $b++) {
                                                echo '<td>' . number_format((float)${'R' . $b}[$i], 5, '.', '') . '</td>';
                                            }
                                            echo '</tr>';
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-------------------------------------------- AKHIR TABEL TERNORMALISASI------------------------------>

                            <!-- Semacam pembatas-->
                            <BR>
                            <!-- akhir pembatas -->

                            <!------------------------TABEL NORMALISASI TERBOBOT------------------------------------------------------->
                            <h4>Normalisasi Terbobot</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered" style="font-size: 13px">
                                    <thead>

                                        <th>No Vendor</th>
                                        <?php
                                        for ($i = 0; $i < count($kriterialist); $i++) {
                                            echo "<th>Kriteria " . ($i + 1) . "</th>";
                                        }
                                        ?>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < $c; $i++) {
                                            echo "<tr>";
                                            echo '<td>' . $nama[$i] . '</td>';
                                            for ($b = 0; $b < count($kriterialist); $b++) {
                                                echo '<td>' . number_format((float)${'r' . $b}[$i], 5, '.', '') . '</td>';
                                            }
                                            echo '</tr>';
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--------------------------------------------AKHIR TABEL NORMALISASI TERBOBOT------------------------------------------------------->

                            <!-- Semacam pembatas-->
                            <BR>
                            <!-- akhir pembatas -->

                            <!-------------------------------------------------MATRIK SOLUSI IDEAL POSITIF DAN NEGATIF------------------------------------------------------->
                            <h4>Menentukan matrik solusi ideal positif dan negatif</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Kriteria</th>
                                        <th>A+</th>
                                        <th>A-</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < count($kriterialist); $i++) {
                                            echo "<tr>
                                      <th>Kriteria " . ($i + 1) . "</th>
                                      <td>" . number_format((float)$YPOS[$i], 5, '.', '') . "</td>
                                      <td>" . number_format((float)$YNEG[$i], 5, '.', '') . "</td>
                                      </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--------------------------------------------AKHIR TABEL NORMALISASI TERBOBOT------------------------------------------------------->

                            <!-- Semacam pembatas-->
                            <BR>
                            <!-- akhir pembatas -->

                            <!------------------------------------------------- Nilai Preferensi------------------------------------------------------->
                            <h4>Nilai Prevensi</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabelnilaipreferensi" width="100%" cellspacing="0">
                                    <thead>
                                        <th>No Vendor</th>
                                        <th>V</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < $c; $i++) {
                                            echo "<tr><th>$nama[$i]</th><td>" . number_format((float)$V[$i], 5, '.', '') . "</td></td>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-------------------------------------------------Akhir Nilai Preferensi------------------------------------------------------->
                            <BR>
                            <!-------------------Rumus Peringkat (Backend / Gak nampil di web)----------------------------------->
                            <?php
                            $ordered_values = $V;
                            rsort($ordered_values);
                            $t = 0;
                            foreach ($V as $key => $value) {
                                foreach ($ordered_values as $ordered_key => $ordered_value) {
                                    if ($value === $ordered_value) {
                                        $key = $ordered_key;
                                        break;
                                    }
                                }
                                $Peringkat[$t] = ((int) $key + 1);
                                $t++;
                            }
                            ?>
                            <!-------------------Akhir Rumus Peringkat---------------------------------->
                            <!------------------------------------------------- Tabel Peringkat------------------------------------------------------->
                            <h4>Peringkat</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabelhasiltopsis" width="100%" cellspacing="0">
                                    <thead>
                                        <th>No Vendor</th>
                                        <th>Hasil</th>
                                        <th>Peringkat</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < $c; $i++) {
                                            echo "<tr>";
                                            echo "<td>" . $nama[$i] . "</td>";
                                            echo "<td>" . number_format((float)$V[$i], 5, '.', '') . "</td>";
                                            echo "<td>" . $Peringkat[$i] . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-------------------------------------------------AKHIR Tabel Peringkat------------------------------------------------------->
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
include('includes/scripts.php');
include('includes/footer.php');
?>