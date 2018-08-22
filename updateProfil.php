<?php
// J'utilise le session_start pour utiliser les variables de session
session_start();
// Je m'assure que la session d'utilisateur est active sinon je redirige vers la page forbidden.php
if (empty($_SESSION['userName'])){
    header("Location: http://projettitre/forbidden.php");
}
include 'models/database.php';
include 'models/user.php';
include 'models/category.php';
include 'models/country.php';
include 'controllers/updateProfilController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Modifier ton profil</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/styleUser.css" />
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg fixed-top">
                <a class="navbar-brand text-white" href="#">Unde'R</a>
                <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2 text-dark" type="search" placeholder="Recherche un artiste">
                        <button class="btn btnSearch my-2 my-sm-0" type="submit">GO !</button>
                    </form>
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Actualite</a>
                        </li>   
                        <li class="nav-item">
                            <a class="nav-link btn btnDeconnect" type="button" href="logout.php">Deconnexion</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container text-white">
            <!-- Si le formulaire a bien été envoyé, je le notifie a l'utilisateur -->
            <?php if ($updateSuccess) { ?>
                <div class="container text-white">
                    <h1 class="text-center">Modifications effectuees !</h1>                         
                    <div class="inscriptionForm">
                        <div class="container">
                            <div class="card">                        
                                <p class="text-center">Tu peu maintenant retourner sur ton profil.</p>                 
                            </div> 
                            <div class="text-center buttonReturn">                                
                                <a class="btn btnUpdateForm" href="user.php" title="Retourne sur ton profil" role="button">Retour</a>
                            </div>
                        </div>                     
                    </div>    
                </div>                   
            <?php } else { ?>
                <form action="updateProfil.php" method="POST">                
                    <div class="inscriptionForm">
                        <div class="container">
                            <h1 class="text-center">Modifie ton compte</h1>
                            <div class="card">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="card-body text-center">
                                            <div class="h1 mt-0 title">Informations</div>
                                            <!-- NOM -->
                                            <div class="row">                                           
                                                <!-- La partie php permet de garder sur le formulaire ce qui a été rentré par l'utilisateur-->
                                                <input class="col-lg-6 offset-lg-3 col-md-12" type="text" name="lastname" id="lastname" placeholder="Ton nom" value="<?= $user->lastname ?>" />
                                                <p class="text-danger col-lg-6 offset-lg-3 col-md-12"><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?></p>
                                            </div>
                                            <!-- PRENOM -->
                                            <div class="row">
                                                <input class="col-lg-6 offset-lg-3 col-md-12" type="text" name="firstname" id="firstname" placeholder="Ton prenom" value="<?= $user->firstname ?>" />
                                                <p class="text-danger col-lg-6 offset-lg-3 col-md-12"><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></p>
                                            </div>
                                            <!-- EMAIL -->
                                            <div class="row">
                                                <input class="col-lg-6 offset-lg-3 col-md-12" type="email" name="mail" placeholder="Ton email" value="<?= $user->mail ?>" />
                                                <p class="text-danger col-lg-6 offset-lg-3 col-md-12"><?= isset($formError['mail']) ? $formError['mail'] : '' ?></p>
                                            </div>
                                            <!-- TELEPHONE -->
                                            <div class="row">
                                                <input class="col-lg-6 offset-lg-3 col-md-12" type="tel" name="phone" placeholder="Ton phone" value="<?= $user->phone ?>"  />
                                                <p class="text-danger col-lg-6 offset-lg-3 col-md-12"><?= isset($formError['phone']) ? $formError['phone'] : '' ?></p>
                                            </div>
                                            <!-- PAYS -->
                                            <div class="row col-lg-6 offset-lg-4">
                                                <div class="titleCountry "><label for="choiceCountry">Ton pays :</label></div>
                                            </div>
                                            <div class="row col-lg-6 offset-lg-4">
                                                <select class="country" name="choiceCountry">
                                                    <option selected disabled>Choix</option>
                                                    <!-- Boucle qui va lire le tableau d'objet créé pour la liste des pays --> 
                                                    <?php foreach ($getListCountry AS $listCountry) { ?>
                                                        <!-- Je récupère dans la value l'id du pays -->
                                                        <!-- Dans la balise option j'affiche le nom du pays -->
                                                        <!-- ternaire pour afficher le pays de l'utilisateur -->
                                                        <option value="<?= $listCountry->id ?>" <?= $listCountry->id == $user->id_apqm_country ? 'selected' : '' ?>><?= $listCountry->name ?></option>
                                                    <?php } ?>
                                                </select>
                                                <p class="text-danger"><?= isset($formError['choiceCountry']) ? $formError['choiceCountry'] : '' ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="card-body text-center">
                                            <div class="h1 mt-0 title">Identifiant</div>
                                            <!-- PSEUDO -->
                                            <div class="row">
                                                <input class="col-lg-6 offset-lg-3 col-md-12" type="text" name="userName" id="userName" placeholder="Ton pseudo" value="<?= $user->userName ?>" />
                                                <p class="text-danger col-lg-6 offset-lg-3 col-md-12"><?= isset($formError['userName']) ? $formError['userName'] : '' ?></p>
                                            </div>
                                            <!-- STATUS -->
                                            <div class="row col-lg-6 offset-lg-4">
                                                <div class="titleStatus"><label for="choiceCategory">Tu es ici pour :</label></div>
                                            </div>
                                            <div class="row col-lg-6 offset-lg-4">
                                                <select class="status" name="choiceCategory">
                                                    <option selected disabled>Choix</option>
                                                    <!-- Boucle qui va lire le tableau d'objet créé pour la liste des types d'utilisateurs --> 
                                                    <?php foreach ($getListCategory AS $listCategory) { ?>
                                                        <!-- Je récupère dans la value l'id du type de category -->
                                                        <!-- Dans la balise option j'affiche le nom du type de category -->
                                                        <!-- ternaire pour afficher la category de l'utilisateur -->
                                                        <option value="<?= $listCategory->id ?>" <?= $listCategory->id == $user->id_apqm_category ? 'selected' : '' ?>><?= $listCategory->name ?></option>
                                                    <?php } ?>
                                                </select>
                                                <p class="text-danger"><?= isset($formError['choiceCategory']) ? $formError['choiceCategory'] : '' ?></p>
                                            </div>
                                        </div>
                                    </div>                                
                                </div>
                                <div class="text-center buttonSend">
                                    <input class="btn btnUpdateForm" type="submit" name="sendUpdateForm" value="Modifier" title="Valide tes modifications" />
                                    <a class="btn btnUpdateForm" href="user.php" title="Retourne à ton profil" role="button">Retour</a>
                                </div>
                                <!-- Modal de confirmation de suppression (intégré au form pour garder la valeur du POST) -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Supprimer <?= $_SESSION['userName'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Es-tu sur de vouloir supprimer ton compte ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a type="button" class="btn btnDeleteAccount" name="submitDeleteAccount" href="deleteConfirm.php?id=<?= $user->id ?>">Supprimer</a>
                                                <button type="button" class="btn btnUpdateForm" data-dismiss="modal">Retour</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                      
                        </div>                     
                    </div>
                </form>
                <div class="container">
                    <h1 class="text-center">Suppression de ton compte</h1>
                    <div class="card">
                        <div class="row">
                            <div class="card-body text-center">
                                <p>Je ne vois pas ce que tu viens faire ici, mais si tu as reelement perdu la tete, tu peu supprimer ton compte definitivement !</p>                                    
                            </div>                                
                        </div> 
                        <div class="text-center">
                            <input class="btn btnDeleteAccount" data-toggle="modal" data-target="#exampleModalCenter" type="submit" name="deleteAccount" value="Supprimer" title="Tu fais une erreur" />
                            <a class="btn btnUpdateForm" href="user.php" title="Sage décision" role="button">Retour</a>
                        </div>                                             
                    </div>
                </div>
            <?php } ?>
        </div>
        <footer>
            <div class="jumbotron text-center">
                <p class="text-white">&copy; 2018. UNDE'R. All rights reserved.</p>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    </body>
</html>


