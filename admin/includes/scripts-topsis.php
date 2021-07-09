<!---------------JAVASCRIPT UNTUK EDIT KRITERIA------------------->
<script>
$(document).ready(function () {
    $('#tabelkriteria').on('click', '.editkriteria', function() {

        $('#modaleditkriteria').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id_kriteria').val(data[0]);
            $('#nama_Kriteria').val(data[1]);
            $('#tipe_kriteria').val(data[2]);
            $('#bobot').val(data[3]);
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