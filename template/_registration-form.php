<?php
include "register.php";
?>

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
      </div>
      <div class="mb-3">
        <label for="forname" class="form-label">Vezetéknév</label>
        <input type="text" class="form-control" placeholder="Kötelező" value="<?php $error?>" name="vnev" id="forname">
      </div>
      <div class=" mb-3">
        <label for="lastname" class="form-label">Keresztnév</label>
        <input type="text" class="form-control" placeholder="Kötelező" name="knev" id="lastname">
      </div>
      <div class=" mb-3">
        <label for="password1" class="form-label">Jelszó</label>
        <input type="password" class="form-control" placeholder="Kötelező" name="jelszo" id="password1">
      </div>
      <div class="mb-3">
        <label for="password2" class="form-label">Jelszó megerősítése</label>
        <input type="password" class="form-control" placeholder="Kötelező" name="jelszo2" id="password2">
      </div>
      <div class="mb-3">
        <label for="varos" class="form-label">Város</label>
        <input type="text" class="form-control" placeholder="Kötelező" name="varos" id="varos">
      </div>
      <div class="mb-3">
        <label for="irszam" class="form-label">Irányítószám</label>
        <input type="text" class="form-control" placeholder="Kötelező" name="irszam" id="irszam">
      </div>
      <div class="mb-3">
        <label for="forname" class="form-label">Lakcím</label>
        <input type="text" class="form-control" placeholder="Kötelező" name="lakcim" id="lakcim">
      </div>

      <button type="submit" name="kuldes" class="btn btn-primary">Regisztráció</button>
    </form>
  </div>
  <div class="col-4"></div>
</div>