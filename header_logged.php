<!doctype html>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Lézer Univerzum</title>

  <!-- Bootstrap 5 CSS styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <!-- Custom CSS styles -->
  <link rel="stylesheet" href="style.css">
  <!-- Google Font styles -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

</head>

<body>

  <!-- Header -->
  <header class="p-3 primary-bg">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
          <use xlink:href="#bootstrap" />
        </svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="btn primary flex-shrink-0">Kezdőlap</a></li>
          <li><a href="products.php?category=1" class="btn primary flex-shrink-0">Termékeink</a></li>
          <li><a href="contact.php" class="btn primary flex-shrink-0">Kapcsolat</a></li>
        </ul>

        <div class="text-end">
          <div class="dropdown">
            <button class="btn primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $_SESSION["email"]; ?>
            </button>
            <ul class="dropdown-menu primary-bg">
              <li><a class="dropdown-item primary" href="#">Profil</a></li>
              <li><a class="dropdown-item primary" href="#">Rendelések</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item primary text-white" href="logout.php"> Kijelentkezés </a></li>
            </ul>
            <button onclick="window.location.href='cart.php';" type="button" class="btn primary flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
              </svg>
              <?php
              echo (isset($_SESSION['cart_items']) && count($_SESSION['cart_items'])) > 0 ? count($_SESSION['cart_items']) : '';
              ?>
            </button>
          </div>

        </div>
      </div>
    </div>
  </header>

  <!-- Header-->
  <header class="bg-light py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder">Lézer Univerzum</h1>
        <p class="lead fw-normal text-white-50 mb-0">Környezetbarát ajándékok mindenkinek.</p>
      </div>
    </div>
  </header>

  <main>