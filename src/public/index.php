<?php

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
        $sql = "CREATE TABLE IF NOT EXISTS services (
                    Ref varchar(10) NOT NULL PRIMARY KEY,
                    Centre varchar(255) NOT NULL,
                    Service varchar(255) NOT NULL,
                    Country varchar(2) NOT NULL
                );";
        if ($mysqli->query($sql) === TRUE) {
            echo "Table created successfully";
        }
    echo "database already exists";
}


// Add rows
$mysqli->query('insert into services VALUES ("APPLAB1","Aperture Science", "Portal Technology", "fr");');
$mysqli->query('insert into services VALUES ("BMELAB1", "Black Mesa", "Interdimensional Travel", "de");');
$mysqli->query('insert into services VALUES ("BMELAB2", "Black Mesa", "Interdimensional Travel", "DE");');
$mysqli->query('insert into services VALUES ("WEYLAB1", "Weyland Yutani Research", "Xeno-biology", "gb");');
$mysqli->query('insert into services VALUES ("BLULAB3", "Blue Sun R&D", "Behaviour Modification", "cz");');
$mysqli->query('insert into services VALUES ("TYRLAB2","Tyrell Research","Synthetic Consciousness","GB");');

?>

<html>
<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getcountry.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>

<form>
<select name="users" onchange="showUser(this.value)">
  <option value="">Select a person:</option>
  <option value="de">de</option>
  <option value="cz">cz</option>
  <option value="fr">fr</option>
  <option value="gb">gb</option>
  </select>
</form>
<div id="txtHint"><b>Person info will be listed here...</b></div>
</html>