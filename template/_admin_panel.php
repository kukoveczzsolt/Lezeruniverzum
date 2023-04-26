<?php
include "admin_panel_sql.php";
?>


<div class="container w-50">
  <div class="input-group mb-3 mt-3">
      <input type="text" class="form-control" placeholder="Termék neve" aria-label="Recipient's username" aria-describedby="button-addon2" id="termek_kereso" onkeyup="kereses()">
      <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Termék keresés</button>
      <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item" href="#termek_kereses">Termék keresés</a></li>
        <li><a class="dropdown-item" href="#kategoria_kereses">Kategória keresés</a></li>
      </ul>
  </div>
    <div class="table-responsive  ">
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
    </div>
    <form action="termek_hozzaadasa.php" class="pb-3">
      <button type="submit" class="btn btn-primary" name="uj_termek">Új termék hozzáadása</button>
    </form>
</div>

<script src="termek_kereso.js"></script>

</script>
