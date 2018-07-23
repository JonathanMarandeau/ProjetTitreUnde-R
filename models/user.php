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
        $query = 'INSERT INTO `apqm_user` (`lastname`, `firstname`, `userName`, `mail`, `phone`, `password`, `id_apqm_category`, `id_apqm_country`) VALUES (:lastname, :firstname, :userName, :mail, :phone, :password, :idCategory, :idCountry)';
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
     *  CONNECTION D'UN UTILISATEUR
     *  Méthode qui va permettre de récupérer les informations grâce au userName de l'utilisateur
     *  pour ensuite se connecter au site.
     *  Utilisation de l'hydratation pour affecter les valeurs directement dans la méthode 
     *  @return Boolean
     */
    public function getUserByUserName() {
        // Variable pour avoir un résultat de requête en boolean initialisé a false
        $queryGood = false;
        // Mise en place de la requête
        $query = 'SELECT `id`,`lastname`, `firstname`,`userName`, `mail`, `phone`,`password`, `id_apqm_category`, `id_apqm_country` FROM `apqm_user` WHERE `userName` = :userName';
        // J'insert ma requête dans une variable en récupérant les attributs du parent
        $getUser = $this->database->prepare($query);
        // J'attribue les valeurs via bindValue et je récupère les attributs de la classe via $this
        $getUser->bindValue(':userName', $this->userName, PDO::PARAM_STR);
        // Je test si la requête s'execute correctement
        if ($getUser->execute()) {
            // Je récupère dans une variable $user les informations du user pour les lire à travers un tableau d'objet 
            $user = $getUser->fetch(PDO::FETCH_OBJ);
            // Je test si $user est bien un objet
            if (is_object($user)){
                // J'hydrate (je renseigne) les champs du tableau user
                $this->id = $user->id;
                $this->lastname = $user->lastname;
                $this->firstname = $user->firstname;
                $this->userName = $user->userName;
                $this->mail = $user->mail;
                $this->phone = $user->phone;
                $this->password = $user->password;
                $this->id_apqm_category = $user->id_apqm_category;
                $this->id_apqm_country = $user->id_apqm_country;
                // Si l'hydratation est bonne on retourne la variable $queryGood en true
                $queryGood = true;
            }
        }
        return $queryGood;
    }
    
    
    
    
    // Je crée la méthode magique __destruct() pour se déconnecter à la base de donnée mySQL
    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }
}
