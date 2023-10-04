<?php
try{
  $db = new PDO('mysql:host=db;dbname=services_db','root','root');
}
catch(\PDOException $e){
  // failed to establish connection to database
  http_response_code(500);
  throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

// check if country code is provided
if(!isset($_GET['country_code'])){
  http_response_code(400);
  echo "no country code provided";
  exit();
}

// get country code
$country = $_GET['country_code'];

// run SQL query
$query = 'SELECT * FROM services WHERE Country = :country';
$stmt = $db->prepare($query);
$stmt->bindValue(':country', $country);
$stmt->execute();

// Output results as JSON
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($results);
