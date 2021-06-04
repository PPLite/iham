<?php
$server = "localhost";
$username = "root" ;
$password = "" ;
$database = "ukm";
$con = new mysqli($server,$username,$password,$database);
if($con->connect_error){
 die("Koneksi gagal: ".$con->connect_error);
}
 
if (isset($_REQUEST['query'])) {
 $query = $_REQUEST['query'];
 $sql = $con->query ("SELECT * FROM user WHERE  namaUser LIKE '%{$query}%' AND level !='1'");
 $array = array();
 while ($row = $sql->fetch_assoc()) {
 $array[] = array (
 'label' => $row['namaUser'],
 'value' => $row['namaUser'],
 );
 }
 //RETURN JSON ARRAY
 echo json_encode ($array);
}
 
?>