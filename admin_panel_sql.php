<?php
function tabla_feltoltes()
{
    include "adatbazisKapcsolat.php";
    $parancs = "SELECT nev,ar,kategoria FROM termekek";
    $result = mysqli_query($conn,$parancs);
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>".$row["nev"]."</td>";
        echo "<td>".$row["kategoria"]."</td>";
        echo "<td>".$row["ar"]." Ft</td>";
        echo "<td><button type='button' class='btn btn-warning'><i class='bi bi-pencil-square'></i></button> <button type='button' class='btn btn-danger'><i class='bi bi-trash-fill'></i></button> </td>";
        echo "</tr>";
    }
}

?>