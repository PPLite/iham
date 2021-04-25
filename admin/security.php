<?php
session_start();
//berfungsi untuk pengaman, biar gak bisa diakses direct ke index pp
//tanpa login dahulu
if(!$_SESSION['username'])
{
    header('Location: login.php');
}