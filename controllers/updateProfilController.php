<?php

// J'instancie un nouvel objet $user comme class apqm_user
$user = new apqm_user();

// 
if (isset($_SESSION['userName'])){
    $user->userName = $_SESSION['userName'];
}
$getAllDetailsUser = $user->getUserByUserName();

// J'instancie un nouvel objet $category comme classe category (pour la liste des types d'utilisateurs)
$category = new apqm_category();
// Je crée un tableau $getListCategory via la méthode getListTypesUser()
$getListCategory = $category->getListTypesUser();

// J'instancie un nouvel objet $country comme classe country (pour la liste des pays)
$country = new apqm_country();
// Je crée un tableau $getListCountry via la méthode getListCountry()
$getListCountry = $country->getListCountry();

// Création d'un tableau pour retranscrire les erreurs lord du remplissage du formulaire
$formError = array();

// Variable updateSuccess qui affichera un message si le formulaire est bien envoyé (initialisé à false)
$updateSuccess = false;


// Création des regex pour controler les données rentré dans le formulaire
// Regex pour le nom et le prénom
$regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]+$/';
// Regex pour l'email
$regexEmail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
// Regex pour le numéro de téléphone
$regexPhoneNumber = '/^[0-9]{10,10}$/';
// Regex pour le pseudo de l'utilisateur
$regexPseudo = '/^[a-zA-Z0-9_]{3,30}$/';

// NOM
// Si le post est rempli alors
if (isset($_POST['lastname'])){
    // Variable lastname qui vérifie que les caractères speciaux soit converti en entité html (protection)
    $user->lastname = htmlspecialchars($_POST['lastname']);
    // Si la variable lastname ne correspond pas à la regex
    if (!preg_match($regexName, $user->lastname)){
        // J'affiche l'erreur 
        $formError['lastname'] = '*Ton nom ne doit contenir que des lettres';
   }
   // Si le post lastname n'est pas rempli (donc vide)
    if (empty($user->lastname)){
        // J'affiche l'erreur 
        $formError['lastname'] = '*Champs obligatoire';
    }          
}

// PRENOM
// Si le post est rempli alors
if (isset($_POST['firstname'])){
    // Variable firstname qui vérifie que les caractères speciaux soit converti en entité html (protection)
    $user->firstname = htmlspecialchars($_POST['firstname']);
    // Si la variable firstname ne correspond pas à la regex
    if (!preg_match($regexName, $user->firstname)){
        // J'affiche l'erreur
        $formError['firstname'] = '*Ton prénom ne doit contenir que des lettres';
   }
   // Si le post est vide
    if (empty($user->firstname)){
        // J'affiche le message d'erreur
        $formError['firstname'] = '*Champs obligatoire';
    }          
}

// UserName
if (isset($_POST['userName'])){
    // Variable lastname qui vérifie que les caractères speciaux soit converti en entité html (protection)
    $user->userName = htmlspecialchars($_POST['userName']);
    // Si la variable lastname ne correspond pas à la regex
    if (!preg_match($regexPseudo, $user->userName)){
        // J'affiche l'erreur 
        $formError['userName'] = '*Ton pseudo n\'est pas valide !';
   }
   // Si le post userName n'est pas rempli (donc vide)
    if (empty($user->userName)){
        // J'affiche l'erreur 
        $formError['userName'] = '*Champs obligatoire';
    }          
}

//E-MAIL
if (isset($_POST['mail'])){
    $user->mail = $_POST['mail'];
    if (empty($user->mail)){
        $formError['mail'] = '*Champs obligatoire';
    }
}

//TELEPHONE
if (isset($_POST['phone'])){
    $user->phone = $_POST['phone'];
    if (empty($user->phone)){
        $formError['phone'] = '*Champs obligatoire';
    }
}

//PROFIL SUR LE SITE (TYPE D'UTILISATEUR) 
// Si le post existe alors
if (isset($_POST['choiceCategory'])) {
    $user->idCategory = $_POST['choiceCategory'];
    // Je vérifie que l'on récupère bien l'id du type d'utilisateur pour ne rien afficher d'autre (protection)
    if (is_nan($user->idCategory)) {
        $formError['choiceCategory'] = '*Sélectionne uniquement un type d\'utilisateur de la liste';
    }
    // Si on envoi le formulaire et que la clé n'existe pas dans le post (pas selectionné le type d'utilisateur) j'affiche un message
    } else if (isset($_POST['sendForm']) && !array_key_exists('choiceCountry', $_POST)) {
        $formError['choiceCategory'] = '*Sélectionné un type d\'utilisateur';
}

// PAYS
// Si le post existe alors
if (isset($_POST['choiceCountry'])) {
    $user->idCountry = $_POST['choiceCountry'];
    // Je vérifie que l'on récupère bien l'id du pays pour ne rien afficher d'autre (protection)
    if (is_nan($user->idCountry)) {
        $formError['choiceCountry'] = '*Sélectionne uniquement un pays de la liste';
    }
    // Si on envoi le formulaire et que la clé n'existe pas dans le post (pas selectionné le pays) j'affiche un message
    } else if (isset($_POST['sendForm']) && !array_key_exists('choiceCountry', $_POST)) {
        $formError['choiceCountry'] = '*Sélectionne un pays';
}

// Je vérifie que j'ai crée une entrée submit dans l'array $_POST, si présent on éxécute la méthode updateUserByUserId()
  if (count($formError) == 0 && isset($_POST['sendUpdateForm'])){
    if (!$user->updateUserByUserId()){
        $formError['sendUpdateForm'] = 'L\'envoie du formulaire à échoué';
    } else {
        $updateSuccess = true;
        // Je récupère tous les nouveaux attribut via le post (mise a jour des variables de sessions sans avoir a se reconnecter)
        $user->userName = $_POST['userName'];
        $user->getUserByUserName();
        $_SESSION['nameCategory'] = $user->nameCategory;
        $_SESSION['userName'] = $user->userName;
        $_SESSION['nameCountry'] = $user->nameCountry;
    }
}



