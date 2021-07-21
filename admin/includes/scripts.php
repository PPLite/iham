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

    <!--Inisialisasi Sweet Alert -->
    <script src="js/sweetalert.min.js"></script>
        <?php
        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
        ?>
            <script>
                swal({
                    title   : "<?php echo $_SESSION['status']; ?>",
                    icon    : "<?php echo $_SESSION['status_code']; ?>",
                    button  : "Ok",
                });
            </script>
        <?php
            unset($_SESSION['status']);
    }
    ?>

<!-------AKORDION / Dan lain-lain---------->

<!---------------JAVASCRIPT UNTUK KONFIGURASI TABEL---------------------->
<!----------Halaman tabel dan pencarian data dalam tabelL---------------->
<script>
$(document).ready(function () {
    $('#dataaset, #tabelpengguna, #tabelasetbayi, #tabelstatuscan, #tabelhasiltopsis, #tabelnilaipreferensi').DataTable();
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

<!---------------JAVASCRIPT UNTUK EDIT PERAWAT------------------->
<script>
$(document).ready(function () {
    $('#tabelperawat').on('click','.tomboleditperawat', function() {

        $('#editmodalperawat').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#rfid_uid').val(data[1]);
            $('#nama_perawat').val(data[2]);
            $('#id_perawat').val(data[3]);
            $('#jenis_kelamin').val(data[4]);
            $('#alamat').val(data[5]);
            $('#status').val(data[6]);

    });
});
</script>
<!--------------------------------------------------------------->

<!---------------JAVASCRIPT UNTUK HAPUS PASIEN DEWASA---------------->
  <script>
$(document).ready(function () {
    $('#tabelpasien').on('click','.tombolhapuspasien', function() {

        $('#deletemodalpasien').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#hapus_id_pasien').val(data[0]);
    });
});
</script>
<!-------------------------------------------------------------------->

<!---------------JAVASCRIPT UNTUK EDIT PASIEN DEWASA------------------->
<script>
$(document).ready(function () {
    $('#tabelpasien').on('click','.tomboleditpasien', function() {

        $('#editmodalpasien').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#rfid_uid').val(data[1]);
            $('#nama_pasien').val(data[2]);
            $('#id_pengenal').val(data[3]);
            $('#usia').val(data[4]);
            $('#jenis_kelamin').val(data[5]);
            $('#tinggi_badan').val(data[6]);
            $('#berat_badan').val(data[7]);
            $('#alamat').val(data[8]);
            $('#status').val(data[9]);

    });
});
</script>
<!--------------------------------------------------------------->

<!---------------JAVASCRIPT UNTUK HAPUS PERAWAT---------------->
  <script>
$(document).ready(function () {
    $('#tabelperawat').on('click','.tombolhapusperawat', function() {

        $('#deletemodalperawat').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#hapus_id_perawat').val(data[0]);
    });
});
</script>
<!-------------------------------------------------------------------->

<!---------------JAVASCRIPT UNTUK EDIT DOKTER------------------->
<script>
$(document).ready(function () {
    $('#tabeldokter').on('click','.tomboleditdokter', function() {

        $('#editmodaldokter').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#rfid_uid').val(data[1]);
            $('#nama_dokter').val(data[2]);
            $('#id_dokter').val(data[3]);
            $('#jenis_kelamin_dokter').val(data[4]);
            $('#alamat_dokter').val(data[5]);
            $('#spesialis').val(data[6]);

    });
});
</script>
<!--------------------------------------------------------------->

<!---------------JAVASCRIPT UNTUK HAPUS DOKTER---------------->
  <script>
$(document).ready(function () {
    $('#tabeldokter').on('click','.tombolhapusdokter', function() {

        $('#deletemodaldokter').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#hapus_id_dokter').val(data[0]);
    });
});
</script>
<!-------------------------------------------------------------------->

<!---------------JAVASCRIPT UNTUK EDIT KARYAWAN------------------->
<script>
$(document).ready(function () {
    $('#tabelkaryawan').on('click','.tomboleditkaryawan', function() {

        $('#editmodalkaryawan').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#rfid_uid').val(data[1]);
            $('#nama_karyawan').val(data[2]);
            $('#id_pengenal').val(data[3]);
            $('#usia').val(data[4]);
            $('#posisi').val(data[5]);
            $('#alamat').val(data[6]);
            $('#status').val(data[7]);

    });
});
</script>
<!--------------------------------------------------------------->

<!---------------JAVASCRIPT UNTUK HAPUS KARYAWAN---------------->
  <script>
$(document).ready(function () {
    $('#tabelkaryawan').on('click','.tombolhapuskaryawan', function() {

        $('#deletemodalkaryawan').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#hapus_id_karyawan').val(data[0]);
    });
});
</script>
<!-------------------------------------------------------------------->






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
<!----------SCRIPT TOLAK VALIDASI ASET (barang) ------------->
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
            //$('#peminjam').val(data[6]);
            //$('#keterangan').val(data[7]);
    });
});
</script>

<!----------SCRIPT Terima VALIDASI ASET (barang) ------------->
<script>
$(document).ready(function () {
    $('#validasiaset').on('click','.terimavalidasiaset', function() {

        $('#validasiasetmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            $('#id_v').val(data[0]);
            $('#rfid_uid_v').val(data[1]);
            $('#nama_alat_v').val(data[2]);
            $('#deskripsi_v').val(data[3]);
            $('#penanggung_jawab_v').val(data[4]);
            $('#status_asset_v').val(data[5]);
            $('#peminjam_v').val(data[6]);
            $('#keterangan_v').val(data[7]);
    });
});
</script>

















<!---------------BUAT CEK EMAIL APA SUDAH TERDAFTAR APA BELUM------------------->
<script>
$(document).ready(function(){

    $('.check_email').keyup(function(e){
        
        var email = $('.check_email').val();
        //alert(email);

        $.ajax({
            type    : "POST",
            url     : "code.php",
            data    : {
                        "check_submit_btn" : 1,
                        "email_id" : email,
                    },
                    success : function (response){
                    //alert(response);
                    $('.error_email').text(response);
                    }
        });
    });
});
</script>

<!---------------BUAT CEK NAMA APA SUDAH TERDAFTAR APA BELUM------------------->
<script>
$(document).ready(function(){

    $('.check_nama').keyup(function(e){
        
        var nama = $('.check_nama').val();
        //alert(email);

        $.ajax({
            type    : "POST",
            url     : "code.php",
            data    : {
                        "check_submit_btn_namaregistrasi" : 1,
                        "nama_id" : nama,
                    },
                    success : function (response){
                    //alert(response);
                    $('.error_nama').text(response);
                    }
        });
    });
});
</script>

<!---------------BUAT CEK RFID TAG (ASET BARANG) APA SUDAH TERDAFTAR APA BELUM------------------->
<script>
$(document).ready(function(){

    $('.check_rfid_barang').keyup(function(e){
        
        var rfid_uid = $('.check_rfid_barang').val();
        //alert(email);

        $.ajax({
            type    : "POST",
            url     : "code.php",
            data    : {
                        "check_btn_namarfidbarang" : 1,
                        "rfid_uid" : rfid_uid,
                    },
                    success : function (response){
                    //alert(response);
                    $('.error_rfid').text(response);
                    }
        });
    });
});
</script>
