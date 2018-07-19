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
        <title>Inscrivez-Vous</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/styleInscription.css" />
    </head>
    <body>
        <div class="imgBgInscription">
            <!-- Création du formulaire d'inscription -->
            <form action="inscription.php" method="POST">
                <h1 class="text-center">UNDE'R</h1>
                <p class="text-center">Inscrivez-vous pour voir le contenu des artistes</p>
                <!-- NOM -->
                <div class="container">
                    <!-- Si le formulaire a bien été envoyé, on le notifie a l'utilisateur -->
                    <?php if ($addSuccess) { ?>
                        <div class="row">
                            <p class="text-success">L'inscription sur Unde'R a été réalisé avec succès !</p>
                        </div>
                        <div class="row">
                            <a class="btn btn-primary" href="accueil.php" role="button">Retour Acceuil</a>
                        </div>
                    <?php } else { ?>
                        <div class="form-row">                           
                            <div class="form-group col-lg-12 text-center">
                                <!-- La partie php permet de garder sur le formulaire ce qui a été rentré par l'utilisateur-->
                                <input type="text" name="lastname" id="lastname" placeholder="Ton nom" value="<?= isset($user->lastname) ? $user->lastname : '' ?>" />
                                <p class="text-danger"><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?></p>
                            </div>
                        </div>
                        <!-- PRENOM -->
                        <div class="form-row">                           
                            <div class="form-group col-lg-12 text-center">
                                <input type="text" name="firstname" id="firstname" placeholder="Ton prénom" value="<?= isset($firstname) ? $firstname : '' ?>" />
                                <p class="text-danger"><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></p>
                            </div>
                        </div> 
                        <!-- PSEUDO -->
                        <div class="form-row">                           
                            <div class="form-group col-lg-12 text-center">
                                <input type="text" name="userName" id="userName" placeholder="Ton pseudo" value="<?= isset($userName) ? $userName : '' ?>" />
                                <p class="text-danger"><?= isset($formError['userName']) ? $formError['userName'] : '' ?></p>
                            </div>
                        </div>
                        <!-- MOT DE PASSE -->
                        <div class="form-row">                           
                            <div class="form-group col-lg-12 text-center">
                                <input type="password" name="password" id="password" placeholder="Ton mot de passe" value="" />
                                <p class="text-danger"><?= isset($formError['password']) ? $formError['password'] : '' ?></p>
                            </div>
                        </div>
                        <!-- VERIFICATION DU MOT DE PASSE -->
                        <div class="form-row">                           
                            <div class="form-group col-lg-12 text-center">
                                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirme ton mot de passe" value="" />
                                <p class="text-danger"><?= isset($formError['confirmPassword']) ? $formError['confirmPassword'] : '' ?></p>
                            </div>
                        </div>
                        <!-- EMAIL -->
                        <div class="form-row">                           
                            <div class="form-group col-lg-12 text-center">
                                <input type="email" name="mail" placeholder="Ton email" value="<?= isset($mail) ? $mail : '' ?>" />
                                <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : '' ?></p>
                            </div>
                        </div>
                        <!-- TELEPHONE -->
                        <div class="form-row">                           
                            <div class="form-group col-lg-12 text-center">                               
                                <input type="tel" name="phone" placeholder="Ton numéro de télephone" value="<?= isset($phone) ? $phone : '' ?>"  />
                                <p class="text-danger"><?= isset($formError['phone']) ? $formError['phone'] : '' ?></p> 
                            </div>                           
                        </div> 
                        <!-- STATUS -->
                        <div class="form-row">                            
                            <div class="form-group col-lg-12 text-center">
                                <div class="titleStatus"><label for="choiceCategory">Tu es ici pour :</label></div>
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
                        <!-- PAYS --> 
                        <div class="form-row">
                            <div class="form-group col-lg-12 text-center">  
                                <div class="titleCountry"><label for="choiceCountry">Ton pays :</label></div>
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
                    <div class="text-center buttonSend">
                        <input type="submit" name="sendForm" value="Envoyer" />
                    </div>
                <?php } ?>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
