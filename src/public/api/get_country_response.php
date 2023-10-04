<?php

$q = strval($_GET['q']);

$con = mysqli_connect('db','root','root');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
  echo "error";
  exit();
}

mysqli_select_db($con,"services_db");
$sql="SELECT * FROM services WHERE Country = '".$q."'";
$result = mysqli_query($con,$sql);
$payload = [];
while($row = mysqli_fetch_array($result)) {
    $data = array(
        "Ref"=>$row['Ref'],
        "Centre"=>$row['Centre'],
        "Service"=>$row['Service'],
        "Country"=>$row['Country']
    );
    $payload[] = $data;
  }

header('Content-Type: application/json; charset=utf-8');
echo json_encode($payload);

mysqli_close($con);
exit();