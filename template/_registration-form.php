<?php
include "register.php";
?>

  <link rel="stylesheet" href="register.css">

  <div class="text-center my-5">
    <h2>Regisztráció</h2>
  </div>

  <div class="row">
    <div class="col-4"></div>
    <div class="col-4">
      <form action="registration.php" method="post">
      
        <div class="mb-3">
          <label for="email" class="form-label">Email cím</label>
          <input type="email" class="form-control" placeholder="Kötelező" name="email" id="email" aria-describedby="emailHelp">
          <p class="pt-2 text-danger"><?php if(array_key_exists("email",$errors)) echo $errors["email"]; ?></p>
          
        </div>
        <div class="mb-3">
          <label for="forname" class="form-label">Vezetéknév</label>
          <input type="text" class="form-control" placeholder="Kötelező" name="vnev" id="forname">
          <p class="pt-2 text-danger"><?php if(array_key_exists("vnev",$errors)) echo $errors["vnev"]; ?></p>
        </div>
        <div class=" mb-3">
          <label for="lastname" class="form-label">Keresztnév</label>
          <input type="text" class="form-control" placeholder="Kötelező" name="knev" id="lastname">
          <p class="pt-2 text-danger" ><?php if(array_key_exists("knev",$errors)) echo $errors["knev"]; ?></p>
        </div>
        <div class=" mb-3">
          <label for="password1" class="form-label">Jelszó</label>
          <input type="password" class="form-control" placeholder="Kötelező" name="jelszo" id="password1">
          <p class="pt-2 text-danger" ><?php if(array_key_exists("jelszo",$errors)) echo $errors["jelszo"]; ?></p>
        </div>
        <div class="mb-3">
          <label for="password2" class="form-label">Jelszó megerősítése</label>
          <input type="password" class="form-control" placeholder="Kötelező" name="jelszo2" id="password2">
          <p class="pt-2 text-danger" ><?php if(array_key_exists("jelszo2",$errors)) echo $errors["jelszo2"]; ?></p>
        </div>
        <div class="mb-3">
          <label for="varos" class="form-label">Város</label>
          <input type="text" class="form-control" placeholder="Kötelező" name="varos" id="varos">
          <p class="pt-2 text-danger"><?php if(array_key_exists("varos",$errors)) echo $errors["varos"]; ?></p>
        </div>
        <div class="mb-3">
          <label for="irszam" class="form-label">Irányítószám</label>
          <input type="text" class="form-control" placeholder="Kötelező" name="irszam" id="irszam">
          <p class="pt-2 text-danger" ><?php if(array_key_exists("irszam",$errors)) echo $errors["irszam"]; ?></p>
        </div>
        <div class="mb-3">
          <label for="forname" class="form-label">Lakcím</label>
          <input type="text" class="form-control" placeholder="Kötelező" name="lakcim" id="lakcim">
          <p class="pt-2 text-danger" ><?php if(array_key_exists("lakcim",$errors)) echo $errors["lakcim"]; ?></p>
        </div>

        <button type="submit" name="kuldes" class="btn btn-primary">Regisztráció</button>
      </form>
    </div>
    <div class="col-4"></div>
  </div>
