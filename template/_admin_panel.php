<?php
if (!isset($_SESSION['email']) || $_SESSION["admin_e"] != 1) {
  header('location:index.php');
}
include "includes/admin_panel_include.php";

?>

<div class="text-center py-5">
    <h2>Admin panel</h2>
</div>
<div class="row">
  <div class="col-2"></div>
  <div class="container-fluid col-6">
    <div class="input-group mb-3 mt-3">
      <input type="text" class="form-control mt-3" placeholder="Keresés" aria-label="Recipient's username" aria-describedby="button-addon2" id="termek_kereso" onkeyup="kereses()">
      <button class="btn btn-outline-secondary dropdown-toggle mt-3" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="gomb">Termék keresés</button>
      <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item" href="#nev_kereses">Termék keresés</a></li>
        <li><a class="dropdown-item" href="#kategoria_kereses">Kategória keresés</a></li>
      </ul>
    </div>
    <div class="table-responsive">
      <table class="table table-striped" id="tabla">
        <thead>
          <tr>
            <th scope="col">Termék Név</th>
            <th scope="col">Kategória</th>
            <th scope="col">Ár</th>
          </tr>
        </thead>
        <tbody>
          <?php tabla_feltoltes(); ?>
        </tbody>
      </table>
      <form action="termek_hozzaadasa.php" class="pb-3">
        <button type="submit" class="btn primary-bg primary flex-shrink-0 float-end my-2" name="uj_termek">Új termék hozzáadása</button>
      </form>
    </div>
    </div>
    <div class="col-2"></div>
  

  <script src="termek_kereso.js"></script>

  </script>