  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

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
<!--------------------------------------------------------------->