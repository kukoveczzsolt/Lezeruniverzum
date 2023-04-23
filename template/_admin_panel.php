<?php
include "admin_panel_sql.php";
?>

<div class="container bg-light ">
  <div class="table-responsive">
    <table class="table table-striped w-auto">
      <thead>
        <tr>
          <th scope="col">Termék Név</th>
          <th scope="col">Kategória</th>
          <th scope="col">Ár</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td><button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button> <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button> </td>
        </tr>
        <tr>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
          <td><button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button> <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button> </td>
        </tr>
        <tr>
          <td colspan="2">Larry the Bird</td>
          <td>@twitter</td>
          <td><button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button> <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button> </td>
        </tr>
      </tbody>
    </table>
  </div>
<form action="termek_hozzaadasa.php">
<button type="submit" class="btn btn-primary" onclick=>Új termék hozzáadása</button>
</form>
</div>