<?php

class apqm_user extends database {

    // J'initialise mes variables d'input qui seront rempli par l'utilisateur
    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $userName = '';
    public $mail = '';
    public $phone = '';
    public $password = '';
    public $id_apqm_category = 0;
    public $id_apqm_country = 0;

    // Je crée la méthode magique __construct pour se connecter à la base de donnée mySQL
    public function __construct() {
        // J'appelle le construct du parent
        parent::__construct();
    }

    /**
     * AJOUT D'UN UTILISATEUR
     * Je crée une méthode qui va me permettre d'ajouter dans la BDD, les champs rempli dans le formulaire
     */
    public function addUser() {
        /*
         * Insertion des données de l'utilisateur, à l'aide d'une requête préparé,
         * avec un INSERT INTO et le nom des champs de la table.
         * Récupération des valeurs des variables rentré par l'utlisateur via les marqueurs nominatifs 
         */
        $query = 'INSERT INTO `apqm_user` (`lastname`, `firstname`, `userName`, `mail`, `phone`, `password`, `id_apqm_category`, `id_apqm_country`) '
                . 'VALUES (:lastname, :firstname, :userName, :mail, :phone, :password, :idCategory, :idCountry)';
        // J'insert ma requête dans une variable en récupérant les attributs du parent
        $addUserOnSite = $this->database->prepare($query);
        // J'attribue les valeurs via bindValue et je récupère les attributs de la classe via $this
        $addUserOnSite->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $addUserOnSite->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $addUserOnSite->bindValue(':userName', $this->userName, PDO::PARAM_STR);
        $addUserOnSite->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $addUserOnSite->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $addUserOnSite->bindValue(':password', $this->password, PDO::PARAM_STR);
        $addUserOnSite->bindValue(':idCategory', $this->idCategory, PDO::PARAM_INT);
        $addUserOnSite->bindValue(':idCountry', $this->idCountry, PDO::PARAM_INT);
        // J'utilise la méthode execute() via un return
        return $addUserOnSite->execute();
    }
    
    /**
     *  VERIFICATION QUE LE PSEUDO SOIT DISPONIBLE
     *  Méthode qui va permettre de vérifier si un userName est disponible
     *  @return Boolean 
     */
    public function checkFreeUserName() {
        // Je crée une variable pour avoir un résultat de requête en boolean initialisé a false
        $queryGoodUserName = false;
        // Je mets en place ma requête de vérification
        $query = 'SELECT COUNT(*) AS `userNameTaken` FROM `apqm_user` WHERE `userName` = :userName';
        // J'insert ma requête dans une variable en récupérant les attributs du parent
        $getFreeUserName = $this->database->prepare($query);
        // J'attribue les valeurs via bindValue et je récupère les attributs de la classe via $this
        $getFreeUserName->bindValue(':userName', $this->userName, PDO::PARAM_STR);
        // Je mets ensuite en place une condition en fonction du résultat
        if ($getFreeUserName->execute()) {
            // Si la query s'execute alors je le transforme en tableau d'objet
            $queryGoodUserName = $getFreeUserName->fetch(PDO::FETCH_OBJ);
        // Sinon
        } else {
            $queryGoodUserName = false;
        }
        return $queryGoodUserName;
    }
    
    /**
     *  VERIFICATION QUE LE MAIL SOIT DISPONIBLE
     *  Méthode qui va permettre de vérifier si un mail est disponible
     *  @return Boolean 
     */
    public function checkFreeMail() {
        // Je crée une variable pour avoir un résultat de requête en boolean initialisé a false
        $queryGoodMail = false;
        // Je mets en place ma requête de vérification
        $query = 'SELECT COUNT(*) AS `mailTaken` FROM `apqm_user` WHERE `mail` = :mail';
        // J'insert ma requête dans une variable en récupérant les attributs du parent
        $getFreeMail = $this->database->prepare($query);
        // J'attribue les valeurs via bindValue et je récupère les attributs de la classe via $this
        $getFreeMail->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        // Je mets ensuite en place une condition en fonction du résultat
        if ($getFreeMail->execute()) {
            // Si la query s'execute alors je le transforme en tableau d'objet
            $queryGoodMail = $getFreeMail->fetch(PDO::FETCH_OBJ);
        // Sinon
        } else {
            $queryGoodMail = false;
        }
        return $queryGoodMail;
    }

    /**
     *  CONNEXION D'UN UTILISATEUR - RÉCUPERATION DES DONNÉES D'UTILISATERUR
     *  Méthode qui va permettre de récupérer les informations grâce au userName de l'utilisateur
     *  pour ensuite se connecter au site.
     *  Utilisation de l'hydratation pour affecter les valeurs directement dans la méthode 
     *  @return Boolean
     */
    public function getUserByUserName() {
        // Variable pour avoir un résultat de requête en boolean initialisé à false
        $queryGood = false;
        // Mise en place de la requête
        $query = 'SELECT `apqm_user`.`id`, `apqm_user`.`lastname`, `apqm_user`.`firstname`, `apqm_user`.`userName` AS `userName`, `apqm_user`.`mail`, `apqm_user`.`phone`, `apqm_user`.`password`, `apqm_user`.`id_apqm_category`, `apqm_user`.`id_apqm_country`, `apqm_category`.`name` AS `nameCategory`, `apqm_country`.`name` AS `nameCountry`'
                . 'FROM `apqm_user` '
                . 'LEFT JOIN `apqm_category`'
                . 'ON `apqm_user`.`id_apqm_category` = `apqm_category`.`id`'
                . 'LEFT JOIN `apqm_country`'
                . 'ON `apqm_user`.`id_apqm_country` = `apqm_country`.`id`'
                . 'WHERE `apqm_user`.`userName` = :userName';
        // J'insert ma requête dans une variable en récupérant les attributs du parent
        $getUser = $this->database->prepare($query);
        // J'attribue les valeurs via bindValue et je récupère les attributs de la classe via $this
        $getUser->bindValue(':userName', $this->userName, PDO::PARAM_STR);
        // Je test si la requête s'execute correctement
        if ($getUser->execute()) {
            // Je récupère dans une variable $user les informations du user pour les lire à travers un tableau d'objet 
            $user = $getUser->fetch(PDO::FETCH_OBJ);
            // Je test si $user est bien un objet
            if (is_object($user)) {
                // J'hydrate (je renseigne) les champs du tableau user
                $this->id = $user->id;
                $this->lastname = $user->lastname;
                $this->firstname = $user->firstname;
                $this->userName = $user->userName;
                $this->mail = $user->mail;
                $this->phone = $user->phone;
                $this->password = $user->password;
                $this->id_apqm_category = $user->id_apqm_category;
                $this->nameCategory = $user->nameCategory;
                $this->id_apqm_country = $user->id_apqm_country;
                $this->nameCountry = $user->nameCountry;
                // Si l'hydratation est bonne on retourne la variable $queryGood en true
                $queryGood = true;
            }
        }
        return $queryGood;
    }

    /**
     *  MODIFICATION D'UN UTILISATEUR
     *  Méthode qui va permettre de modifier les données de l'utilisateur grâce a l'id
     */
    public function updateUserByUserId() {
        // Requête pour permettre à l'utilisateur de modifier ses données
        $query = 'UPDATE `apqm_user` SET `lastname` = :lastname, `firstname` = :firstname, `userName` = :userName, `mail` = :mail, `phone` = :phone, `id_apqm_country` = :idCountry, `id_apqm_category` = :idCategory '
                . 'WHERE `id` = :id';
        // J'insert ma requête dans une variable en récupérant les attributs du parent
        $updateUser = $this->database->prepare($query);
        // J'attribue les valeurs via bindValue et je récupère les attributs de la classe via $this
        $updateUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateUser->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $updateUser->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $updateUser->bindValue(':userName', $this->userName, PDO::PARAM_STR);
        $updateUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $updateUser->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $updateUser->bindValue(':idCountry', $this->idCountry, PDO::PARAM_INT);
        $updateUser->bindValue(':idCategory', $this->idCategory, PDO::PARAM_INT);
        // J'exécute la requête via un return 
        return $updateUser->execute();
    }

    /**
     *  SUPPRESSION D'UN UTILISATEUR
     *  Méthode qui va permettre de supprimer toutes les données d'un utilisateur grâce à l'id
     */
    public function deleteUserByUserId() {
        /**
         *  Je crée une requête qui va me permettre de supprimer toutes les données de l'utilisateur
         *  Je 'delete' dans la table 'apqm_user' quand l' 'id' est sélectionné via le marqueur nominatif (la variable de session active)
         */
        $query = 'DELETE FROM `apqm_user` WHERE `id` = :id';
        // J'insert ma requête dans une variable en récupérant les attributs du parent
        $deleteUser = $this->database->prepare($query);
        // J'attribue les valeurs via bindValue et je récupère les attributs de la classe via $this
        $deleteUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        // J'exécute la requête via un return 
        return $deleteUser->execute();
    }

    // Je crée la méthode magique __destruct() pour se déconnecter à la base de donnée mySQL
    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}
