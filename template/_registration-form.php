<?php
include "register.php";
?>

  <link rel="stylesheet" href="register.css">

  <div class="text-center my-2">
    <h2>Regisztráció</h2>
  </div>

  <div class="row py-5 px-2">
    <div class="col-md-2 col-lg-4"></div>
    <div class="col-md-8 col-lg-4">
      <form action="registration.php" method="post">
      
        <div class="mb-3">
          <!--<label for="email" class="form-label"></label>-->
          <input type="email" class="form-control" placeholder="Email" name="email" id="email" aria-describedby="emailHelp">
          <p class="text-danger"><?php if(array_key_exists("email",$errors)) echo $errors["email"]; ?></p>
          
        </div>
        <div class="mb-3">
          <label for="forname" class="form-label"></label>
          <input type="text" class="form-control" placeholder="Vezetéknév" name="vnev" id="forname">
          <p class="text-danger"><?php if(array_key_exists("vnev",$errors)) echo $errors["vnev"]; ?></p>
        </div>
        <div class=" mb-3">
          <label for="lastname" class="form-label"></label>
          <input type="text" class="form-control" placeholder="Keresztnév" name="knev" id="lastname">
          <p class="text-danger" ><?php if(array_key_exists("knev",$errors)) echo $errors["knev"]; ?></p>
        </div>
        <div class=" mb-3">
          <label for="password1" class="form-label"></label>
          <input type="password" class="form-control" placeholder="Jelszó" name="jelszo" id="password1">
          <p class="text-danger" ><?php if(array_key_exists("jelszo",$errors)) echo $errors["jelszo"]; ?></p>
        </div>
        <div class="mb-3">
          <label for="password2" class="form-label"></label>
          <input type="password" class="form-control" placeholder="Jelszó megerősítése" name="jelszo2" id="password2">
          <p class="text-danger" ><?php if(array_key_exists("jelszo2",$errors)) echo $errors["jelszo2"]; ?></p>
        </div>
        <div class="float-end pb-2">
        <p><?php echo $siker ?></p>
        <button type="submit" name="kuldes" class="btn primary flex-shrink-0">Regisztráció</button>
        </div>
      </form>
    </div>
    <div class="col-md-2 col-lg-4"></div>
  </div>
