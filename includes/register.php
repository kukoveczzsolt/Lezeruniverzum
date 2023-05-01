<?php
function filter($str)
{
  $str = trim($str);
  $str = strip_tags($str);
  $str = stripslashes($str);
  return $str;
}

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
    if($_POST["email"] == filter($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
    {
      $email = $_POST["email"];
      unset($errors["email"]);
    }
    else
    {
      $errors["email"] = "Nem megfelelő email formátum";
    }
    
  }
  else
  {
    $errors["email"] = "Email megadása kötelező";
  }

  if(!empty($_POST["jelszo"]))
  {
    if($_POST["jelszo"] == filter($_POST["jelszo"]) && strlen($_POST["jelszo"]) >= 8)
    {
    $jelszo = $_POST["jelszo"];
    $jelszo_hash = password_hash($jelszo,PASSWORD_DEFAULT);
    unset($errors["jelszo"]);
    }
    else
    {
      $errors["jelszo"] = "Nem megfelelő jelszó";
    }
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
    if(preg_match("/^[a-zA-ZáéíűúőóüöÁÉÍŰÚŐÓÜÖ]*$/u",$_POST["vnev"]))
    {
      $vnev = $_POST["vnev"];
      unset($errors["vnev"]);
    }
    else
    {
      $errors["vnev"] = "Hibás név formátum";
    }
  }
  else
  {
    $errors["vnev"] = "Vezetéknév megadása kötelező";
  }

  if(!empty($_POST["knev"]))
  {
    if(preg_match("/^[a-zA-ZáéíűúőóüöÁÉÍŰÚŐÓÜÖ]*$/u",$_POST["knev"]))
    {
      $knev = $_POST["knev"];
      unset($errors["knev"]);
    }
    else
    {
      $errors["knev"] = "Hibás név formátum";
    }
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
    $parancs = "INSERT INTO felhasznalok (`jelszo`, `email`, `knev`, `vnev`) VALUES ('$jelszo_hash','$email','$knev','$vnev')";
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