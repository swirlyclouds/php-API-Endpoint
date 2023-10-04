<?php
$resp = json_decode(file_get_contents('php://input'));


if (isset($resp->Ref) and isset($resp->Service) and isset($resp->Country) and isset($resp->Centre)){
        try{
            $db = new PDO('mysql:host=db;dbname=services_db','root','root');
        }
        catch(\PDOException $e){
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        $stmt = $db->prepare('INSERT INTO services (Ref, Centre, Service, Country)
                              VALUES (:ref, :centre, :service, :country)');
        
        $stmt->bindValue(':ref', $resp->Ref);
        $stmt->bindValue(':centre', $resp->Centre);
        $stmt->bindValue(':service', $resp->Service);
        $stmt->bindValue(':country', $resp->Country);
        try{
            $stmt->execute();
        }
        catch(\PDOException $e){
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
}
else{
    http_response_code(400);
    echo "missing parameters from POST request";
    exit(1);
}
