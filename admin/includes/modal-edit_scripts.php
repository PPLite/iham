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