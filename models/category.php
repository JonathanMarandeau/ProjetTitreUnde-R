<?php

class apqm_category extends database {
// J'initialise mes variables de la table category qui seront choisit par l'utilisateur
    public $id = 0;
    public $name = '';
    
    public function __construct() {
        // J'appelle le construct du parent
        parent::__construct();
    }
    
    /**
     * Je crée la méthode qui va me permettre d'afficher la liste des types d'utilisateurs présent dans ma table category
     * LISTE DES TYPES D'UTILISATEUR
     */
    public function getListTypesUser() {
        /*
         * Je mets ma requête dans une variable $query.
         * Je souhaite récupérer les types d'utilisateur de ma table category pour les afficher dans une liste déroulante
         */
        $query = 'SELECT `id`, `name` FROM `apqm_category` ORDER BY `name`';
        // J'insère ma requête dans une variable en récupérant les attributs du parent
        $listTypesUser = $this->database->query($query);
        /*
         * Je crée une variable qui va me permettre de retourner le résultat.
         * La fonction fetchAll permet d'afficher toutes les données de la requête dans un tableau d'objet.
         */
        $resultListTypesUser = $listTypesUser->fetchAll(PDO::FETCH_OBJ);
        // Je retourne le résultat
        return $resultListTypesUser;        
    }
    
    public function __destruct() {
        parent::__destruct();
    }
}
