<?php
$resp = json_decode(file_get_contents('php://input'));

// Make sure all columns are defined in the passed JSON
if (isset($resp->Ref) and isset($resp->Service) and isset($resp->Country) and isset($resp->Centre)){
        try{
            $db = new PDO('mysql:host=db;dbname=services_db','root','root');
        }
        catch(\PDOException $e){
            // failed to establish connection to database
            http_response_code(500);
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        try{
            $stmt = $db->prepare('INSERT INTO services (Ref, Centre, Service, Country)
                                  VALUES (:ref, :centre, :service, :country)');
            
            $stmt->bindValue(':ref',        $resp->Ref);
            $stmt->bindValue(':centre',     $resp->Centre);
            $stmt->bindValue(':service',    $resp->Service);
            $stmt->bindValue(':country',    $resp->Country);
            $stmt->execute();
        }
        catch(\PDOException $e){
            // if the error is caused by attempting a duplicate entry
            if ($e->errorInfo[1] == 1062) {
                http_response_code(400);
                die("cannot add duplicate service");
            }
            // throw exception for any other errors
            else{
                throw new \PDOException($e->getMessage(), (int) $e->getCode());
            }
        }
}
else{
    http_response_code(400);
    die("missing parameters from POST request");
}
