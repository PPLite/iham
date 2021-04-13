<?php
session_start();
//inisialisasi sambungan ke database
$connection = mysqli_connect("localhost","mjdr3247_admin","semogacepatlulus2021","mjdr3247_adminpanel");

//registerbtn ditombol
if(isset($_POST['registerbtn']))

//jika sudah ditombol kemudian
{
    //input data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if($password === $cpassword)
    {
         //data yang tadi, dikumpulkan 'query' dan dimasukkan ke database
        $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
        $query_run = mysqli_query($connection,$query);
    
        if($query_run)
        {
        //echo "saved";
        $_SESSION['success'] = "Pengguna berhasil ditambahkan";
        header('location: register.php');
        }
        else
        {
        $_SESSION['status'] = "Pengguna gagal ditambahkan";
        header('location: register.php');
        }
    }
    else 
    {
        $_SESSION['status'] = "Password tidak sesuai";
        header('location: register.php');
    }
}

//Untuk modif data pada pengguna
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE register SET username='$username', email='$email', password='$password' WHERE id='$id' ";
    $querry_run = mysqli_query($connection, $query);

    if($querry_run)
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