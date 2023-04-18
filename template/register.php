<?php
session_start();
include "adatbazisKapcsolat.php";
$errors = array("email" =>"","jelszo"=>"","jelszo2" => "","vnev" => "","knev" => "");
$siker = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$email;
$jelszo;
$jelszo_hash;
$vnev;
$knev;

#region Üres input mezők ellenőrzése
  if(!empty($_POST["email"]))
  {
    $email = $_POST["email"];
    unset($errors["email"]);
  }
  else
  {
    $errors["email"] = "Email megadása kötelező";
  }

  if(!empty($_POST["jelszo"]))
  {
    $jelszo = $_POST["jelszo"];
    $jelszo_hash = password_hash($jelszo,PASSWORD_DEFAULT);
    unset($errors["jelszo"]);
  }
  else
  {
    $errors["jelszo"] = "Jelszó megadása kötelező";
  }

  if(!empty($_POST["jelszo2"]))
  {
    if($_POST["jelszo2"] != $jelszo)
    {
      $errors["jelszo2"] = "Nem egyező jelszó";
    }
    else
    {
      unset($errors["jelszo2"]);
    }
  }
  else
  {
    $errors["jelszo2"] = "Jelszó megerősítése kötelező";
  }

  if(!empty($_POST["vnev"]))
  {
    $vnev = $_POST["vnev"];
    unset($errors["vnev"]);
  }
  else
  {
    $errors["vnev"] = "Vezetéknév megadása kötelező";
  }

  if(!empty($_POST["knev"]))
  {
    $knev = $_POST["knev"];
    unset($errors["knev"]);
  }
  else
  {
    $errors["knev"] = "Keresztnév megadása kötelező";
  }
#endregion

if(count($errors) == 0)
{
  try
  {
    $parancs = "INSERT INTO felhasznalok (`Jelszo`, `Email`, `Knev`, `Vnev`) VALUES ('$jelszo_hash','$email','$knev','$vnev')";
    mysqli_query($conn,$parancs);
    $siker = "Sikeres regisztráció";
  }
  catch(mysqli_sql_exception)
  {
    $siker = "Ez az email már foglalt";
  }
}
}
?>