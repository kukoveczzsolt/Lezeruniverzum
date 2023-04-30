<!doctype html>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Lézer Univerzum</title>

  <!-- Bootstrap 5 CSS styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <!-- Custom CSS styles -->
  <link rel="stylesheet" href="styles.css">

</head>

<body>



  <!-- Header -->
  <header class="p-3 bg-light">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="assets/products/logo.jpg" />
          </svg>
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="btn btn-outline-dark flex-shrink-0">Kezdőlap</a></li>
          <li><a href="products.php?category=1" class="btn btn-outline-dark flex-shrink-0">Termékeink</a></li>
          <!-- <li><a href="custom.php" class="nav-link px-2 text-black">Egyedi megrendelés</a></li> -->
          <li><a href="contact.php" class="btn btn-outline-dark flex-shrink-0">Kapcsolat</a></li>
        </ul>

        <div class="text-end">

          <button onclick="window.location.href='login.php';" type="button" class="btn btn-outline-dark flex-shrink-0">Belépés</button>
          <button onclick="window.location.href='cart.php';" type="button" class="btn btn-outline-dark flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
              <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <?php
            echo (isset($_SESSION['cart_items']) && count($_SESSION['cart_items'])) > 0 ? count($_SESSION['cart_items']) : '';
            ?>
          </button>

        </div>
      </div>
    </div>
  </header>

  <!-- Header-->
  <header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder">Lézer Univerzum</h1>
        <p class="lead fw-normal text-white-50 mb-0">Valami frappáns szlogen.</p>
      </div>
    </div>
  </header>

  <main>