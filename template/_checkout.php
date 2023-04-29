<?php 
session_start();
require_once('./adatbazisKapcsolat.php');
require_once('_components.php');
?>

<div class="row py-2">
    <div class="col-4"></div>
    <div class="col-4">
        <h4 class="card-title mb-4">Rendelés</h4>
       
        <?php
        if(empty($_SESSION['cart_items']))
        {
            echo "A kosár üres";
            $totalCounter = 0;
        }
        
        if(isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0)
        {
            $totalCounter = 0;
            $itemCounter = 0;
            foreach($_SESSION['cart_items'] as $key => $item){

            $total = $item['product_price'] * $item['qty'];
            $totalCounter+= $total;
            $itemCounter+=$item['qty'];

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

<div class="text-center my-5">
    <h2>Számlázási adatok</h2>
</div>

<div class="row my-5">
    <div class="col-4"></div>
    <div class="col-4">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email cím</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Vezetéknév</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keresztnév</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Város</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cím 1. sora</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cím 2. sora</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" />
                <label class="form-check-label" for="flexCheckDefault1">Szállítási és számlázási cím megegyezik</label>
            </div>
        </form>
    </div>
</div>

<div class="text-center my-5">
    <h2>Szállítási cím</h2>
</div>

<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Város</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cím 1. sora</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cím 2. sora</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" />
                <label class="form-check-label" for="flexCheckDefault1">Mentés későbbre</label>
            </div>
        </form>
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
                <input class="form-check-input" type="radio" value="" id="flexCheckDefault1" />
                <label class="form-check-label" for="flexCheckDefault1">DHL - 1500 Ft</label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" value="" id="flexCheckDefault1" />
                <label class="form-check-label" for="flexCheckDefault1">MPL - 1500 Ft</label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" value="" id="flexCheckDefault1" />
                <label class="form-check-label" for="flexCheckDefault1">Foxpost - 1000 Ft</label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" value="" id="flexCheckDefault1" />
                <label class="form-check-label" for="flexCheckDefault1">Személyes átvétel - 0 Ft</label>
            </div>
        </form>
    </div>
    <div class="col-4"></div>
</div>

<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <form>
            <div class="mb-3">
                <p class="mb-0">Üzenet a futárnak:</p>
                <div class="form-outline">
                    <textarea class="form-control" id="textAreaExample1" rows="2"></textarea>
                </div>
            </div>
            <div class="float-end">
                <button class="btn btn-success shadow-0 border">Vásárlás</button>
            </div>
        </form>
    </div>
    <div class="col-4"></div>
</div>