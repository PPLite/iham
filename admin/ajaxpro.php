<?php
    
    $hostName = "localhost";
    $username = "mjdr3247_admin";
    $password = "semogacepatlulus2021";
    $dbname = "mjdr3247_adminpanel";
 
    $mysqli = new mysqli($hostName, $username, $password, $dbname); 
    $sql = "SELECT * FROM products WHERE name LIKE '%".$_GET['name']."%'"; 
    $all_result = $mysqli->query($sql);
 
    $data_response = [];
    while($row = mysqli_fetch_assoc($all_result)){
       $data_response[] = array("id"=>$row['id'], "name"=>$row['name']);
    } 
    echo json_encode($data_response);
 
?>