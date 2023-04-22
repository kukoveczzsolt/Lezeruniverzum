<?php
session_start();
$_SESSION["email"] = "kukovecz.zsolt@gmail.com";
include "header_logged_admin.php";
?>
<?php
include "template/_admin_panel.php";
?>
<?php
include "footer.php";
?>