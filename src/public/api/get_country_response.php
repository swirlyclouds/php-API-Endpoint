<?php
try{
  $db = new PDO('mysql:host=db;dbname=services_db','root','root');
}
catch(\PDOException $e){
  throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

if(!isset($_GET['country_code'])){
  http_response_code(400);
  echo "no country code provided";
  exit();
}
$country = $_GET['country_code'];

$query = 'SELECT * FROM services WHERE Country = :country';
$stmt = $db->prepare($query);
$stmt->bindValue(':country', $country);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($results);
