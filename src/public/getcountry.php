<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

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

echo "<table>
<tr>
<th>Ref</th>
<th>Centre</th>
<th>Service</th>
<th>Country</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['Ref'] . "</td>";
  echo "<td>" . $row['Centre'] . "</td>";
  echo "<td>" . $row['Service'] . "</td>";
  echo "<td>" . $row['Country'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>