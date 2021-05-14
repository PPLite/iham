<?php
///////UPDATE PENGGUNA/////////

$connection = mysqli_connect("localhost","mjdr3247_admin","semogacepatlulus2021","mjdr3247_adminpanel");
$db = mysqli_select_db($connection, 'register');
//Untuk modif data pada pengguna
if(isset($_POST['updatepengguna']))

//data apa aja yang diambil dan dimodif
{
    $id = $_POST['id'];

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    //disini pakai $query = update. soalnya buat update data aja. dan apa yang akan diupdate dituliskan setelahnya
    $query = "UPDATE register SET username='$username', email='$email', password='$password', usertype='$usertype' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    //Tampilan status jika dilakukan perubahan data
    if($query_run)
    {
        $_SESSION['success'] = "Data Berhasil diperbarui";
        header('location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Data Gagal diperbarui";
        header('location: register.php');
    }
}
?>
