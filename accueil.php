<?php
session_start();
include 'models/database.php';
include 'models/user.php';
include 'controllers/accueilConnexion.php';
?>
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
        <header>
            <nav class="navbar navbar-expand-lg fixed-top">
                <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="resumeUnder.php"><img src="assets/images/iconsResume/question-mark.png" alt="point d'interogation" class="linkResume" /></a>
                        </li>   
                        <li class="nav-item">
                            <a class="nav-link text-white" href=""><img src="assets/images/iconsResume/iconFacebook.png" alt="icon Facebook" class="linkResume" /></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href=""><img src="assets/images/iconsResume/iconTwitter.png" alt="icon Twitter" class="linkResume" /></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container">            
            <div class="siteTitle">
                <h1>UNDE'R</h1>
                <div class="slogan">
                    <p>La Rencontre des Artistes Underground</p>
                </div>
                <div class="text-center btn-connection">
                    <!-- Boutton pour ouvrir la fenetre modal -->
                    <!-- Je cible via une ternaire le data-target (si il y'a une erreur on ouvre la modal erreur sinon n ouvre la modal classique) -->
                    <button type="button" class="btn btn-outline-primary btn-connect btn-lg" data-toggle="modal" data-target="<?= isset($formError['connexion']) ? '#modalError' : '#modalConnect' ?>">Connexion</button>
                    <a class="btn btn-outline-primary btn-firstVisit btn-lg" href="register.php" title="Créer un compte" role="button">Inscris Toi</a>
                </div>
                <!-- Fenetre modale -->
                <!-- Contenue du modal -->
                <form action="accueil.php" method="POST">
                    <!-- La ternaire permet d'afficher la modal au rafraichissement de la page si les données rentré ne sont pas bonne -->
                    <div class="modal fade" id="<?= isset($formError['connexion']) ? 'modalError' : 'modalConnect' ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Connecte-Toi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="siteNameModal">UNDE'R</p>
                                    <p><input class="form-control" type="text" name="userName" placeholder="Ton pseudo"></p>
                                    <p><input class="form-control" type="password" name="password" placeholder="Mot de passe"></p>
                                    <p class="text-danger"><?= isset($formError['connexion']) ? $formError['connexion'] : '' ?></p>
                                </div>
                                <div class="passwordLost">
                                    <a href="#">Mot de passe oublié ?</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-connect-modal" name="btnCloseModal" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-secondary btn-connect-modal" name="btnConnexion">Connexion</button>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Fin du modal -->
            </div>            
        </div>
        <footer>
            <div class="jumbotron text-center">
                <p class="text-white">&copy; 2018. UNDE'R. All rights reserved.</p>
            </div>
        </footer>         
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="assets/javascript/javascriptAccueil.js"></script>
    </body>
</html>
