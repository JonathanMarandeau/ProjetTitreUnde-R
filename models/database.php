<?php
// Je crée une class database
class database {
    // Je crée un attribut $database qui sera disponible dans ses enfants car je le mets en public
    public $database;
    // Je crée la méthode magique __construct pour se connecter à la base de donnée mySQL
    public function __construct() {
        // J'essaye de me connecter en instanciant un nouvelle objet PDO 
        try {
            $this->database = new PDO('mysql:host=localhost;dbname=under;charset=utf8', 'under', 'under');
            // "J'attrape" l'exception et j'arrête le script PHP
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage()); // Message d'erreur
        }
    }
    // Création de la méthode magique destruct qui permet de se déconnecter de la base de donnée
    public function __destruct() {
        $this->database = NULL;
    }

}
