<?php
include "adatbazisKapcsolat.php";
function kategoria_listazas($dbconn)
{
    $select_parnacs = "SELECT kategoriaNev FROM kategoriak";
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
    $kategoria_selected = $_POST["kategoria_selected"];
    $parancs = "INSERT INTO `termekek`(`nev`, `ar`, `kategoria`, `kategoriaID`) VALUES ('$termek_nev','$termek_ar',(SELECT kategoriak.kategoriaNev from kategoriak where kategoriak.kategoriaNev = '$kategoria_selected'),(SELECT kategoriak.ID from kategoriak where kategoriak.kategoriaNev = '$kategoria_selected'))";
    mysqli_query($conn,$parancs);
}

?>
<!-- Button trigger modal -->

<div class="container bg-light w-25">
<form method="post">
    <input type="text" class="form-control mt-3" name="termek_nev" placeholder="Termék neve">
    <select class="form-select mt-3" aria-label="Default select example" name="kategoria_selected">
        <optgroup label="Kategóriák">
            <?php kategoria_listazas($conn); ?>
        </optgroup>
    </select>
    <input type="text" class="form-control mt-3" name="termek_ar" placeholder="Ár">
    <button type="submit" class="btn btn-success" name="letrehozas">Létrehozás</button>
    <!-- Új termék modal -->
    <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#uj_kategoria">
        Új kategória
    </button>

    <!-- Modal -->
    <div class="modal fade" id="uj_kategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Új kategória</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="Kategória név">
                </div>

                <div class="modal-footer">
                    <form method="post">
                    <button type="submit" class="btn btn-primary" name="kategoria_letrehozas">Létrehozás</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégsem</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
