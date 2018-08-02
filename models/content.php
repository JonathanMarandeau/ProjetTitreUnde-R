<?php

class apqm_content extends database {
    
    // J'initialise mes variables d'input qui seront rempli par l'utilisateur
    public $id = 0;
    public $name = '';
    public $datePublication = '';
    public $id_apqm_user = 0;
    public $id_apqm_contentType = 0;
    public $id_apqm_contentShare = 0;
    
    // Je crée la méthode magique __construct pour se connecter à la base de donnée mySQL
    public function __construct() {
        // J'appelle le construct du parent
        parent::__construct();
    }
    
    /**
     *  AJOUT D'UN CONTENU PAR UN UTILISATEUR
     *  Je crée une méthode qui va permettre à l'utilisateur d'ajouter un contenu à sa page de profil
     */
    public function userAddContent() {
        /*
         * Insertion des données de l'utilisateur, à l'aide d'une requête préparé,
         * avec un INSERT INTO et le nom des champs de la table.
         * Récupération des valeurs des variables rentré par l'utlisateur via les marqueurs nominatifs 
         */
        $query = 'INSERT INTO `apqm_content` (`name`, `datePublication`, `id_apqm_user`, `id_apqm_contentType`, `id_apqm_contentShare`)'
                . 'VALUES (:name, :datePublication, :idUser, :idContentType, :idContentShare)';
        // J'insert ma requête dans une variable en récupérant les attributs du parent
        $addContentOnSite = $this->database->prepare($query);
        // J'attribue les valeurs via bindValue et je récupère les attributs de la classe via $this
        $addContentOnSite->bindValue(':name', $this->name, PDO::PARAM_STR);
        $addContentOnSite->bindValue(':datePublication', $this->datePublication, PDO::PARAM_STR);
        $addContentOnSite->bindValue(':idUser', $this->idUser, PDO::PARAM_STR);
        $addContentOnSite->bindValue(':idContentType', $this->idContentType, PDO::PARAM_STR);
        $addContentOnSite->bindValue(':idContentShare', $this->idContentShare, PDO::PARAM_STR);
        // J'utilise la méthode execute() via un return
        return $addContentOnSite->execute();
    }
    
    
    // Je crée la méthode magique __destruct() pour se déconnecter à la base de donnée mySQL
    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }
    
}
