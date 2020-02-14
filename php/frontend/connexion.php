<!DOCTYPE html>

<!-- cd (espace)  puis $ cd Documents/Openclassroom/P4_coste_benoit -->

<html lang="fr">
<?php require_once('headScript.php');?>
<body>
<div class="container">
  <?php require_once('header.php');?>
  <h1 class="text-center m-5">CONNEXION</h1>	
  <div class="row">
    <?php require_once('menu.php');?>
    <main class="login-form">
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">Veillez vous connecter</div>
                  <div class="card-body">
                    <form action="" method="">
                      <div class="form-group row">
                        <label for="email_address" class="col-md-6 col-form-label text-md-right">Adresse Email</label>
                        <div class="col-md-6">
                          <input type="text" id="email_address" class="form-control" name="email-address" required autofocus>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-md-6 col-form-label text-md-right">Mot de Passe</label>
                        <div class="col-md-6">
                          <input type="password" id="password" class="form-control" name="password" required>
                        </div>
                      </div>
                      <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                              Connexion
                          </button>                            
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </main>

  </div>
</div>
<?php require_once('footer.php');?>
</script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>