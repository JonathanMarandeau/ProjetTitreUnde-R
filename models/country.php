<?php

class apqm_country extends database {
    // J'initialise mes variables de la table country qui seront choisit par l'utilisateur
    public $id = 0;
    public $name = '';
    
    public function __construct() {
        // J'appelle le construct du parent
        parent::__construct();
    }
    
    /**
     * LISTE DES PAYS
     * Je crée la méthode qui va me permettre d'afficher la liste des pays présent dans ma table country 
     */
    public function getListCountry() {
        /*
         * Je mets ma requête dans une variable $query.
         * Je souhaite récupérer les pays de ma table country pour les afficher dans une liste déroulante
         */
        $query = 'SELECT `id`, `name` FROM `apqm_country` ORDER BY `name`';
        // J'insère ma requête dans une variable en récupérant les attributs du parent
        $listCountry = $this->database->query($query);
        /*
         * Je crée une variable qui va me permettre de retourner le résultat.
         * La fonction fetchAll permet d'afficher toutes les données de la requête dans un tableau d'objet.
         */
        $resultListCountry = $listCountry->fetchAll(PDO::FETCH_OBJ);
        // Je retourne le résultat
        return $resultListCountry;        
    }
    
    public function __destruct() {
        parent::__destruct();
    }
}
