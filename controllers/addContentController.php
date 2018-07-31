<?php

// J'instancie un nouvel objet $contentType comme classe category (pour la liste des types de contenu)
$contentType = new apqm_contentType();
// Je crée un tableau $getListCategory via la méthode getListTypesUser()
$getListContentType = $contentType->getListContentType();

// Création de la regex pour le titre du contenu ajouté
$regexTitleContent = '/^[a-zA-Z0-9_ ]{3,50}$/';

// Création d'un tableau pour retranscrire les erreurs lors du remplissage du formulaire
$formError = array();

