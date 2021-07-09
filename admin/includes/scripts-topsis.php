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