<!---------------JAVASCRIPT UNTUK EDIT KRITERIA------------------->
<script>
$(document).ready(function () {
    $('#tabelkriteria').on('click', '.tomboleditkriteria', function() {

        $('#modaleditkriteria').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#edit_id_kriteria').val(data[0]);
            $('#edit_nama_kriteria').val(data[1]);
            $('#edit_bobot_kriteria').val(data[2]);
            $('#edit_keterangan_kriteria').val(data[3]);
    });
});
</script>
<!--------------------------------------------------------------->

<!---------------JAVASCRIPT UNTUK HAPUS KRITERIA------------------->
<script>
$(document).ready(function () {
    $('#tabelkriteria').on('click','.tombolhapuskriteria', function() {

        $('#modalhapuskriteria').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#hapus_id_kriteria').val(data[0]);
    });
});
</script>
<!---------------JAVASCRIPT UNTUK EDIT VENDOR------------------->
<script>
$(document).ready(function () {
    $('#tabelvendor').on('click', '.tomboleditvendor', function() {

        $('#modaleditvendor').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#edit_no_vendor').val(data[0]);
            $('#edit_vendor').val(data[1]);
            $('#edit_alamat').val(data[2]);
    });
});
</script>
<!--------------------------------------------------------------->

<!---------------JAVASCRIPT UNTUK HAPUS VENDOR------------------->
<script>
$(document).ready(function () {
    $('#tabelvendor').on('click','.tombolhapusvendor', function() {

        $('#modalhapusvendor').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#hapus_no_vendor').val(data[0]);
    });
});
</script>

<!-------------------------JAVASCRIPT BUAT AUTOFILL NAMA VENDOR---------------------->
<!-----------------Autocomplete. didalam $.noConflict() Biar gak tawuran------------->
<script src="js/jquery-1.11.1.min.js"></script>
    <script>
        $.noConflict();
        jQuery( document ).ready(function( $ ) {
        // Code that uses jQuery's $ can follow here.
            $(document).ready(function(){
                $("select#vendor").change(function(){
                    var selectedCountry = $(this).prop('selectedIndex');
                    $("select#no_vendor").prop('selectedIndex',selectedCountry);
                });
            });
        });
        // Code that uses other library's $ can follow here.
    </script>

<!---------------JAVASCRIPT UNTUK HAPUS RANKING VENDOR------------------->
<script>
$(document).ready(function () {
    $('#tabelperingkat').on('click','.tombolhapusperingkat', function() {

        $('#modalhapusperingkat').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#hapus_peringkat_no_vendor').val(data[0]);
    });
});
</script>
<!---------------JAVASCRIPT UNTUK EDIT PENILAIAN VENDOR------------------->
<script>
$(document).ready(function () {
    $('#tabelperingkat').on('click', '.tomboleditperingkatvendor', function() {

        $('#modaleditperingkatvendor').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#edit_no_vendor').val(data[0]);
            $('#id_peringkat').val(data[1]);
            $('#edit_nama_vendor').val(data[2]);

    });
});
</script>
<!--------------------------------------------------------------->
<!------------------------------Eksperimen Javascript -------------->
<!-----------------------Hilangi sebagian tabel ----------------->
