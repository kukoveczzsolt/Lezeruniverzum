<?php

$host = "localhost";
$nev = "root";
$jelszo = "";
$adatbazis = "lezeruniverzum";


// Create connection
$conn = new mysqli($host, $nev, $jelszo, $adatbazis);
if($conn->connect_errno){
echo $conn->connect_error;
die();
}
?>