<?php

// J'instancie un nouvel objet $user comme class apqm_user
$user = new apqm_user();

// Création d'un tableau pour retranscrire les erreurs lors du remplissage du formulaire
$formError = array();

if (isset($_POST['btnConnexion'])) {
    $user->userName = $_POST['userName'];
    if (!$user->getUserByUserName()) {
        $formError['connexion'] = 'Ton pseudo ou mot de passe n\'est pas correct !';
    } else {
        // Je compare le mot de passe envoyé via le $_POST avec celui stocké dans la base via un password_verify (Mdp crypté dans la base)
        $passwordCorrect = password_verify($_POST['password'], $user->password);
        if ($passwordCorrect) { 
            $_SESSION['id'] = $user->id;
            $_SESSION['userName'] = $user->userName;
            $_SESSION['nameCategory'] = $user->nameCategory;
            $_SESSION['nameCountry'] = $user->nameCountry;
            header("Location: http://projetTitre/user.php");
        } else {
            $formError['connexion'] = 'Ton pseudo ou mot de passe n\'est pas correct !';
        }
    }
}
?>