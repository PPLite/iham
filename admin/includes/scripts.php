  <!-- Javascript inti untuk bootstrap-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Javascript inti-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

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

<!---------------JAVASCRIPT UNTUK KONFIGURASI TABEL---------------------->
<!----------Halaman tabel dan pencarian data dalam tabelL---------------->
<script>
$(document).ready(function () {
    $('#datatableid').DataTable();

});
</script>
<!----------------------------------------------------------------------->

<!---------------JAVASCRIPT UNTUK EDIT PENGGUNA------------------->
<script>
$(document).ready(function () {
    $('.editbtn').on('click', function() {

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
    $('.deletebtn').on('click', function() {

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
    $('.editbtnasset').on('click', function() {

        $('#editmodalasset').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#nama_alat').val(data[1]);
            $('#uid').val(data[2]);
            $('#deskripsi').val(data[3]);
            $('#penanggung_jawab').val(data[5]);
            $('#peminjam').val(data[6]);
            $('#status_asset').val(data[7]);

    });
});
</script>
<!--------------------------------------------------------------->