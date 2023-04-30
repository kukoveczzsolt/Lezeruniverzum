<?php
include "adatbazisKapcsolat.php";
$parancs = "SELECT * FROM felhasznalok WHERE felhasznalok.email = '".$_SESSION["email"]."'";
$result = mysqli_query($conn,$parancs);
$row = mysqli_fetch_array($result);
$_SESSION["error"] = $error = "";

if(isset($_POST["kules"]))
{
    if(password_verify($_POST["jelszo_kuldes"],$row["jelszo"]))
    {
        if($_POST["email"] != $row["email"])
        {
            echo "Siker";
        }
        if($_POST["vnev"] != $row["vnev"])
        {
            mysqli_query($conn,"UPDATE felhasznalok SET vnev = ".$_POST["vnev"]." WHERE felhasznalok.email = ".$row["email"]."");
        }
        if($_POST["knev"] != $row["knev"])
        {
            mysqli_query($conn,"UPDATE felhasznalok SET knev = ".$_POST["knev"]." WHERE felhasznalok.email = ".$row["email"]."");
        }
    }
    else
    {
        $error = "Nem egyező jelszó";
    }
    header("location: user.php");
}

?>