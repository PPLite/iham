<?php
session_start();
$connection = mysqli_connect("localhost","mjdr3247_admin","Ah-9]yg$!?eAquF^{u","mjdr3247_adminpanel");
if(isset($_POST['registerbtn']))
//Jika tombol register'registerbtn' ditekan, maka akan memberikan data ke database berupa...
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    //data yang akan dikirim ke database berupa username, email, password
    //cpassword digunakan untuk melakukan pengulangan password
        $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
        $query_run = mysqli_query($connection, $querry);

        
    if($password === $cpassword)
    {  
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