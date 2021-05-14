<script>
$(document).ready(function () {
    $('.editbtn').on('click', function() {

        $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id_asset').val(data[0]);
            $('#update_username').val(data[1]);
            $('#update_email').val(data[2]);
            $('#update_password').val(data[3]);
            $('#update_usertype').val(data[4]);

    });
});
</script>