<?php
// J'instancie un nouvel objet $user comme class apqm_user
$user = new apqm_user();


// Je vérifie que l'utilisateur appui bien sur le boutton de suppression pour lui retourner un message
if (isset($_GET['id'])) {
    $user->id = $_GET['id'];
    if (!$user->deleteUserByUserId()) {
        $formError['submitDeleteAccount'] = 'La suppression n\'a pas fonctionnée.';
    }
}

