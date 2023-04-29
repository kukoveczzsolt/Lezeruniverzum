<?php
require_once('./adatbazisKapcsolat.php');
require_once('_components.php');
?>


<div class="text-center my-2">
    <h2>Javasolt termékeink</h2>
</div>

<!-- Section-->
<section class="py-2 ">
  <div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-left">

      <?php
      if (!$result = $conn->query("SELECT * FROM termekek WHERE kiemelt LIKE 1 LIMIT 4")) {
        die();
      }

      while ($row = mysqli_fetch_assoc($result)) {
        product_card($row['nev'],  $row['ar'],  $row['kep'],  $row['ID'],);
      }
      ?>

    </div>
  </div>
</section>