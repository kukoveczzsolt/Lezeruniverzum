<?php
include('includes/header_decider.php');
if(!isset($_SESSION["email"]))
{
    include('.\template\_login-form.php');
}
elseif(isset($_SESSION["email"])&& $_SESSION["admin_e"] == 1)
{
    include('.\template\_checkout.php');
}
include('footer.php');
?>