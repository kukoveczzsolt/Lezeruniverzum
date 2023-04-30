<?php
include "adatbazisKapcsolat.php";
function kategoria_listazas($dbconn)
{
    $select_parnacs = "SELECT kategoriaNev FROM kategoriak where kategoriak.ID > 1";
    $result = mysqli_query($dbconn,$select_parnacs);
    while($row = mysqli_fetch_array($result))
    {
        echo "<option value='".$row["kategoriaNev"]."'>".$row["kategoriaNev"]."</option>";
    }
}

if(isset($_POST["letrehozas"]))
{
    $termek_nev = $_POST["termek_nev"];
    $termek_ar = $_POST["termek_ar"];
    $leiras = $_POST["leiras"];
    $kep = $_FILES["kep"]["name"];
    $kategoria_selected = $_POST["kategoria_selected"];
    $parancs = "INSERT INTO termekek(nev, ar,kategoriaID,leiras,kep) VALUES ('$termek_nev','$termek_ar',(SELECT kategoriak.ID from kategoriak where kategoriak.kategoriaNev = '$kategoria_selected'),'$leiras','assets/products/$kep')";
    if(empty($termek_nev) || empty($termek_ar) || empty($leiras) || empty($kep))
    {
        header("Location: ../termek_hozzaadasa.php");
    }
    else
    {
        try
        {
            mysqli_query($conn,$parancs);
        }
        catch(Exception $ex)
        {
            echo $ex->getMessage();
        }
        move_uploaded_file($_FILES["kep"]["tmp_name"],"assets/products/$kep");
        header("Location: ../termek_hozzaadasa.php");
    }
}


if(isset($_POST["kategoria_letrehozas"]))
{
    $kategoria_nev = $_POST["kategoria_nev"];
    $parancs = "INSERT INTO `kategoriak`(`kategoriaNev`) VALUES ('$kategoria_nev')";
    try
    {
        mysqli_query($conn,$parancs);
    }
    catch(Exception $ex)
    {
        $ex->getMessage();
    }
    header("Location: ../termek_hozzaadasa.php");
}
?>