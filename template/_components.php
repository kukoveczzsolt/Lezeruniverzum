<?php
function product_card($productName, $productPrice, $productImg, $productId)
{
    $element = "
    <div class=\"col mb-2\">
    <div class=\"card h-100\">
      <!-- Product image-->
      <a href=\"product.php?product=$productId\"><img class=\"card-img-top img-max\" src=\"$productImg\" /></a>
      <!-- Product details-->
      <div class=\"card-body p-4\">
        <div class=\"text-center\">
          <!-- Product name-->
          <h5 class=\"fw-bolder\">$productName</h5>
          <!-- Product price-->
          <span>$productPrice HUF</span>
        </div>
      </div>
    </div>
  </div>
  ";
  echo $element;
}

function category($kategoriaNev, $kategoriaID)
{
    $element = "
    <li class=\"nav-item\">
    <a href=\"products.php?category=$kategoriaID\" class=\"btn btn-light border\">$kategoriaNev</a>
    </li>";
  echo $element;
}



function product($productName, $productPrice, $productImg, $productDesc, $productId){
  $element = "
  <div class=\"text-center my-2\">
    <h2>$productName</h2>
</div>

<!-- Product section-->
<section class=\"py-2\">
    <div class=\"container px-4 px-lg-5 my-5\">
        <div class=\"row gx-4 gx-lg-5 align-items-center\">
            <div class=\"col-md-6\"><img class=\"card-img-top mb-5 mb-md-0\" src=\"$productImg\" alt=\"...\" />
            </div>
            <div class=\"col-md-6\">

                <div class=\"fs-5 mb-5\">
                    Ár: <span>$productPrice</span> Ft
                </div>
                <p class=\"lead\">$productDesc</p>
                <div class=\"d-flex\">
                    <form class=\"form-inline\" method=\"POST\">
                        <div class=\"form-group mb-2\">
                            <input type=\"number\" name=\"product_qty\" id=\"productQty\" class=\"form-control\" placeholder=\"Quantity\" min=\"1\" max=\"1000\" value=\"1\">
                            <input type=\"hidden\" name=\"product_id\" value=\"$productId\">
                        </div>
                        <div class=\"form-group mb-2 ml-2\">
                            <button type=\"submit\" class=\"btn btn-outline-dark flex-shrink-0\" name=\"add_to_cart\" value=\"add to cart\">Kosárba</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>";
echo $element;
}

function success($productName, $productImg)
{
  $element =
  "<section class=\"py-2 col-4\">
  <div class=\"container px-4 px-lg-5 my-2\">
     <div class=\"row gx-4 gx-lg-5 align-items-center\">
        <div class=\"row mt-3\">
           <div class=\"col-md-12\">
              <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                 <img src=\"$productImg\" class=\"rounded img-thumbnail mr-2\" style=\"width:40px;\"> $productName kosárhoz adva. <a href=\"cart.php\" class=\"alert-link\">Kosár megtekintése</a>
                 <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
              </div>
           </div>
        </div>
     </div>
  </div>
</section>";

  echo $element;
}

function success_order()
{
  $element =
  "<section class=\"py-2 col-4\">
  <div class=\"container px-4 px-lg-5 my-2\">
     <div class=\"row gx-4 gx-lg-5 align-items-center\">
        <div class=\"row mt-3\">
           <div class=\"col-md-12\">
              <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                 Sikeres megrendelés. <a href=\"index.php\" class=\"alert-link\">Vissza a főoldalra</a>
                 <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
              </div>
           </div>
        </div>
     </div>
  </div>
</section>";

  echo $element;
}

function cart_product_card($productName, $productPrice, $productImg, $productId, $productNumber, $key, $total)
{
  $element =
  "<div class=\"row gy-3 mb-4\">
  <div class=\"col-lg-5\">
     <div class=\"me-lg-5\">
        <div class=\"d-flex\">
          <a href=\"product.php?product=$productId\">
           <img src=\"$productImg\" class=\"border rounded me-3\" style=\"width: 96px; height: 96px;\" />
           <div class=\"\">
              <a href=\"product.php?product=$productId\" class=\"nav-link\">$productName</a>
            </div>
        </div>
     </div>
  </div>
  <div class=\"col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap\">
     <div class=\"\">
        <div class=\"mb-3 me-4\" style=\"width: 100px;\">
           <input type=\"number\" class=\"form-control cart-qty-single\" data-item-id=\"$key\" value=\"$productNumber\">
        </div>
     </div>
     <div class=\"\">
        <text class=\"h6\">$total Ft</text>
        <br />
        <small class=\"text-muted text-nowrap\"> $productPrice Ft/db</small>
     </div>
  </div>
  <div class=\"col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2\">
     <div class=\"float-md-end\">
        <a href=\"cart.php?action=remove&item=$key\" class=\"btn btn-outline-dark text-danger flex-shrink-0\">Törlés</a>
     </div>
     </div>
</div>";

  echo $element;
}

function order_product_card($productName, $productPrice, $productImg, $productId, $productNumber, $key, $total)
{
  $element =
  "<div class=\"row gy-3 mb-4\">
  <div class=\"col-lg-5\">
     <div class=\"me-lg-5\">
        <div class=\"d-flex\">
          <a href=\"product.php?product=$productId\">
           <img src=\"$productImg\" class=\"border rounded me-3\" style=\"width: 96px; height: 96px;\" />
           <div class=\"\">
              <a href=\"product.php?product=$productId\" class=\"nav-link\">$productName</a>
            </div>
        </div>
     </div>
  </div>
  <div class=\"col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap\">
     <div class=\"\">
        <div class=\"mb-3 me-4\" style=\"width: 100px;\">
           <text class=\"h6\">$productNumber db</text>
        </div>
     </div>
     <div class=\"\">
        <text class=\"h6\">$total Ft</text>
        <br />
        <small class=\"text-muted text-nowrap\"> $productPrice Ft/db</small>
     </div>
  </div>
</div>";

  echo $element;
}
?>