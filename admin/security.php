<?php
session_start();
include('database/dbconfig.php');

if($connection)
{
    //Echo "Database tersambung"
}
else
{
    header("Location: database/dbconfig.php");
}
 
//berfungsi untuk pengaman, biar gak bisa diakses direct ke index pp
//tanpa login dahulu
//if(!$_SESSION['username']);
//{
//    header('Location: login.php');
//}