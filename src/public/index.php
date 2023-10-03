<?php
$con = mysqli_connect('db','root','root');

mysqli_select_db($con,"services_db");
$sql = "SELECT * FROM services";
$result =  mysqli_query($con,$sql);

$payload = [];

while($row = mysqli_fetch_array($result)) {
    $data = array("Ref"=>$row['Ref'], "Centre" => $row['Centre'], "Service" => $row['Service'], "Country" => $row['Country']);
    header("Content-Type: application/json");
    $payload[] = $data;
}

echo json_encode($payload);
mysqli_close($con);
exit();