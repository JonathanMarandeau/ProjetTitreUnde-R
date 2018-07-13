<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Accueil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/styleaccueil.css" />
  </head>
  <body>
    <div class="welcomeImg">
      <div class="container">
          <a href="resumeUnder.php" class="justify-content-end">Qu'est-ce qu'Unde'R ?</a>
        <div class="siteTitle">
          <h1>UNDE'R</h1>
            <div class="slogan">
              <p>La Rencontre des Artistes Underground</p>
            </div>
            <div class="text-center btn-connection">
             <!-- Boutton pour ouvrir la fenetre modal -->
            <button type="button" class="btn btn-outline-primary btn-connect btn-lg" data-toggle="modal" data-target="#modalConnect">Connection</button>
            <a class="btn btn-outline-primary btn-firstVisit btn-lg" href="inscription.php" title="Créer un compte" role="button">Inscrivez-vous</a>
            </div>
          <!-- Fenetre modale -->
          <!-- Contenue du modal -->
            <div class="modal fade" id="modalConnect" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Connectez-Vous</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <p class="siteNameModal">UNDE'R</p>
                      <p><input type="text" name="idConnection" placeholder="Nom d'utilisateur"></p>
                      <p><input type="password" name="passwordConnection" placeholder="Mot de passe"></p>
                  </div>
                    <div class="passwordLost">
                        <a href="#">Mot de passe oublié ?</a>
                    </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-connect-modal" data-dismiss="modal" href="#">Connection</button>
                  </div>

                </div>
              </div>
            </div>
          <!-- Fin du modal -->
        </div>
        <div class="text-center">
          <div class="rightReserved">
            <p>&copy; 2018. Nom du site. All rights reserved.</p>
          </div>
        </div>
      </div>
    </div>
    <script src="javascriptAccueil.js"></script> 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
