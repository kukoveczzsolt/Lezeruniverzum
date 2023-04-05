<section class="gradient-custom">
    <link rel="stylesheet" href="template/register/login_register.css">
    <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      <div class="card bg-dark text-white mb-5" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Regisztráció</h2>
              <div class="form-outline form-white mb-4">
                <label class="form-label pt-3" for="typeEmailX">Email</label>
                <input type="email" id="email" class="form-control form-control-lg text-center" />
              </div>

              <div class="form-outline fort-white mb-4">
                <label class="form-label" for="typePasswordX">Felhasználónév</label>
                <input type="text" id="felhasznev" class="form-control form-control-lg text-center" />
              </div>

              <div class="form-outline fort-white mb-4">
                <label class="form-label" for="typePasswordX">Jelszó</label>
                <input type="password" id="jelszo" class="form-control form-control-lg text-center" />
              </div>
            

              <div class="form-outline fort-white mb-4">
                <label class="form-label" for="typePasswordX">Keresztnév</label>
                <input type="text" id="knev" class="form-control form-control-lg text-center" />
              </div>


              <div class="form-outline fort-white mb-4">
                <label class="form-label" for="typePasswordX">Vezetéknév</label>
                <input type="text" id="vnev" class="form-control form-control-lg text-center" />
              </div>


              <div class="form-outline fort-white mb-4">
                <label class="form-label" for="typePasswordX">Város</label>
                <input type="text" id="varos" class="form-control form-control-lg text-center" />
              </div>

              <div class="form-outline fort-white mb-4">
                <label class="form-label" for="typePasswordX">Irányítószám</label>
                <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" id="irszam" class="form-control form-control-lg text-center"/>
              </div>

              <div class="form-outline fort-white mb-4">
                <label class="form-label" for="typePasswordX">Lakcím</label>
                <input type="text" id="lakcim" class="form-control form-control-lg text-center" />
              </div>


              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="/template/register/elfelejtett.php">Elfelejtett jelszó?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Regisztrálás</button>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              <p class="mb-0">Már van fiókja? <a href="template/register/login.php" class="text-white-50 fw-bold">Bejelentkezés</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>