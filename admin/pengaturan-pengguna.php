<!--------Library------>
<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php');

?>
<!----------Fitur
>  User Management system
-------->

<?php
if ($_SESSION['usertype']=="Admin")
{
    include('halaman/register.php');
}
else if ($_SESSION['usertype']=="engginer") 
{
    include('halaman/register.php');
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




<!--------Library------>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>