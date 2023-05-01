<?php
function filter($str)
{
  $str = trim($str);
  $str = strip_tags($str);
  $str = stripslashes($str);
  return $str;
}
include "adatbazisKapcsolat.php";
$parancs = "SELECT * FROM felhasznalok WHERE felhasznalok.email = '".$_SESSION["email"]."'";
$result = mysqli_query($conn,$parancs);
$row = mysqli_fetch_array($result);

if(isset($_POST["kuldes"]))
{
    if(password_verify($_POST["jelszo_kuldes"],$row["jelszo"]))
    {
        if($_POST["email"] != $row["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        {
            if(mysqli_query($conn,"UPDATE felhasznalok SET email = '".$_POST["email"]."' WHERE felhasznalok.email = '".$row["email"]."'"))
            {
                $_SESSION["email"] = $_POST["email"];
            }
        }
        if($_POST["vnev"] != $row["vnev"])
        {
            if(preg_match("/^[a-zA-ZáéíűúőóüöÁÉÍŰÚŐÓÜÖ]*$/u",$_POST["vnev"]))
            {
                mysqli_query($conn,"UPDATE felhasznalok SET vnev = '".$_POST["vnev"]."' WHERE felhasznalok.email = '".$_SESSION["email"]."'");
            }
        }
        if($_POST["knev"] != $row["knev"])
        {
            if(preg_match("/^[a-zA-ZáéíűúőóüöÁÉÍŰÚŐÓÜÖ]*$/u",$_POST["knev"]))
            {
                mysqli_query($conn,"UPDATE felhasznalok SET knev = '".$_POST["knev"]."' WHERE felhasznalok.email = '".$_SESSION["email"]."'");
            }
        }

        if($_POST["jelszo"] == filter($_POST["jelszo"]) && $_POST["jelszo"] == $_POST["jelszo2"] && strlen($_POST["jelszo"]) > 6)
        {
            $jelszo_hash = password_hash($_POST["jelszo"], PASSWORD_DEFAULT);
            mysqli_query($conn,"UPDATE felhasznalok SET jelszo = '$jelszo_hash' WHERE felhasznalok.email = '".$_SESSION["email"]."'");
        }     
        header("location: user.php");
    }
    else
    {
        $_SESSION["error"] = "Nem egyező jelszó";
    }
}

?>

<div class="text-center">
    <h2>Felhasználó adatai</h2>
</div>
<div class="row my-5">
    <div class="col-4"></div>
    <div class="col-4">
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email cím</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["email"] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Vezetéknév</label>
                <input type="text" name="vnev" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["vnev"] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keresztnév</label>
                <input type="text" name="knev" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["knev"] ?>">
            </div>
    </div>
    <div class="col-4"></div>
</div>

<div class="text-center my-5">
    <h2>Jelszó módosítása</h2>
</div>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Új jelszó</label>
                <input type="password" class="form-control" name="jelszo" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Új jelszó megerősítése</label>
                <input type="password" class="form-control" name="jelszo2" id="exampleInputPassword1">
            </div>
    </div>
    <div class="col-4"></div>
</div>

<div class="text-center my-5">
    <h2>Adatok mentése</h2>
</div>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jelszó</label>
                <input type="password" name="jelszo_kuldes" class="form-control mb-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                <p class="text-danger"><?php echo $_SESSION["error"]; unset($_SESSION["error"]); ?></p>
            </div>
            <button type="submit" class="btn btn-primary float-end mb-3" name="kuldes">Mentés</button>
    </div>
    <div class="col-4"></div>
    </form>
</div>