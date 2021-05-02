<?php
include('security.php');
include('database/dbconfig.php');
if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email'];
    $password_login = $_post['password'];

    $query = "SELECT * from  register WHERE email='$email_login' AND password='$password_login' ";
    $query_run = mysqli_query($connection, $query);
    $usertypes = mysqli_fetch_array($query_run);

    if($usertypes['usertype'] == "admin")
    {
        $_SESSION['username'] = $email_login;
        header('Loccation: index.php');
    }

    else if ($usertypes ['usertype'] == "pengelola")
    {
        $_SESSION['username']  = $email_login;
        header('Loccation: ../index.html');
    }

    else if ($usertypes ['usertype'] == "pengguna")
    {
        $_SESSION['username']  = $email_login;
        header('Loccation: ../login.php');
    }
    else
    {
        $_SESSION['status'] = "Email / Password anda Salah";
        header('Loccation: login.php');
    }

}
?>