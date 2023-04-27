<?php
include "includes/adatbazisKapcsolat.php";
$errors = array("email" => "","jelszo" => "");

if(isset($_POST["login"]))
{
    $email = $_POST["email"];
    $jelszo = $_POST["jelszo"];
    $parancs = "SELECT * FROM felhasznalok WHERE email='$email'";
    $query = mysqli_query($conn,$parancs);
    $num = mysqli_num_rows($query); 

    if(!empty($email))
    {
        if($num > 0)
        {
            $result = mysqli_fetch_array($query);
            unset($errors["email"]);
            if(password_verify($jelszo,$result["jelszo"]))
            {
                unset($errors["jelszo"]);
                $_SESSION["email"] = $_POST["email"];
            }
            elseif(!empty($jelszo))
            {
                $errors["jelszo"] = "Hibás jelszó/email";
            }
            else
            {
                $errors["jelszo"] = "Üres mező";
            }
        }
        else
        {
            $errors["email"] = "Nincs ilyen email regisztrálva";
        }
    }
    else
    {
        $errors["email"] = "Üres mező";
    }

    

    if(count($errors) == 0)
    {
        $query = mysqli_query($conn,$parancs);
        $result = mysqli_fetch_array($query);
        $_SESSION["admin_e"] = $result["admin_e"];
        header("Location: index.php");
    }
}


?>