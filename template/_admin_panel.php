<?php
include "admin_panel_sql.php";
?>

<div class="container bg-light w-50">
    <div class="table-responsive">
      <table class="table table-striped">
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
    <form action="termek_hozzaadasa.php">
      <button type="submit" class="btn btn-primary " name="uj_termek">Új termék hozzáadása</button>
    </form>
</div>