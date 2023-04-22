<?php

require_once('./adatbazisKapcsolat.php');
require_once('_product_component.php');
require_once('_category_component.php');

?>

<div class="text-center my-5">
  <h2>Termékeink</h2>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="Tenth navbar example">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
      <form action="post">
        <ul class="navbar-nav">
          <?php
          if (!$result = $conn->query("SELECT * FROM kategoriak")) {
            die();
          }

          while ($row = mysqli_fetch_assoc($result)) {
            category($row['kategoriaNev'], $row['ID'],);
          }
          ?>
        </ul>
      </form>
    </div>
  </div>
</nav>

<!-- Section-->
<section class="py-5 ">
  <div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-left">

      <?php
      if (!$result = $conn->query("SELECT * FROM termekek")) {
        die();
      }

      while ($row = mysqli_fetch_assoc($result)) {
        product($row['nev'],  $row['ar'],  $row['kep'],  $row['ID'],);
      }
      ?>

    </div>
  </div>
</section>