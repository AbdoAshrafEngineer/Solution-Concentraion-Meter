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

//$data = $connection->query("select * from db_wlform");
//$data = $connection->query("SELECT * FROM db_wlform WHERE id=(SELECT MAX(id) FROM db_wlform)");

$data = $connection->query("SELECT * FROM db_wlform ORDER BY id DESC LIMIT 1"); 
$l_row = $data -> fetch_array();

$data = $connection->query("SELECT * FROM db_wlform ORDER BY id DESC LIMIT 1,1"); 
$sl_row = $data -> fetch_array();

$data = $connection->query("SELECT * FROM db_wlform ORDER BY id DESC LIMIT 2,1"); 
$tl_row = $data -> fetch_array();

$connection->close();

?>
