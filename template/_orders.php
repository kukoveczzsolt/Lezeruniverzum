<?php
function tabla_feltoltes()
{
    include "adatbazisKapcsolat.php";
    $limit = 10;
    $parancs = "SELECT rendelesek.rendlesIdopont,rendelesek.osszeg,concat(rendelesek.szallitVaros, ' ' ,rendelesek.szallitIranyitoszam, ' ',rendelesek.szallitLakcim) AS szallitas_cim,rendelesek.szallitMod FROM rendelesek 
                INNER JOIN felhasznalok 
                ON felhasznalok.ID = rendelesek.felhaszID
                WHERE felhasznalok.email = '".$_SESSION["email"]."' LIMIT $limit";
    $result = mysqli_query($conn,$parancs);
    $parancs2 = "SELECT termekek.nev,kategoriak.kategoriaNev,termekek.ar,termekek.kep,rendeles_reszlet.darabszam as darab FROM termekek
    INNER JOIN kategoriak
    ON
    kategoriak.ID = termekek.kategoriaID
    INNER JOIN rendeles_reszlet
    ON
    rendeles_reszlet.termekID = termekek.ID
    INNER JOIN rendelesek
    ON
    rendelesek.ID = rendeles_reszlet.rendelesID
    INNER JOIN felhasznalok
    ON
    felhasznalok.ID = rendelesek.felhaszID
    WHERE felhasznalok.email = '".$_SESSION["email"]."'";
    $result2 = mysqli_query($conn,$parancs2);
    while($row = mysqli_fetch_array($result))
    {
        echo '<tr>
                <td><span class="expandChildTable"></span></td>
                <td>'.$row["rendlesIdopont"].'</td>
                <td>'.$row["szallitas_cim"].'</td>
                <td>'.$row["osszeg"].'</td>
                <td>'.$row["szallitMod"].'</td>
            </tr>
            <tr class="childTableRow">
                    <td colspan="3">
                        <h5>Rendelés részlet</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Termék neve</th>
                                    <th>Termék kategóriája</th>
                                    <th>Termék ára</th>
                                    <th>Darab</th>
                                    <th>Kép</th>
                                </tr>
                            </thead>
                            <tbody>';
        while ($termek = mysqli_fetch_array($result2))
        {
            echo'<tr>
                    <td>'.$termek["nev"].'</td>
                    <td>'.$termek["kategoriaNev"].'</td>
                    <td>'.$termek["ar"].'</td>
                    <td>'.$termek["darab"].'</td>
                    <td><a href="'.$termek["kep"].'">Kép</a></td>
                </tr>';
        }
        echo '</tbody>
        </table>
        </td>
        </tr>';
    }
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
.expandChildTable:before {
    content: "+";
    display: block;
    cursor: pointer;
}
.expandChildTable.selected:before {
    content: "-";
}
.childTableRow {
    display: none;
}
.childTableRow table {
    border: 2px solid #555;
}
</style>
<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Rendelés Időpontja</th>
            <th>Szállítási cím</th>
            <th>Összeg</th>
            <th>Átvételi mód</th>
        </tr>
    </thead>
    <?php tabla_feltoltes();?>
</table>

<script>
$(function() {
    $('.expandChildTable').on('click', function() {
        $(this).toggleClass('selected').closest('tr').next().toggle();
    })
});
</script>