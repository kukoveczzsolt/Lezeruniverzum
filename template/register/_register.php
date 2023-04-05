<?php

function regisztracio()
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
            $jelszo =$_POST["jelszo"];
            $hash = password_hash($jelszo, PASSWORD_DEFAULT);
            $email = $_POST["email"];
            $knev = $_POST["knev"];
            $vnev = $_POST["vnev"];
            $varos = $_POST["varos"];
            $irszam = $_POST["irszam"];
            $cim = $_POST["lakcim"];
            $parancs = "INSERT INTO `felhasznalok`(`Jelszo`, `Email`, `Knev`, `Vnev`, `Varos`, `Iranyitoszam`, `Lakcim`) VALUES ('$hash','$email','$knev','$vnev','$varos','$irszam','$cim')";
            try{
                mysqli_query($conn,$parancs);
                echo "Sikeres Regisztráció";
            }
            catch(mysqli_sql_exception)
            {
                echo "Ez az Email már foglalt";
            }
                
        } 
        mysqli_close($conn);
    }
}
?>

<section class="gradient-custom">
    <link rel="stylesheet" href="template/register/login_register.css">
    <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      <div class="card bg-dark text-white mb-5" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Regisztráció</h2>
                <form method="post">
                    <div class="form-outline form-white mb-4">
                        <label class="form-label pt-3 fs-4">Email</label>
                        <input type="email" name="email" id="email" required="Kötelező" class="form-control form-control-lg text-center" />
                    </div>

                    <div class="form-outline fort-white mb-4">
                        <label class="form-label fs-4">Jelszó</label>
                        <input type="password" name="jelszo" id="jelszo" required class="form-control form-control-lg text-center" />
                    </div>
                    

                    <div class="form-outline fort-white mb-4">
                        <label class="form-label fs-4">Keresztnév</label>
                        <input type="text" name="knev" id="knev" required class="form-control form-control-lg text-center" />
                    </div>


                    <div class="form-outline fort-white mb-4">
                        <label class="form-label fs-4">Vezetéknév</label>
                        <input type="text" name="vnev" id="vnev" required class="form-control form-control-lg text-center" />
                    </div>


                    <div class="form-outline fort-white mb-4">
                        <label class="form-label fs-4">Város</label>
                        <input type="text" name="varos" id="varos" required class="form-control form-control-lg text-center" />
                    </div>

                    <div class="form-outline fort-white mb-4">
                        <label class="form-label fs-4">Irányítószám</label>
                        <input type="text" name="irszam" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" id="irszam" class="form-control form-control-lg text-center"/>
                    </div>

                    <div class="form-outline fort-white mb-4">
                        <label class="form-label fs-4">Lakcím</label>
                        <input type="text" required name="lakcim" id="lakcim" class="form-control form-control-lg text-center" />
                    </div>


                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="/template/register/elfelejtett.php">Elfelejtett jelszó?</a></p>

                    <p><?php regisztracio();?></p>
                    <button class="btn btn-outline-light btn-lg px-5" name="kuldes" type="submit">Regisztrálás</button>

                </form>
              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>
            </div>

            <div>
              <p class="mb-0">Már van fiókja? <a href="login.php" class="text-white-50 fw-bold">Bejelentkezés</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>