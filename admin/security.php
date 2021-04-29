<?php
session_start();
//berfungsi untuk pengaman, biar gak bisa diakses direct ke index php dan halaman lainnya yang sudah di masukin secirity php
//tanpa login dahulu
if(!$_SESSION['usertype'] && ['username'])
{
    header('Location: login.php');
}

