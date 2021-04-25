<?php
session_start();
//Fungsi tombol keluar
if(isset($_POST['logout_btn']))
{
    //Berfungsi untuk mengakhiri sesi ketika sudah login
    session_destroy();
    unser($_SESSION['username']);
}
?>