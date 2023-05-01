<?php
require_once('./adatbazisKapcsolat.php');
require_once('_components.php');
error_reporting(0);

if (isset($_GET['action'], $_GET['item']) && $_GET['action'] == 'remove') {
    unset($_SESSION['cart_items'][$_GET['item']]);
    header('location:cart.php');
    exit();
}
?>

<div class="row my-5 px-2">
    <div class="col-md-2 col-lg-4"></div>
    <div class="col-md-8 col-lg-4">
        <div class="text-center py-w">
            <h2>Kosár</h2>
        </div>

        <?php
        if (empty($_SESSION['cart_items'])) {
            echo "A kosár üres";
            $totalCounter = 0;
        }

        if (isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0) {
            $totalCounter = 0;
            $itemCounter = 0;
            foreach ($_SESSION['cart_items'] as $key => $item) {

                $total = $item['product_price'] * $item['qty'];
                $totalCounter += $total;
                $itemCounter += $item['qty'];

                cart_product_card($item['product_name'], $item['product_price'], $item['product_img'], $item['product_id'], $item['qty'], $key, $total);
            }
        }
        echo
        "<div class=\"\">
            <ul class=\"list-group mb-3\">
                <li class=\"list-group-item d-flex justify-content-between primary primary-bg\">
                    <span>Termékek összege</span>
                    <strong>$totalCounter Ft</strong>
                </li>
            </ul>
        </div>

        <div class=\"float-end\">";
        if (isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0) {
            echo "<a href=\"checkout.php\" class=\"btn primary flex-shrink-0\">Tovább</a>";
        }

        echo  "</div>
    </div>
    <div class=\"col-md-2 col-lg-4\"></div>
</div>";

        ?>