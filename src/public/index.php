<?php

try{
    // connect to SQL database as root user
    $db = new PDO('mysql:host=db','root','root');
    // Make sure database for services is available and active
    $db->query("CREATE DATABASE IF NOT EXISTS services_db");
    $db->query("use services_db");
}
catch(\PDOException $e){
    // failed to establish connection to database
    http_response_code(500);
    throw new \PDOException($e->getMessage());
}

// Ensure table exists

$sql = "CREATE TABLE IF NOT EXISTS services (
    Ref char(7) NOT NULL PRIMARY KEY,
    Centre varchar(255) NOT NULL,
    Service varchar(255) NOT NULL,
    Country char(2) NOT NULL
);";

$db->prepare($sql)->execute();

// Add all data from services.csv to database if not already in database

if(($handle = fopen("services.csv", "r")) !== FALSE) {
    $n = 0;
    while(($row = fgetcsv($handle))!== FALSE) {

        if($n > 0){
            $stmt = $db->prepare("SELECT * FROM services WHERE Ref=:reference");
            $stmt->bindValue(":reference", $row[0]);
            $stmt->execute();
            
            if($stmt->rowCount() == 0){
                $db->prepare('INSERT INTO services VALUES ("'.$row[0].'","'.$row[1].'", "'.$row[2].'","'.$row[3].'")')->execute();
            }
        }
        $n += 1;
    }
}