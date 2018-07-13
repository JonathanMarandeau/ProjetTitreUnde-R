<?php
// J'instancie un nouvel objet $user comme classe user
$user = new user();

//Création des regex pour controler les données rentré dans le formulaire
$regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]+$/';
$regexEmail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
$regexPhoneNumber = '/^[0-9]{10,10}$/';
$regexPseudo = '/^[a-zA-Z0-9_]{3,30}$/';

//Création d'un tableau pour retranscrire les erreurs lord du remplissage du formulaire
$formError = array();

// Variable addSuccess qui affichera un message si le formulaire est bien envoyé
$addSuccess = false;

//Nom
//Si le post est rempli alors
if (isset($_POST['lastname'])){
    // Variable lastname qui vérifie que les caractères speciaux soit converti en entité html (protection)
    $user->lastname = htmlspecialchars($_POST['lastname']);
    // Si la variable lastname ne correspond pas à la regex
    if (!preg_match($regexName, $user->lastname)){
        // J'affiche l'erreur 
        $formError['lastname'] = 'Ton nom ne doit contenir que des lettres';
   }
   // Si le post lastname n'est pas rempli (donc vide)
    if (empty($user->lastname)){
        // J'affiche l'erreur 
        $formError['lastname'] = 'Champs obligatoire';
    }          
}
//Prénom
// Si le post est rempli alors
if (isset($_POST['firstname'])){
    // Variable firstname qui vérifie que les caractères speciaux soit converti en entité html (protection)
    $user->firstname = htmlspecialchars($_POST['firstname']);
    // Si la variable firstname ne correspond pas à la regex
    if (!preg_match($regexName, $user->firstname)){
        // J'affiche l'erreur
        $formError['firstname'] = 'Ton prénom ne doit contenir que des lettres';
   }
   // Si le post est vide
    if (empty($user->firstname)){
        // J'affiche le message d'erreur
        $formError['firstname'] = 'Champs obligatoire';
    }          
}
// UserName
if (isset($_POST['userName'])){
    // Variable lastname qui vérifie que les caractères speciaux soit converti en entité html (protection)
    $user->userName = htmlspecialchars($_POST['userName']);
    // Si la variable lastname ne correspond pas à la regex
    if (!preg_match($regexPseudo, $user->userName)){
        // J'affiche l'erreur 
        $formError['userName'] = 'Ton pseudo n\'est pas valide !';
   }
   // Si le post lastname n'est pas rempli (donc vide)
    if (empty($user->userName)){
        // J'affiche l'erreur 
        $formError['userName'] = 'Champs obligatoire';
    }          
}
//Password
if (isset($_POST['password'])){
    $user->password = $_POST['password'];
    if (empty($user->password)){
        $formError['password'] = 'Champs obligatoire';
    }
}
//E-mail
if (isset($_POST['mail'])){
    $user->mail = $_POST['mail'];
    if (empty($user->mail)){
        $formError['mail'] = 'Champs obligatoire';
    }
}
//Télephone
if (isset($_POST['phone'])){
    $user->phone = $_POST['phone'];
    if (empty($user->phone)){
        $formError['phone'] = 'Champs obligatoire';
    }
}
//Profil sur le site 
if (isset($_POST['idCategory'])){
    // Tableau associatif
    $statusArray = array(1 => 'Beatmk\'R', 2 => 'Certif\'R', 3 => 'Product\'R', 4 => 'Rapp\'R', 5 => 'Shoot\'R');
    $user->idCategory = $statusArray[$_POST['idCategory']];
    if ($user->idCategory == NULL){
        $formError['idCategory'] = 'Sélection obligatoire';
    } 
}
//Pays
if (isset($_POST['idCountry'])){
    $countryArray = array(1 => 'Belgique', 2 => 'France', 3 => 'Luxembourg', 4 => 'Suisse');
    $user->idCountry = $countryArray[$_POST['idCountry']];
    if ($user->idCountry == NULL){
        $formError['idCountry'] = 'Sélection obligatoire';
    }
}

// Je vérifie que j'ai crée une entrée submit dans l'array $_POST, si présent on éxécute la méthode addUser()
  if (count($formError) == 0 && isset($_POST['sendForm'])){
    if (!$user->addUser()){
        $formError['sendForm'] = 'l\'envoie du formulaire à échoué';
    } else {
        $addSuccess = true;
    }
}
?>