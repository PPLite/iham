<!DOCTYPE html>
<html lang="en">
<?php
//Untuk mulai menghitung dari headernya (bagian atas sendiri)
function get_time() {
    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    return $time;
}
$start = get_time();
?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> IHAM Dashboard | Panel Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/googlefont.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/tambahan.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">