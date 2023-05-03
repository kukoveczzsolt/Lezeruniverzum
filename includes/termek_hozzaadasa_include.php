<?php
function kategoria_listazas($dbconn)
{
    include "../adatbazisKapcsolat.php";
    $select_parnacs = "SELECT kategoriaNev FROM kategoriak where kategoriak.ID > 1";
    $result = mysqli_query($dbconn,$select_parnacs);
    while($row = mysqli_fetch_array($result))
    {
        echo "<option value='".$row["kategoriaNev"]."'>".$row["kategoriaNev"]."</option>";
    }
}
if(isset($_POST["letrehozas"]))
{
    include "../adatbazisKapcsolat.php";
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
            move_uploaded_file($_FILES["kep"]["tmp_name"],"../assets/products/$kep");
        }
        catch(Exception $ex)
        {
            echo $ex->getMessage();
        }
        header("Location: ../admin_panel.php");
    }
}


if(isset($_POST["kategoria_letrehozas"]))
{
    include "../adatbazisKapcsolat.php";
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