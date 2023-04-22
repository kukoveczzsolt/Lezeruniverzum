<?php

function product($productname, $productprice, $productimg, $productid)
{
    $element = "
    <div class=\"col mb-5\">
    <div class=\"card h-100\">
      <!-- Product image-->
      <img class=\"card-img-top img-max\" src=\"$productimg\" />
      <!-- Product details-->
      <div class=\"card-body p-4\">
        <div class=\"text-center\">
          <!-- Product name-->
          <h5 class=\"fw-bolder\">$productname</h5>
          <!-- Product price-->
          <span>$productprice HUF</span>
        </div>
      </div>
      <!-- Product actions-->
      <div class=\"card-footer p-4 pt-0 border-top-0 bg-transparent\">
        <div class=\"text-center\">
          <a class=\"btn btn-outline-dark mt-auto\" href=\"#\">Kosárba</a>
        </div>
        <input type='hidden' name='product_id' value='$productid'>
      </div>
    </div>
  </div>
  ";
  echo $element;
}
?>