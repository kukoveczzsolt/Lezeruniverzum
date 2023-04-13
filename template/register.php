<?php
include "adatbazisKapcsolat.php";
$errors = array("email" =>"","jelszo"=>"","jelszo2" => "","vnev" => "","knev" => "","varos" => "","irszam" => "","lakcim" => "",);
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $email = "";
  $jelszo = "";
  $jelszo2 = "";
  $jelszo_hash = "";
  $vnev = "";
  $knev = "";
  $varos = "";
  $irszam = "";
  $lakcim = "";
  
  $parancs = "INSERT INTO felhasznalok (`Jelszo`, `Email`, `Knev`, `Vnev`, `Varos`, `Iranyitoszam`, `Lakcim`) 
  VALUES ('$jelszo_hash','$email','$knev','$vnev','$varos','$irszam','$lakcim')";

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
    $jelszo2 = $_POST["jelszo2"];
    if($jelszo2 != $jelszo)
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

  if(!empty($_POST["varos"]))
  {
    $varos = $_POST["varos"];
    unset($errors["varos"]);
  }
  else
  {
    $errors["varos"] = "Város megadása kötelező";
  }

  if(!empty($_POST["irszam"]))
  {
    $email = $_POST["irszam"];
    unset($errors["irszam"]);
  }
  else
  {
    $errors["irszam"] = "Irányítószám megadása kötelező";
  }

  if(!empty($_POST["lakcim"]))
  {
    $lakcim = $_POST["lakcim"];
    unset($errors["lakcim"]);
  }
  else
  {
    $errors["lakcim"] = "Lakcím megadása kötelező";
  }
}
?>