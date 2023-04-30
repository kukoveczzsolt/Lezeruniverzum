<?php
session_start();
if($_SESSION["admin_e"] == 1)
{
   include "header_logged_admin.php"; 
}
else
{
    include "header_logged.php";
}

?>

<?php
include "template/_orders.php";
?>

<?php
include "footer.php";
?>  