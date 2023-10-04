<?php
$resp = json_decode(file_get_contents('php://input'));


if (isset($resp->Ref) and isset($resp->Service) and isset($resp->Country) and isset($resp->Centre)){

    try {
        $mysqli = new mysqli('db', "root", "root");
    } catch (\Exception $e) {
        http_response_code(500);
        echo $e->getMessage(), PHP_EOL;
        exit(1);
    }
    $mysqli->select_db("services_db");


    $sql="insert into services VALUES (" . '"' . "$resp->Ref".'"'.", ".'"'."$resp->Centre".'"'.", ".'"'."$resp->Service".'"'.", ".'"'."$resp->Country".'"'.")";
    if ($mysqli->query($sql) === TRUE) {
        echo "Data inserted successfully";
    }
    else{
        http_response_code(400);
        echo "Error inserting row: " . $mysqli->error;
        exit(1);
    }
}
else{
    http_response_code(400);
    echo "missing parameters from POST request";
    exit(1);
}
