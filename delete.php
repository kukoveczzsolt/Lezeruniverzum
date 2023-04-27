<?php
include "includes/adatbazisKapcsolat.php";
$parancs = "DELETE FROM termekek WHERE termekek.nev = '".$_POST["delete"]."'";
if(isset($_POST["delete"]))
{
    mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0");
    mysqli_query($conn,$parancs);
    mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=1");
}
header("Location: admin_panel.php");
?>