<?php
//berfungsi untuk pengaman, biar gak bisa diakses direct ke index php dan halaman lainnya yang sudah di masukin secirity php
//tanpa login dahulu
if($_SESSION['usertype'] == "admin")
{
    header();
}
else
{
    header('Location: index.php');
}