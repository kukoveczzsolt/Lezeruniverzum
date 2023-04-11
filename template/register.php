<?php
include "adatbazisKapcsolat.php";
$errors = array("email" =>"","jelszo"=>"","jelszo2" => "","vnev" => "","knev" => "","varos" => "","irszam" => "","lakcim" => "",);
session_start();
if(isset($_POST["kuldes"]))
{
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
    }
    else
    {
      $errors["email"] = "Email megadása kötelező";
    }

    if(!empty($_POST["jelszo"]))
    {
      $email = $_POST["jelszo"];
      $jelszo_hash = password_hash($jelszo,PASSWORD_DEFAULT);
    }
    else
    {
      $errors["jelszo"] = "Jelszó megadása kötelező";
    }

    if(!empty($_POST["jelszo2"]))
    {
      $email = $_POST["jelszo2"];
      if($jelszo2 != $jelszo)
      {
        $errors["jelszo2"] = "Nem egyező jelszó";
      }
    }
    else
    {
      $errors["jelszo2"] = "Jelszó megerősítése kötelező";
    }

    if(!empty($_POST["vnev"]))
    {
      $email = $_POST["vnev"];
    }
    else
    {
      $errors["vnev"] = "Vezetéknév megadása kötelező";
    }

    if(!empty($_POST["knev"]))
    {
      $email = $_POST["knev"];
    }
    else
    {
      $errors["knev"] = "Keresztnév megadása kötelező";
    }

    if(!empty($_POST["varos"]))
    {
      $email = $_POST["varos"];
    }
    else
    {
      $errors["Város"] = "Város megadása kötelező";
    }

    if(!empty($_POST["irszam"]))
    {
      $email = $_POST["irszam"];
    }
    else
    {
      array_push($errors,"Irányítószám");
    }

    if(!empty($_POST["lakcim"]))
    {
      $email = $_POST["lakcim"];
    }
    else
    {
      $errors["lakcim"] = "Lakcím megadása kötelező";
    }

  }
}

?>