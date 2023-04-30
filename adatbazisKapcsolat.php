<?php
error_reporting(0);
$host = "localhost";
$nev = "root";
$jelszo = "";
$adatbazis = "lezeruniverzum";


// Create connection
try{
$conn = new mysqli($host, $nev, $jelszo, $adatbazis);
}
catch(Exception $e)
{
    echo "Nem sikerült az adatbázishoz kapcsolódni, kérem próbálja újra később!";
}

?>