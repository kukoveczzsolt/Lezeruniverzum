<?php
function tabla_feltoltes()
{
    include "adatbazisKapcsolat.php";
    $parancs = "SELECT termekek.ID as ID,nev,ar,kategoriak.kategoriaNev FROM termekek
    INNER JOIN kategoriak
    ON
    kategoriak.ID = termekek.kategoriaID";
    $result = mysqli_query($conn,$parancs);
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td class='pt-3'>".$row["nev"]."</td>";
        echo "<td class='pt-3'>".$row["kategoriaNev"]."</td>";
        echo "<td class='pt-3'>".$row["ar"]." Ft</td>";
        echo "<form action='update_product.php' method='post'><td><button type='submit' class='btn btn-warning' name='update' value='".$row["ID"]."'><i class='bi bi-pencil-square'></i></form>  
        <form action='delete.php' method='post'></button> <button type='submit' class='btn btn-danger' name='delete' value='".$row["nev"]."'><i class='bi bi-trash-fill'></i></button></td></form>";
        echo "</tr>";
    }
}

?>