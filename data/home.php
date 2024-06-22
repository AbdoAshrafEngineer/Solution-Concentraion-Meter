<?php

$servername = "localhost";
$username = "ESP32";
$password = "esp32io.com";
$database_name = "db_esp32";

$eq = 0;
// Create MySQL connection from PHP to MySQL server

$connection = new mysqli($servername, $username, $password, $database_name);

// Check connection
if ($connection->connect_error) {
    die("MySQL connection failed: " . $connection->connect_error); //print and exit
}

//$sql = "INSERT INTO discrete_wl (sample_name, discription, WL1, WL2, equation, WL_3)  
      //  VALUES('FE', 'dcçdvdfdvv fvfv fv', '600', '430', ' ', '438')";

$data = $connection->query("select * from discrete_wl");

while($row = $data -> fetch_assoc())
{
   $eq = ($row['WL1'] + $row['WL2'] + $row['WL_3'])/3;
   echo "<tr>";
   echo "<td>{$row['sample_name']}</td>";
   echo "<td>{$row['discription']}</td>";
   echo "<td>{$row['WL1']}</td>";
   echo "<td>{$row['WL2']}</td>";
   echo "<td>{$row['WL_3']}</td>";
   echo "<td>" .$eq. "</td>"; 
   echo "</tr>";
}


$connection->close();

?>
