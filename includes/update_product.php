<?php
session_start();
if(isset($_POST["kuldes"]))
{
    include "../adatbazisKapcsolat.php";
    $parancs = "SELECT nev, kategoriak.kategoriaNev as kategoria, leiras, ar, kep, kiemelt FROM termekek
    INNER JOIN
    kategoriak
    ON
    kategoriak.ID = termekek.kategoriaID
    WHERE termekek.ID = ".$_SESSION["termekID"]."";
    $result = mysqli_query($conn,$parancs);
    $row = mysqli_fetch_assoc($result);
    if($_POST["nev"] != $row["nev"])
    {
        $nev = $_POST["nev"];
        mysqli_query($conn,"UPDATE termekek SET nev = '$nev' WHERE termekek.ID = ".$_SESSION["termekID"]."");
    }
    if($_POST["ar"] != $row["ar"])
    {
        $ar = $_POST["ar"];
        mysqli_query($conn,"UPDATE termekek SET ar = '$ar' WHERE termekek.ID = ".$_SESSION["termekID"]."");
    }
    if($_POST["kategoria_selected"] != $row["kategoria"])
    {
        $kategoria_selected = $_POST["kategoria_selected"];
        $kategoria_parancs = "SELECT kategoriak.ID FROM kategoriak INNER JOIN termekek ON termekek.kategoriaID = kategoriak.ID WHERE kategoriak.kategoriaNev = '$kategoria_selected'";
        $kategoria_result = mysqli_query($conn,$kategoria_parancs);
        $kategoria_row = mysqli_fetch_assoc($kategoria_result);
        $ID = $kategoria_row["ID"];
        mysqli_query($conn,"UPDATE termekek SET kategoriaID = '$ID' WHERE termekek.ID = ".$_SESSION["termekID"]."");
    }
    if($_POST["leiras"] != $row["leiras"])
    {
        $leiras = $_POST["leiras"];
        mysqli_query($conn,"UPDATE termekek SET leiras = '$leiras' WHERE termekek.ID = ".$_SESSION["termekID"]."");
    }
    unset($_SESSION["termekID"]);
    header("location: ../admin_panel.php#nev_kereses");
}
else
{
    header("location: ../index.php");
}

?>