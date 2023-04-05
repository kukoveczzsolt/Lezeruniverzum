<?php
function bejelentkezes()
{
    if(isset($_POST["kuldes"]))
    {
        include ('adatbazisKapcsolat.php');

        if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        else
        {
            $jelszo = $_POST["jelszo"];
            $email = $_POST["email"];
            $parancs = "SELECT * from felhasznalok WHERE Email = '$email'";
            if($tabla = mysqli_query($conn,$parancs))
            {
              if(mysqli_num_rows($tabla)>0)
              {
                $row = mysqli_fetch_array($tabla);
                $jelszo_hash = $row['Jelszo'];
                if(password_verify($jelszo,$jelszo_hash))
                {
                  echo "Sikeres bejelentkezés";
                }
                else
                {
                  echo "Hibás Email/Jelszó";
                }
              }
              else
              {
                echo "Hibás Email-cím";
              }
                
            }
                
        } 
        mysqli_close($conn);
    }
}
?>

<section class="vh-100 gradient-custom">
    <link rel="stylesheet" href="template/register/login_register.css">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

            <form action="login.php" method="post">
              <h2 class="fw-bold mb-2 text-uppercase">Bejelentkezés</h2>
              <div class="form-outline form-white mb-4">
                <label class="form-label pt-3 fs-4">Email</label>
                <input type="email" name="email" id="email" required class="form-control form-control-lg" />
                
              </div>

              <div class="form-outline fort-white mb-4">
                <label class="form-label fs-4">Jelszó</label>
                <input type="password" name="jelszo" id="jelszo" required class="form-control form-control-lg" />
                
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Elfelejtett jelszó?</a></p>

              <p><?php bejelentkezes();?></p>
              <button class="btn btn-outline-light btn-lg px-5" name="kuldes" type="submit">Belépés</button>
            </form>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              <p class="mb-0">Még nem vagy regisztrálva? <a href="register.php" class="text-white-50 fw-bold">Regisztráció</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>