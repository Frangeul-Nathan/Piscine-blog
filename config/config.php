<?php

// Configure les paramètres de cookie de session pour qu'ils expirent après 3600 secondes (1 heure)
session_set_cookie_params(3600);

// Classe pour gérer la connexion à la base de données
class DbConnection {

    // Propriétés pour stocker les informations de connexion
    private $dsn;
    private $username;
    private $password;

    // Constructeur de la classe qui initialise les propriétés avec les valeurs de connexion
    function __construct() {
        $this->dsn = 'mysql:host=localhost:3306;dbname=piscine_php'; // Data Source Name, qui contient les informations sur le type de base de données et son emplacement
        $this->username = 'root'; // Nom d'utilisateur pour la base de données
        $this->password = ''; // Mot de passe pour la base de données
    }

    // Méthode pour établir la connexion à la base de données
    public function connect() {
        try {
            // Crée un nouvel objet PDO pour se connecter à la base de données
            $pdo = new PDO($this->dsn, $this->username, $this->password);
            // Définit le mode d'erreur sur Exception pour gérer les erreurs plus proprement
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Retourne l'objet PDO
            return $pdo;
        } catch (PDOException $e) {
            // Affiche un message d'erreur en cas d'échec de la connexion
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }
}

?>
