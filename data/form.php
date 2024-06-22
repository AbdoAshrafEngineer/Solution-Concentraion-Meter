<?php

$servername = "localhost";
$username = "ESP32";
$password = "esp32io.com";
$database_name = "db_esp32";

/*
A = α*l*C
Concentration(C) = (A/(α*l))
absorption coeffcient(α) = (constant);
length of sample (l) = 1cm;
*/

$l = 1.0;
$x1 = 95.55;
// $x2 = 142;
// $x3 = 80.36;
$A1 = 0.333;
// $A2 = 0.555;
// $A3 = 0.777;

$C1 = $A1/($x1 * $l);
// $C2 = $A2/($x2 * $l);
// $C3 = $A3/($x3 * $l);


// Create MySQL connection from PHP to MySQL server

$connection = new mysqli($servername, $username, $password, $database_name);

// Check connection
if ($connection->connect_error) {
    die("MySQL connection failed: " . $connection->connect_error); //print and exit
}else
{

    $connection->query("INSERT INTO discrete_rgb (Light, Wavelength, Absorbtion, Concentration)  
    VALUES('{$_POST['Laser_Light']}', 
        '{$_POST['Wavelength']}', 
        '" . $A1 . "', 
        '" . $C1 . "')"
    );

    header("Location:index.php?data=success");
}

$connection->close();

?>
