<?php

class apqm_contentType extends database {
    // J'initialise les variables de la table apqm_contentType qui seront sélectionné par l'utilisateur
    public $id = 0;
    public $name = '';
    
    public function __construct() {
        // J'appelle le construct du parent
        parent::__construct();
    }
    
    /**
     *  LISTE DES TYPES DE CONTENUS
     *  Je crée la méthode qui va me permettre d'afficher le type de contenu dans une liste déroulante
     */
    public function getListContentType() {
        /*
         * Je mets ma requête dans une variable $query.
         * Je souhaite récupérer les types de contenu de ma table apqm_contentType pour les afficher dans une liste déroulante
         */
        $query = 'SELECT `id`, `name` FROM `apqm_contentType` ORDER BY `name`';
        // J'insère ma requête dans une variable en récupérant les attributs du parent
        $listContentType = $this->database->query($query);
        /*
         * Je crée une variable qui va me permettre de retourner le résultat.
         * La fonction fetchAll permet d'afficher toutes les données de la requête dans un tableau d'objet.
         */
        $resultListContentType = $listContentType->fetchAll(PDO::FETCH_OBJ);
        // Je retourne le résultat
        return $resultListContentType;        
    }
    
    public function __destruct() {
        parent::__destruct();
    }
}
