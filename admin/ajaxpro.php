<?php
    
    $hostName = "localhost";
    $username = "mjdr3247_admin";
    $password = "semogacepatlulus2021";
    $dbname = "testmjdr3247_adminpanel";
 
    $mysqli = new mysqli($hostName, $username, $password, $dbname);
 
    $sql = "SELECT * FROM countries WHERE name LIKE '%".$_GET['name']."%'";
 
    $result = $mysqli->query($sql);
 
    $response = [];
    while($row = mysqli_fetch_assoc($result)){
       $response[] = array("id"=>$row['id'], "name"=>$row['name']);
    }
 
    echo json_encode($response);
 
?>