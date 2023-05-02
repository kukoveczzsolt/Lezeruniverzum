<?php
include "adatbazisKapcsolat.php";

?>
<div class="container-fluid">
<div class="text-center">
    <h2>Felhasználó adatai</h2>
</div>
<div class="row my-5 px-2">
    <div class="col-md-2 col-lg-4"></div>
    <div class="col-md-8 col-lg-4">
        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label primary">Termék neve</label>
                <input type="email" name="email" class="form-control primary" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["email"] ?>">
            </div>
            <div class="mb-3">
                <label for="vnev" class="form-label primary">Kategória</label>
                <input type="text" name="vnev" class="form-control primary" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["vnev"] ?>">
            </div>
            <div class="mb-3">
                <label for="knev" class="form-label primary">Ár</label>
                <input type="text" name="knev" class="form-control primary" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["knev"] ?>">
            </div>
            <div class="mb-3">
                <label for="knev" class="form-label primary">Kép</label>
                <input type="text" name="knev" class="form-control primary" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row["knev"] ?>">
            </div>
        </form>
    </div>
    <div class="col-md-2 col-lg-4"></div>
</div>
</div>