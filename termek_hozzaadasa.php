<?php
session_start();
$_SESSION["email"] = "kukovecz.zsolt@gmail.com";
include "header_logged_admin.php";
?>
<?php
include "template/_termek_hozzaadasa.php";
?>
<?php
include "footer.php";
?>