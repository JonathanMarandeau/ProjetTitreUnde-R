<?php
include 'models/database.php';
include 'models/user.php';
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
                    <?php
                    if ($addSuccess) {
                        echo 'Formulaire envoyé';
                    }
                    ?>
                    <div class="form-row">                           
                        <div class="form-group col-lg-12 text-center">
                            <!-- La partie php permet de garder sur le formulaire ce qui a été rentré par l'utilisateur-->
                            <input type="text" name="lastname" id="lastname" placeholder="Ton nom" value="<?= isset($lastname) ? $lastname : '' ?>" />
                            <p><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?></p>
                        </div>
                    </div>
                    <!-- PRENOM -->
                    <div class="form-row">                           
                        <div class="form-group col-lg-12 text-center">
                            <input type="text" name="firstname" id="firstname" placeholder="Ton prénom" value="<?= isset($firstname) ? $firstname : '' ?>" />
                            <p><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></p>
                        </div>
                    </div> 
                    <!-- PSEUDO -->
                    <div class="form-row">                           
                        <div class="form-group col-lg-12 text-center">
                            <input type="text" name="userName" id="userName" placeholder="Ton pseudo" value="<?= isset($userName) ? $userName : '' ?>" />
                            <p><?= isset($formError['userName']) ? $formError['userName'] : '' ?></p>
                        </div>
                    </div>
                    <!-- MOT DE PASSE -->
                    <div class="form-row">                           
                        <div class="form-group col-lg-12 text-center">
                            <input type="password" name="password" id="password" placeholder="Ton mot de passe" value="" />
                            <p><?= isset($formError['password']) ? $formError['password'] : '' ?></p>
                        </div>
                    </div>
                    <!-- EMAIL -->
                    <div class="form-row">                           
                        <div class="form-group col-lg-12 text-center">
                            <input type="email" name="mail" placeholder="Ton email" value="<?= isset($mail) ? $mail : '' ?>" />
                            <p><?= isset($formError['mail']) ? $formError['mail'] : '' ?></p>
                        </div>
                    </div>
                    <!-- TELEPHONE -->
                    <div class="form-row">                           
                        <div class="form-group col-lg-12 text-center">                               
                            <input type="tel" name="phone" placeholder="Ton numéro de télephone" value="<?= isset($phone) ? $phone : '' ?>"  />
                            <p><?= isset($formError['phone']) ? $formError['phone'] : '' ?></p> 
                        </div>                           
                    </div> 
                    <!-- STATUS -->
                    <div class="form-row">                            
                        <div class="form-group col-lg-12 text-center">
                            <div class="titleStatus"><label for="idCategory">Tu es ici pour :</label></div>
                            <select class="status" name="idCategory">
                                <option selected disabled>Choix</option>
                                <option value="1">Beatmk'R</option>
                                <option value="2">Certif'R</option>
                                <option value="3">Product'R</option>
                                <option value="4">Rapp'R</option>
                                <option value="5">Shoot'R</option>
                            </select>
                            <p><?= isset($formError['idCategory']) ? $formError['idCategory'] : '' ?></p>
                        </div>
                    </div>
                    <!-- PAYS --> 
                    <div class="form-row">
                        <div class="form-group col-lg-12 text-center">  
                            <div class="titleCountry"><label for="idCountry">Ton pays :</label></div>
                            <select class="country" name="idCountry">
                                <option selected disabled>Choix</option>
                                <option value="1">Belgique</option>
                                <option value="2">France</option>
                                <option value="3">Luxembourg</option>
                                <option value="4">Suisse</option>                                   
                            </select>
                            <p><?= isset($formError['idCountry']) ? $formError['idCountry'] : '' ?></p>
                        </div>                       
                    </div>
                </div>
                <div class="text-center buttonSend">
                    <input type="submit" name="sendForm" value="Envoyer" />
                </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
