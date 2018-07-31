<?php
session_start();
include 'models/database.php';
include 'models/contentType.php';
include 'controllers/addContentController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Ajouter du contenu</title>
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
                            <a class="nav-link text-white" href="#">Actualité</a>
                        </li>   
                        <li class="nav-item">
                            <a class="nav-link btn btnDeconnect" type="button" href="logout.php">Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container text-white" style="margin-top:5rem;">
            <div class="row">
                <div class="col-sm-4 presentation">
                    <div class="avatar">Mettre LAVATAR</div>
                    <h2><?= $_SESSION['userName'] ?></h2>
                    <h3><?= $_SESSION['nameCategory'] ?></h3>
                    <p><?= $_SESSION['nameCountry'] ?></p>
                    <h3>Liens des réseaux de la personne</h3>
                    <p>YouTube</p>
                    <p>Facebook</p>
                    <p>Twitter</p>
                    <p>Instagram</p>
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link nav-link-user" href="user.php">Mon Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active nav-link-user" href="addContent.php">Ajoute du contenu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-user" href="updateProfil.php">Modifier mon compte</a>
                        </li>                        
                    </ul>
                    <hr class="d-sm-none">
                </div>
                <div class="col-sm-8">
                    <!-- Début du formulaire d'ajout de contenu -->
                    <h1 class="text-center">Ajoute un contenu</h1>
                    <div class="publication presentation">
                        <form action="action" method="POST" enctype="multipart/form-data">
                             <div class="row">
                                <label for="titleContent" class="titleSendForm offset-lg-1 col-lg-10">Titre :</label>
                            </div>
                            <div class="row">
                                <input class="offset-lg-1 col-lg-10" type="text" name="titleContent" placeholder="Titre de ton contenu" />
                            </div>
                            <div class="row">
                                <label for="selectContentType" class="titleSendForm offset-lg-1 col-lg-10">Type de contenu :</label>
                            </div>
                            <div class="row">
                                <select class="contentType offset-lg-1 col-lg-10" name="selectContentType">
                                    <option selected disabled>Choix</option>
                                    <!-- Boucle qui va lire le tableau d'objet créé pour la liste des pays --> 
                                    <?php foreach ($getListContentType AS $listContentType) { ?>
                                        <!-- Je récupère dans la value l'id du pays -->
                                        <!-- Dans la balise option j'affiche le nom du pays -->
                                        <option value="<?= $listContentType->id ?>"><?= $listContentType->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>                           
                            <!-- Si c'est un audio ou video -->
                            <div class="row">
                                <label for="file" class="titleSendForm offset-lg-1 col-lg-10">Ton fichier :</label>
                            </div>
                            <div class="row">
                                <input type="file" class="offset-lg-1 col-lg-10" name="file" value="" />
                            </div>
                            <!-- Si c'est un texte -->
                            <div class="row">
                                <label for="contentText" class="titleSendForm offset-lg-1 col-lg-10">Ton Texte :</label>
                            </div>
                            <div class="row">
                                <textarea rows="4" class="offset-lg-1 col-lg-10" placeholder="Ecris ton texte ici"></textarea>
                            </div>
                            <div class="text-center">
                                <input class="btn btnSendContent" type="submit" name="sendContent" value="Ajouter" title="Ajoute ton contenu" />
                            </div>
                        </form>
                    </div                    
                </div>
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
    </body>
</html>


