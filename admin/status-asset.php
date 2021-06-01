<!--------Library------>
<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
?>


<!-------------------Jika Tipe User Admin = Monggo Masuk----------------->
<?php
if ($_SESSION['usertype']=="Admin")
{
?>

    <head>
<script src="js/jquery-latest.js"></script>
<script>
    $(document).ready(function(){
		 $("#div_refresh").load("halaman/mapping.php");
        setInterval(function() {
            $("#div_refresh").load("halaman/mapping.php");
        }, 1000);
    });
</script>
</head>

<body>
    <div id="div_refresh"></div>
</body>
</html>
<!----------------------------------------------------------------------->



<!-------------------Jika Tipe User Enginer = Monggo Masuk----------------->
<?php
}
else if ($_SESSION['usertype']=="engginer") 
{
?>


    <head>
<script src="js/jquery-latest.js"></script>
<script>
    $(document).ready(function(){
		 $("#div_refresh").load("halaman/mapping.php");
        setInterval(function() {
            $("#div_refresh").load("halaman/mapping.php");
        }, 1000);
    });
</script>
</head>

<body>
    <div id="div_refresh"></div>
</body>
</html>
<!----------------------------------------------------------------------->


<!-------------------Jika Tipe User Bukan Keduanya = Parkir Dulu----------------->
<?php
}
else
{
  ?>
<script type="text/javascript">
window.location.href = 'error.php';
</script>
<?php
}
?>
<!----------------------------------------------------------------------->




<!--------Library------>
<?php
include('includes/footer.php');
?>