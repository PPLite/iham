<!DOCTYPE html>
<html>
<head>
  <title>jQuery Chosen autocomplete with PHP and AJAX - pakainfo.com</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
<h1>jQuery Chosen autocomplete with PHP and AJAX</h1> 
<div class="container pakainfo">
  <div class="pakainfo panel panel-primary">
    <div class="panel-heading">jQuery Chosen autocomplete with PHP and AJAX - pakainfo.com</div>
    <div class="panel-body pakainfo">
      <form>
        <select class="form-control pakainfo select-box">
          <option>Select Products</option>
        </select>
      </form>
    </div>
  </div>
</div>
 
<script type="text/javascript">
  $(".select-box").chosen();
 
  $('.chosen-search input').autocomplete({
    source: function( request, response ) {
      $.ajax({
        url: "ajaxpro.php?name="+request.term,
        dataType: "json",
        success: function( data ) {
          $('.select-box').empty();
          response( $.map( data, function( product ) {
            $('.select-box').append('<option value="'+product.id+'">' + product.name + '</option>');
          }));
          $(".select-box").trigger("chosen:updated");
        }
      });
    }
  });
</script>
 
</body>
</html>