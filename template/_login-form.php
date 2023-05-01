<?php
include "_login_include.php";
?>

<div class="text-center my-2">
    <h2>Belépés</h2>
</div>

<div class="row">
    <div class="col-md-2 col-lg-4"></div>
    <div class="col-md-8 col-lg-4">
        <form action="login.php" method="post">
            <div class="mb-3">
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email cím" aria-describedby="emailHelp" name="email">
                <p><?php if(array_key_exists("email",$errors)) {echo $errors["email"];} ?></p>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Jelszó" id="exampleInputPassword1" name="jelszo">
                <p><?php if(array_key_exists("jelszo",$errors)) {echo $errors["jelszo"];} ?></p>
            </div>
            <div class="float-end pb-2">
            <button type="submit" class="btn primary flex-shrink-0" name="login">Belépés</button>
            <a href="registration.php" class="btn primary flex-shrink-0">Regisztráció</a>
            </div>
        </form>
    </div>
</div>
<div class="col-md-2 col-lg-4"></div>