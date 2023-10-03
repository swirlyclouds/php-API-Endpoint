<?php
//$con = mysqli_connect('db','root','root');
//
//mysqli_select_db($con,"services_db");
//$sql = "SELECT * FROM services";
//$result =  mysqli_query($con,$sql);
//
//$payload = [];
//
//while($row = mysqli_fetch_array($result)) {
//    $data = array("Ref"=>$row['Ref'], "Centre" => $row['Centre'], "Service" => $row['Service'], "Country" => $row['Country']);
//    header("Content-Type: application/json");
//    $payload[] = $data;
//}
//
//echo json_encode($payload);
//mysqli_close($con);
//exit();

try {
    $mysqli = new mysqli('db', "root", "root");
} catch (\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


if ($mysqli->select_db('services_db') === false) {
    // Create db
    $sql = "CREATE DATABASE services_db";
    if ($mysqli->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $mysqli->error;
    }
}
else{
    echo "database already exists";
}