<?php
session_start();
$connection = mysqli_connect("localhost","root","adminpanel");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if($password === $cpassword)
    {
        $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
        $query_run = mysqli_query($connection, $querry);
    
        if($query_run)
        {
            //echo "Disimpan";
            $_SESSION['success'] = "Profil berhasil disimpan";
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] = "Profil gagal disimpan";
            header('Location: register.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Password dan Konfirmasi Password tidak sesuai";
        header('location: register.php');
    }


}