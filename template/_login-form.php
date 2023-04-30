<?php
include "_login_include.php";
?>

<div class="text-center my-5">
    <h2>Belépés</h2>
</div>

<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <form action="login.php" method="post">
            <div class="mb-3">
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email cím" aria-describedby="emailHelp" name="email">
                <p><?php if(array_key_exists("email",$errors)) {echo $errors["email"];} ?></p>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Jelszó" id="exampleInputPassword1" name="jelszo">
                <p><?php if(array_key_exists("jelszo",$errors)) {echo $errors["jelszo"];} ?></p>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Belépés</button>
            <a href="registration.php" class="btn btn-primary">Regisztráció</a>
        </form>
    </div>
</div>
<div class="col-4"></div>