<?php
function tabla_feltoltes()
{
    include "adatbazisKapcsolat.php";
    $parancs = "SELECT nev,ar,kategoria FROM termekek";
    $result = mysqli_query($conn,$parancs);
    $termekek = array();
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>".$row["nev"]."</td>";
        echo "<td>".$row["kategoria"]."</td>";
        echo "<td>".$row["ar"]." Ft</td>";
        echo "";
        echo "<form action='edit.php' method='post'><td><button type='submit' class='btn btn-warning' name='edit'><i class='bi bi-pencil-square'></i></form>  <form action='delete.php' method='post'></button> <button type='submit' class='btn btn-danger' name='delete' value='".$row["nev"]."'><i class='bi bi-trash-fill'></i></button></td></form>";
        echo "";
        echo "</tr>";
    }
}

?>