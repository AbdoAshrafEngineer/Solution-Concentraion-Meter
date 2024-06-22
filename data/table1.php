<?php

$servername = "localhost";
$username = "ESP32";
$password = "esp32io.com";
$database_name = "db_esp32";

// Create MySQL connection from PHP to MySQL server

$connection = new mysqli($servername, $username, $password, $database_name);

// Check connection
if ($connection->connect_error) {
    die("MySQL connection failed: " . $connection->connect_error); //print and exit
}

$data = $connection->query("select * from discrete_rgb");

while($row = $data -> fetch_assoc())
{
   echo "<tr>";
   echo "<td>{$row['Light']}</td>";
   echo "<td>{$row['Wavelength']}</td>";
   echo "<td>{$row['Absorbtion']}</td>";
   echo "<td>{$row['Concentration']}</td>";
   echo "</tr>";
}

$connection->close();

?>
