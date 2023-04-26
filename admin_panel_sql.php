<?php
function tabla_feltoltes()
{
    include "adatbazisKapcsolat.php";
    $limit = 10;
    $parancs = "SELECT nev,ar,kategoriak.kategoriaNev FROM termekek
    INNER JOIN kategoriak
    ON
    kategoriak.ID = termekek.kategoriaID LIMIT $limit";
    $result = mysqli_query($conn,$parancs);
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>".$row["nev"]."</td>";
        echo "<td>".$row["kategoriaNev"]."</td>";
        echo "<td>".$row["ar"]." Ft</td>";
        echo "<form action='edit.php' method='post'><td><button type='submit' class='btn btn-warning' name='edit' value='".$row["nev"]."'><i class='bi bi-pencil-square'></i></form>  <form action='delete.php' method='post'></button> <button type='submit' class='btn btn-danger' name='delete' value='".$row["nev"]."'><i class='bi bi-trash-fill'></i></button></td></form>";
        echo "</tr>";
    }
}

?>