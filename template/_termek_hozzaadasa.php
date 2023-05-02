<?php
include_once "includes/termek_hozzaadasa_include.php";
?>

<div class="container primary-bg primary w-25">
<form method="post" action="includes/termek_hozzaadasa_include.php" enctype="multipart/form-data">
    <input type="text" class="form-control mt-3 my-2 primary" name="termek_nev" placeholder="Termék neve">
    <select class="form-select mt-3" aria-label="Default select example" name="kategoria_selected">
        <optgroup label="Kategóriák">
            <?php kategoria_listazas($conn); ?>
        </optgroup>
    </select>
    <input type="text" class="form-control mt-3" name="termek_ar" placeholder="Ár">
    
    <div class="input-group pt-3">
        <textarea class="form-control" aria-label="With textarea" placeholder="Leírás" name="leiras"></textarea>
    </div>

    <div class="input-group pt-3">
        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept=".png,.gif,.jpg" name="kep" maxlength="255">
    </div>

    <button type="submit" class="btn primary flex-shrink-0" name="letrehozas">Létrehozás</button>

    <!-- Új termék modal -->

    <button type="button" class="btn primary flex-shrink-0 my-3" data-bs-toggle="modal" data-bs-target="#uj_kategoria">Új kategória</button>

    <!-- Modal -->
    <div class="modal fade" id="uj_kategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Új kategória</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="includes/termek_hozzaadasa_include.php" method="post">
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="Kategória név" name="kategoria_nev">
                </div>

                <div class="modal-footer">
                    <form method="post">
                    <button type="submit" class="btn btn-primary" name="kategoria_letrehozas">Létrehozás</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégsem</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
