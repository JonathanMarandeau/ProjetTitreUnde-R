<?php
// J'effectue un session_start pour utiliser les variables de session.
session_start();
// Je retire toutes les variables de session via un session_unset.
session_unset();
// Je detruis la session via un session_destroy.
session_destroy();
include 'models/database.php';
include 'models/user.php';
include 'controllers/deleteController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/styleUser.css" />
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg fixed-top">
                <a class="navbar-brand text-white" href="accueil.php">Unde'R</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>                
            </nav>
        </header>
        <div class="container text-white">
            <h1 class="text-center">Suppression de ton compte</h1>                         
            <div class="inscriptionForm">
                <div class="container">
                    <div class="card">                        
                        <p class="text-center">La suppression de ton compte est effectué.</p> 
                        <p class="text-center">N'hésite pas à revenir le plus tôt possible, tu nous manque déjà !</p>
                    </div> 
                    <div class="text-center buttonReturn">                                
                        <a class="btn btnUpdateForm" href="accueil.php" title="Retourne à l'acceuil" role="button">Acceuil</a>
                    </div>
                </div>                     
            </div>    
        </div>
        <footer class="footer fixed-bottom">
            <div class="jumbotron text-center">
                <p class="text-white">&copy; 2018. UNDE'R. All rights reserved.</p>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    </body>
</html>



