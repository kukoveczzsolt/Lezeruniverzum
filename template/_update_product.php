<?php
if (!isset($_SESSION['email']) || $_SESSION["admin_e"] != 1) {
    header('location:index.php');
  }
include "adatbazisKapcsolat.php";
$_SESSION["termekID"] = $_POST["update"];
$termek_parancs="SELECT nev,kategoriak.kategoriaNev as kategoria,leiras,ar,kep,kiemelt FROM termekek
                INNER JOIN
                kategoriak
                ON
                kategoriak.ID = termekek.kategoriaID
                WHERE termekek.ID = ".$_SESSION["termekID"]."";
$termek_result = mysqli_query($conn,$termek_parancs);
$row = mysqli_fetch_assoc($termek_result);

function kategoria_listazas($dbconn, $termek)
{
    $select_parancs = "SELECT kategoriaNev FROM kategoriak where kategoriak.ID > 1";
    $result = mysqli_query($dbconn,$select_parancs);
    while($row = mysqli_fetch_assoc($result))
    {
        if($termek["kategoria"] == $row["kategoriaNev"])
        {
            echo "<option value='".$row["kategoriaNev"]."' selected>".$row["kategoriaNev"]."</option>";
        }
        else
        {
            echo "<option value='".$row["kategoriaNev"]."'>".$row["kategoriaNev"]."</option>";
        }
    }
}



?>

<div class="container-fluid">
<div class="text-center">
    <h2>Termék adatai</h2>
</div>
<div class="row my-5 px-2">
    <div class="col-md-2 col-lg-4"></div>
    <div class="col-md-8 col-lg-4">
            <div class="mb-3">
            <form method="post" action="includes/update_product.php">
                <label for="nev" class="form-label primary">Termék neve</label>
                <input type="text" name="nev" class="form-control primary" aria-describedby="emailHelp" value="<?php echo $row["nev"] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label primary">Kategória</label>
                <select class="form-select " aria-label="Default select example" name="kategoria_selected">
                    <optgroup label="Kategóriák">
                        <?php kategoria_listazas($conn,$row); ?>
                    </optgroup>
                </select>
            </div>
            <div class="mb-3">
                <label for="ar" class="form-label primary">Ár</label>
                <input type="text" name="ar" class="form-control primary" aria-describedby="emailHelp" value="<?php echo $row["ar"] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlTextarea1" class="mb-1">Leírás</label>
                <textarea class="form-control" rows="3" name="leiras"><?php echo $row["leiras"] ?></textarea>
            </div>
            <div class="mb-3  text-end">
                <button class="btn" type="submit" name="kuldes">Módosítás</button>
                </form>
            </div>
        
    </div>
    <div class="col-md-2 col-lg-4"></div>
</div>
</div>
