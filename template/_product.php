<?php
require_once('./adatbazisKapcsolat.php');
require_once('_components.php');
error_reporting(0);
?>

<?php
if (isset($_POST['add_to_cart']) && $_POST['add_to_cart'] == 'add to cart') {
    $productId = intval($_POST['product_id']);
    $productQty = intval($_POST['product_qty']);

    if (!$result = $conn->query("SELECT * FROM termekek WHERE ID LIKE $productId")) {
        die();
    }
    if ($result->num_rows) {
        $row = mysqli_fetch_assoc($result);
    }
    $calculateTotalPrice = $productQty * $row['ar'];

    $cartArray = [
        'product_id' => $productId,
        'qty' => $productQty,
        'product_name' => $row['nev'],
        'product_price' => $row['ar'],
        'total_price' => $calculateTotalPrice,
        'product_img' => $row['kep']
    ];

    if (isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items'])) {
        $productIDs = [];
        foreach ($_SESSION['cart_items'] as $cartKey => $cartItem) {
            $productIDs[] = $cartItem['product_id'];
            if ($cartItem['product_id'] == $productId) {
                $_SESSION['cart_items'][$cartKey]['qty'] = $productQty;
                $_SESSION['cart_items'][$cartKey]['total_price'] = $calculateTotalPrice;
                break;
            }
        }

        if (!in_array($productId, $productIDs)) {
            $_SESSION['cart_items'][] = $cartArray;
        }

        $successMsg = true;
    } else {
        $_SESSION['cart_items'][] = $cartArray;
        $successMsg = true;
    }
    if (isset($successMsg) && $successMsg == true) {
        echo "<div class=\"row my-5\">
        <div class=\"col-2\"></div>";

        success($row['nev'], $row['kep']);

        echo "<div class=\"my-5\">
        <div class=\"col-2\"></div>";
    }
}

if (isset($_GET['product']) && !empty($_GET['product']) && is_numeric($_GET['product'])) {
    $productId = $_GET['product'];

    if (!$result = $conn->query("SELECT * FROM termekek WHERE ID LIKE $productId")) {
        die();
    }

    if ($result->num_rows) {
        $row = mysqli_fetch_assoc($result);
        product($row['nev'],  $row['ar'],  $row['kep'],  $row['leiras'], $row['ID']);
    }
} else {
    $error = '404! No record found';
}

?>

