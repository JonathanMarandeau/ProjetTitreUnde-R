<?php 
session_start();
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
                <a class="navbar-brand text-white" href="#">Unde'R</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2 text-dark" type="search" placeholder="Recherche un artiste">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">GO !</button>
                    </form>
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Actualité</a>
                        </li>   
                        <li class="nav-item">
                            <button class="nav-link btn btn-danger text-white" href="#">Déconnexion</button>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container text-white">
            <h1 class="text-center">Modifie ton compte</h1>            
            <form action="action" method="POST">
                <div class="inscriptionForm">
                    <div class="container">
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="card-body text-center">
                                        <div class="h1 mt-0 title">Informations</div>
                                        <!-- NOM -->
                                        <div class="row">                                           
                                            <!-- La partie php permet de garder sur le formulaire ce qui a été rentré par l'utilisateur-->
                                            <input class="col-lg-6 offset-lg-3 col-md-12" type="text" name="lastname" id="lastname" placeholder="Ton nom" value="<?= isset($user->lastname) ? $user->lastname : '' ?>" />
                                            <p class="text-danger col-lg-6 offset-lg-3 col-md-12"><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?></p>
                                        </div>
                                        <!-- PRENOM -->
                                        <div class="row">
                                            <input class="col-lg-6 offset-lg-3 col-md-12" type="text" name="firstname" id="firstname" placeholder="Ton prénom" value="<?= isset($user->firstname) ? $user->firstname : '' ?>" />
                                            <p class="text-danger col-lg-6 offset-lg-3 col-md-12"><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></p>
                                        </div>
                                        <!-- EMAIL -->
                                        <div class="row">
                                            <input class="col-lg-6 offset-lg-3 col-md-12" type="email" name="mail" placeholder="Ton email" value="<?= isset($user->mail) ? $user->mail : '' ?>" />
                                            <p class="text-danger col-lg-6 offset-lg-3 col-md-12"><?= isset($formError['mail']) ? $formError['mail'] : '' ?></p>
                                        </div>
                                        <!-- TELEPHONE -->
                                        <div class="row">
                                            <input class="col-lg-6 offset-lg-3 col-md-12" type="tel" name="phone" placeholder="Ton phone" value="<?= isset($user->phone) ? $user->phone : '' ?>"  />
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
                                                    <option value="<?= $listCountry->id ?>"><?= $listCountry->name ?></option>
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
                                            <input class="col-lg-6 offset-lg-3 col-md-12" type="text" name="userName" id="userName" placeholder="Ton pseudo" value="<?= isset($user->userName) ? $user->userName : '' ?>" />
                                            <p class="text-danger col-lg-6 offset-lg-3 col-md-12"><?= isset($formError['userName']) ? $formError['userName'] : '' ?></p>
                                        </div>
                                        <!-- MOT DE PASSE -->
                                        <div class="row">
                                            <input class="col-lg-6 offset-lg-3 col-md-12" type="password" name="password" id="password" placeholder="Ton mot de passe" value="" />
                                            <p class="text-danger col-lg-6 offset-lg-3 col-md-12"><?= isset($formError['password']) ? $formError['password'] : '' ?></p>
                                        </div>
                                        <!-- VERIFICATION DU MOT DE PASSE -->
                                        <div class="row">
                                            <input class="col-lg-6 offset-lg-3 col-md-12" type="password" name="confirmPassword" id="confirmPassword" placeholder="Valide le" value="" />
                                            <p class="text-danger col-lg-6 offset-lg-3 col-md-12"><?= isset($formError['confirmPassword']) ? $formError['confirmPassword'] : '' ?></p>
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
                                                    <option value="<?= $listCategory->id ?>"><?= $listCategory->name ?></option>
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
                        </div>                      
                    </div>                     
                </div>
            </form>
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


