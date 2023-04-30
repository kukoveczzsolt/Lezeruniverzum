<?php
require_once('./adatbazisKapcsolat.php');
require_once('_components.php');
error_reporting(0);

if (!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items'])) {
    header('location:index.php');
    exit();
}

$email = $_SESSION['email'];
if (!$result = $conn->query("SELECT * FROM felhasznalok WHERE email LIKE \"$email\"")) {

}
if ($result->num_rows) {
    $row = mysqli_fetch_assoc($result);
    $userID = $row['ID'];
    $firstName = $row['knev'];
    $lastName = $row['vnev'];
}

$errors = array("zipcode" => "", "city" => "", "address" => "", "zipcode2" => "", "city2" => "", "address2" => "",);

$siker = "";

?>

<div class="row py-2">
    <div class="col-4"></div>
    <div class="col-4">
        <h4 class="card-title mb-4">Rendelés</h4>

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

                order_product_card($item['product_name'], $item['product_price'], $item['product_img'], $item['product_id'], $item['qty'], $key, $total);
            }
        }
        echo
        "<div class=\"\">
            <ul class=\"list-group mb-3\">
                <li class=\"list-group-item d-flex justify-content-between\">
                    <span>Termékek összege</span>
                    <strong>$totalCounter Ft</strong>
                </li>
            </ul>
        </div>
        </div>";
        ?>

        <?php
        if (isset($_POST['submit'])) {

            $zipcode;
            $city;
            $address;
            $zipcode2;
            $city2;
            $address2;
            $time = date('Y-m-d H:i:s');

            if (!empty($_POST["zipcode"])) {
                if (preg_match('#[0-9]{4}#', $_POST["zipcode"])) {
                    $zipcode = $_POST["zipcode"];
                    unset($errors["zipcode"]);
                } else {
                    $errors["zipcode"] = "Hibás irányítószám formátum";
                }
            } else {
                $errors["zipcode"] = "Irányítószám megadása kötelező";
            }

            if (!empty($_POST["city"])) {
                if (preg_match("/^[a-zA-ZáéíűúőóüöÁÉÍŰÚŐÓÜÖ]*$/u", $_POST["city"])) {
                    $city = $_POST["city"];
                    unset($errors["city"]);
                } else {
                    $errors["city"] = "Hibás város formátum";
                }
            } else {
                $errors["city"] = "Város megadása kötelező";
            }

            if (!empty($_POST["address"])) {
                if (preg_match("/^[0-9a-zA-ZáéíűúőóüöÁÉÍŰÚŐÓÜÖ]*$/u", $_POST["address"])) {
                    $address = $_POST["address"];
                    unset($errors["address"]);
                } else {
                    $errors["address"] = "Hibás cím formátum";
                }
            } else {
                $errors["address"] = "Cím megadása kötelező";
            }

            if (!empty($_POST["zipcode2"])) {
                if (preg_match('#[0-9]{4}#', $_POST["zipcode2"])) {
                    $zipcode2 = $_POST["zipcode2"];
                    unset($errors["zipcode2"]);
                } else {
                    $errors["zipcode2"] = "Hibás irányítószám formátum";
                }
            } else {
                $errors["zipcode2"] = "Irányítószám megadása kötelező";
            }

            if (!empty($_POST["city2"])) {
                if (preg_match("/^[a-zA-ZáéíűúőóüöÁÉÍŰÚŐÓÜÖ]*$/u", $_POST["city2"])) {
                    $city2 = $_POST["city2"];
                    unset($errors["city2"]);
                } else {
                    $errors["city2"] = "Hibás város formátum";
                }
            } else {
                $errors["city2"] = "Város megadása kötelező";
            }

            if (!empty($_POST["address2"])) {
                if (preg_match("/^[0-9a-zA-ZáéíűúőóüöÁÉÍŰÚŐÓÜÖ]*$/u", $_POST["address2"])) {
                    $address2 = $_POST["address2"];
                    unset($errors["address2"]);
                } else {
                    $errors["address2"] = "Hibás cím formátum";
                }
            } else {
                $errors["address2"] = "Cím megadása kötelező";
            }
            if (!empty($_POST["address2"])) {
                $shipping = $_POST["shipping"];
            }
        }

        if (count($errors) == 0) {
            try {
                $parancs = "INSERT INTO rendelesek (`felhaszID`, `rendlesIdopont`, `osszeg`, `szamlaVaros`, `szamlaIranyitoszam`, `szamlaLakcim`, `szallitVaros`, `szallitIranyitoszam`, `szallitLakcim`, `szallitMod`) VALUES ('$userID','$time','$totalCounter','$city', '$zipcode', '$address', '$city2', '$zipcode2', '$address2', '$shipping')";
                mysqli_query($conn, $parancs);

/* rendelés részletekbe való feltöltés hiányzik még innen*/

                $successMsg = true;
                unset($_SESSION['cart_items']);
            } catch (mysqli_sql_exception) {
                echo "Nem sikerült a megrendelés, próbáld újra!";
            }
        }

        

        if (isset($successMsg) && $successMsg == true) {

            echo "<div class=\"row my-5\">
                <div class=\"col-4\"></div>";

            success_order();

            echo "<div class=\"my-5\">
                <div class=\"col-4\"></div>";
        }
        ?>

        <div class="text-center my-5" <?php if (isset($successMsg) && $successMsg == true) {
                                            echo "hidden";
                                        } ?>>
            <h2>Számlázási adatok</h2>
        </div>
        <form class="needs-validation" method="POST" <?php if (isset($successMsg) && $successMsg == true) {
                                                            echo "hidden";
                                                        } ?>>
            <div class="row my-5">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email cím</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION["email"] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Vezetéknév</label>
                        <input type="text" class="form-control" id="lastName" name="last_name" value="<?php echo $lastName ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Keresztnév</label>
                        <input type="text" class="form-control" id="firstName" name="first_name" placeholder="<?php echo $firstName ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="zipCode" class="form-label">Irányítószám</label>
                        <input type="text" class="form-control" id="zipCode" name="zipcode" value="<?php echo (isset($zipcode) && !empty($zipcode)) ? $zipcode : '' ?>">
                        <p class="text-danger"><?php if (array_key_exists("zipcode", $errors)) echo $errors["zipcode"]; ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Város</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?php echo (isset($city) && !empty($city)) ? $city : '' ?>">
                        <p class="text-danger"><?php if (array_key_exists("city", $errors)) echo $errors["city"]; ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Cím</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo (isset($address) && !empty($address)) ? $address : '' ?>">
                        <p class="text-danger"><?php if (array_key_exists("address", $errors)) echo $errors["address"]; ?></p>
                    </div>
                </div>
            </div>

            <div class="text-center my-5">
                <h2>Szállítási cím</h2>
            </div>

            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="zipCode2" class="form-label">Irányítószám</label>
                        <input type="text" class="form-control" id="zipCode2" name="zipcode2" value="<?php echo (isset($zipcode2) && !empty($zipcode2)) ? $zipcode2 : '' ?>">
                        <p class="text-danger"><?php if (array_key_exists("zipcode2", $errors)) echo $errors["zipcode2"]; ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="city2" class="form-label">Város</label>
                        <input type="text" class="form-control" id="city2" name="city2" value="<?php echo (isset($city2) && !empty($city2)) ? $city2 : '' ?>">
                        <p class="text-danger"><?php if (array_key_exists("city2", $errors)) echo $errors["city2"]; ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="address2" class="form-label">Cím</label>
                        <input type="text" class="form-control" id="address2" name="address2" value="<?php echo (isset($address2) && !empty($address2)) ? $address2 : '' ?>">
                        <p class="text-danger"><?php if (array_key_exists("address2", $errors)) echo $errors["address2"]; ?></p>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>


            <div class="text-center my-5">
                <h2>Szállítási mód</h2>
            </div>

            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <form>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" value="1" id="shipping1" name="shipping" checked />
                            <label class="form-check-label" for="shipping1">DHL - 1500 Ft</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" value="2" id="shipping2" name="shipping" />
                            <label class="form-check-label" for="shipping2">MPL - 1500 Ft</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" value="3" id="shipping3" name="shipping" />
                            <label class="form-check-label" for="shipping3">Foxpost - 1000 Ft</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" value="4" id="shipping4" name="shipping" />
                            <label class="form-check-label" for="shipping4">Személyes átvétel - 0 Ft</label>
                        </div>
                </div>
                <div class="col-4"></div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="float-end">
                        <button type="submit" class="btn btn-outline-dark flex-shrink-0" name="submit" value="submit">Megrendelés</button>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        </form>