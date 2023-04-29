<?php
session_start();
if(!isset($_SESSION["email"]))
{
    include "header.php";
}
elseif(isset($_SESSION["email"])&& $_SESSION["admin_e"] == 1)
{
    include "header_logged_admin.php";
}
else
{
    include "header_logged.php";
}
?>