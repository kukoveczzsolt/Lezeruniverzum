<?php
include "adatbazisKapcsolat.php";
$errors = array("email" => "","jelszo" => "");

if (isset($_POST["login"]))
{
    $email = $_SESSION["email"] = $_POST["email"];
    $jelszo = $_POST["jelszo"];
    $parancs = "SELECT * FROM felhasznalok WHERE Email='$email'";
    $query = mysqli_query($conn,$parancs);
    $num = mysqli_num_rows($query); 
    
    #region Üres mezők ellenőrzése/Létező email
    if(!empty($email))
    {
        if($num > 0)
        {
            unset($errors["email"]);
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

    if(!empty($jelszo))
    {
        if($num > 0)
        {
            $result = mysqli_fetch_array($query);
            if(password_verify($jelszo,$result["Jelszo"]))
            {
                unset($errors["jelszo"]);
            }
            else
            {
                $errors["jelszo"] = "Hibás jelszó/email";
            }
        }
        
    }
    else
    {
        $errors["jelszo"] = "Üres mező";
    }

    if(count($errors) == 0)
    {
        $query = mysqli_query($conn,$parancs);
        $result = mysqli_fetch_array($query);
        $_SESSION["admin_e"] = $result["admin_e"];
        echo '<script>alert("Sikeres bejelentkezés")</script>';
        if($result["admin_e"] == 1)
        {
            header("Location: logged_in_admin.php");
        }
        else
        {
            header("Location: logged_in.php");
        }
    }
    #endregion
}


?>