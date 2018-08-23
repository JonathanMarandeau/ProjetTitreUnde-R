<?php
include 'models/database.php';
include 'models/user.php';
include 'models/category.php';
include 'models/country.php';
include 'controllers/inscriptionController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Inscris Toi</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/styleInscription.css" />
    </head>
    <body>
        <!-- Création du formulaire d'inscription -->
        <form action="register.php" method="POST">
            <h1 class="text-center">UNDE'R</h1>
            <p class="text-center descriptionForm">Inscris toi pour voir le contenu des artistes</p>
            <div class="container">
                <!-- Si le formulaire a bien été envoyé, on le notifie a l'utilisateur -->
                <?php if ($addSuccess) { ?>
                    <div class="card text-white bg-success mb-3 registerGood">
                        <div class="card-body text-center">
                            <p class="card-text textSucces1"><strong>Super !</strong></p>
                            <p class="textSucces2">Tu fais maintenant parti de l'equipe !</p>
                            <p class="textSucces2">Retourne a l'accueil, connecte-toi et va tcheker les contenus qui t'interesse. </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a class="btn btn-dark" href="accueil.php" role="button">Retour Acceuil</a>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="inscriptionForm">
                    <div class="container">
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="card-body text-center">
                                        <div class="h1 mt-0 title text-white"><p>Informations</p></div>
                                        <!-- NOM -->
                                        <div class="row">                                           
                                            <!-- La partie php permet de garder sur le formulaire ce qui a été rentré par l'utilisateur-->
                                            <input class="col-lg-6 offset-lg-3 col-md-12" type="text" name="lastname" id="lastname" placeholder="Ton nom" value="<?= isset($user->lastname) ? $user->lastname : '' ?>" />
                                            <p class="text-danger col-lg-6 offset-lg-3 col-md-12"><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?></p>
                                        </div>
                                        <!-- PRENOM -->
                                        <div class="row">
                                            <input class="col-lg-6 offset-lg-3 col-md-12" type="text" name="firstname" id="firstname" placeholder="Ton prenom" value="<?= isset($user->firstname) ? $user->firstname : '' ?>" />
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
                                            <div class="titleCountry text-white"><label for="choiceCountry">Ton pays :</label></div>
                                        </div>
                                        <div class="row col-lg-6 offset-lg-3">
                                            <select class="country form-control" name="choiceCountry">
                                                <option selected disabled>Choix</option>
                                                <!-- Boucle qui va lire le tableau d'objet créé pour la liste des pays --> 
                                                <?php foreach ($getListCountry AS $listCountry) { ?>
                                                    <!-- Je récupère dans la value l'id du pays -->
                                                    <!-- Dans la balise option j'affiche le nom du pays -->
                                                    <option value="<?= $listCountry->id ?>"><?= $listCountry->name ?></option>
                                                <?php } ?>
                                            </select>
                                            <p class="text-danger offset-lg-1"><?= isset($formError['choiceCountry']) ? $formError['choiceCountry'] : '' ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card-body text-center">
                                        <div class="h1 mt-0 title text-white">Identifiant</div>
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
                                            <div class="titleStatus text-white"><label for="choiceCategory">Tu es ici pour : <a href="resumeUnder.php" title="Si tu as un doute"><img src="assets/images/iconsResume/question-mark.png" alt="point d'interogation" class="linkResume" /></a></label></div>
                                        </div>
                                        <div class="row offset-lg-3 col-lg-6">
                                            <select class="status form-control" name="choiceCategory">
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
                                <input class="btn btn-dark btnSendForm" type="submit" name="sendForm" value="Valider" title="Valide ton inscription" />
                                <a class="btn btn-dark btnSendForm" href="accueil.php" title="Retour à l'accueil" role="button">Retour</a>
                            </div>
                        </div>                      
                    </div>                     
                </div>                    
            <?php } ?>
        </form>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
