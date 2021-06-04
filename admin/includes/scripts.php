  <!-- Javascript inti untuk bootstrap-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Javascript inti-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>

<!--Javascript Buat Alarm-->

  
  <!-- Javascript untuk semua web-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Modul Halaman pada web -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Modul Tabel -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Modul Font pada Web -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

<!-- Python??
<script type="text/javascript" src="js/brython.js"></script>
<script type="text/javascript" src="js/brython_stdlib.js"></script>
-->







<!---------------JAVASCRIPT UNTUK KONFIGURASI TABEL---------------------->
<!----------Halaman tabel dan pencarian data dalam tabelL---------------->
<script>
$(document).ready(function () {
    $('#dataaset, #tabelpengguna, #tabelasetbayi, #tabelstatuscan').DataTable();

});
</script>
<!----------------------------------------------------------------------->

<script>
$(document).ready(function() {
    $('#tabelrfidscan1, #tabelrfidscan3').DataTable( {
        "order": [[ 7, "desc" ]]
    } );
} );
</script>

<script>
$(document).ready(function() {
    $('#tabelrfidscan2, #tabelrfidscan4').DataTable( {
        "order": [[ 8, "desc" ]]
    } );
} );
</script>

<!---------------JAVASCRIPT UNTUK EDIT PENGGUNA------------------->
<script>
$(document).ready(function () {
    $('#tabelpengguna').on('click','.editbtn', function() {

        $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#username').val(data[1]);
            $('#email').val(data[2]);
            $('#password').val(data[3]);
            $('#usertype').val(data[4]);

    });
});
</script>
<!--------------------------------------------------------------->

<!---------------JAVASCRIPT UNTUK HAPUS PENGGUNA------------------->
  <script>
$(document).ready(function () {
    $('#tabelpengguna').on('click','.deletebtn', function() {

        $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#hapus_id').val(data[0]);
    });
});
</script>
<!-------------------------------------------------------------------->

<!---------------JAVASCRIPT UNTUK EDIT ASET (BARANG)------------------->
<script>
$(document).ready(function () {
    $('#dataaset').on('click', '.editbtnasset', function() {

        $('#editmodalasset').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#nama_alat').val(data[1]);
            $('#rfid_uid').val(data[2]);
            $('#deskripsi').val(data[3]);
            $('#penanggung_jawab').val(data[5]);
            $('#peminjam').val(data[6]);
            $('#status_asset').val(data[7]);
            $('#keterangan').val(data[8]);

    });
});
</script>
<!--------------------------------------------------------------->
<!---------------JAVASCRIPT UNTUK HAPUS ASSET (BARANG)------------------->
<script>
$(document).ready(function () {
    $('#dataaset').on('click','.deletebtnasset', function() {

        $('#deletemodalasset').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#hapus_id_asset').val(data[0]);
    });
});
</script>
<!-------------------------------------------------------------------->
<!---------------JAVASCRIPT UNTUK EDIT ASET (BAYI)------------------->
<script>
$(document).ready(function () {
    $('#tabelasetbayi').on('click', '.editbtnassetbayi', function() {

        $('#modalasetbayi').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#rfid_uid').val(data[1]);
            $('#id_pengenal').val(data[2]);
            $('#nama_anak').val(data[3]);
            $('#nama_ibu').val(data[4]);
            $('#penanggung_jawab_bayi').val(data[5]);
            $('#alamat').val(data[6]);
            $('#status').val(data[8]);
            $('#keterangan').val(data[9]);

    });
});
</script>
<!--------------------------------------------------------------->
<!---------------JAVASCRIPT UNTUK HAPUS ASSET (BAYI)------------------->
<script>
$(document).ready(function () {
    $('#tabelasetbayi').on('click','.deletebtnassetbayi', function() {

        $('#deletemodalassetbayi').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#hapus_id_asset_bayi').val(data[0]);
    });
});
</script>
<!---------------BUAT BACKGROUND MONITORING------------------->
<style>
.responsive {
    width: 100%;
  height: 100%;
}
</style>
<!---------------HALAMAN FORM PEMINJAMAN, BIAR YG LAIN NYANGKUT----------------
                          <script>
                          <?php
                          //echo $a;
                          //echo $b;
                          //echo $c;
                          ?>  
                          function changeValue(id){  
                            document.getElementById('deskripsi').value = deskripsi[id].deskripsi;
                            document.getElementById('nama_alat').value = nama_alat[id].nama_alat; 
                            document.getElementById('keterangan').value = keterangan[id].keterangan;                         
                          };  
                          </script>

------------BUAT TOLAK ASET BARANG------------------->
<script>
$(document).ready(function () {
    $('#validasiaset').on('click','.tolakvalidasiaset', function() {

        $('#tolakvalidasiasetmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            $('#id').val(data[0]);
            $('#rfid_uid').val(data[1]);
            $('#nama_alat').val(data[2]);
            $('#deskripsi').val(data[3]);
            $('#penanggung_jawab').val(data[4]);
            //$('#status_asset').val(data[5]);
            $('#peminjam').val(data[6]);
            $('#keterangan').val(data[7]);
    });
});
</script>






