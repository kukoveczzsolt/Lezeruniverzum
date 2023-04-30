
<div class="text-center my-5">
    <h2>Felhasználó adatai</h2>
</div>
<div class="row my-5">
    <div class="col-4"></div>
    <div class="col-4">
        <form method="post" action="includes/user_form_include.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email cím</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["email"] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Vezetéknév</label>
                <input type="text" name="vnev" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["vnev"] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keresztnév</label>
                <input type="text" name="knev" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["knev"] ?>">
            </div>
    </div>
    <div class="col-4"></div>
</div>

<div class="text-center my-5">
    <h2>Jelszó módosítása</h2>
</div>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Új jelszó</label>
                <input type="password" class="form-control" name="jelszo" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Új jelszó megerősítése</label>
                <input type="password" class="form-control" name="jelszo2" id="exampleInputPassword1">
            </div>
    </div>
    <div class="col-4"></div>
</div>

<div class="text-center my-5">
    <h2>Adatok mentése</h2>
</div>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jelszó</label>
                <input type="password" name="jelszo_kuldes" class="form-control mb-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                <p class="text-danger"><?php echo $_SESSION["error"]; unset($_SESSION["error"]); ?></p>
            </div>
            <button type="submit" class="btn btn-primary float-end" name="kuldes">Mentés</button>
    </div>
    <div class="col-4"></div>
    </form>
</div>