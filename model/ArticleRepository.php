<?php

// Inclut le fichier de configuration pour pouvoir utiliser DbConnection
require_once('../config/config.php'); 

// Déclare la classe ArticleRepository
class ArticleRepository {

    // Méthode pour obtenir tous les articles de la base de données
    public function findAll() {
        
        // Crée une instance de DbConnection pour se connecter à la base de données
        $connection = new DbConnection();
        // Établit la connexion et obtient l'objet PDO
        $pdo = $connection->connect();

        // Exécute une requête SQL pour sélectionner tous les articles
        $stmt = $pdo->query("SELECT * FROM articles");
        // Récupère tous les résultats de la requête dans un tableau associatif
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Retourne le tableau d'articles
        return $articles;
    }

    public function insert($title, $content, $date) {

        // Model qui va instancier la connexion de la DB
        $connection = new DbConnection();
        // Établit la connexion et obtient l'objet PDO
        $pdo = $connection->connect();

        // Model
        $sql = "INSERT INTO articles (title, content, created_at) VALUES (:title, :content, :created_at)";
        $stmt = $pdo->prepare($sql);
        
        // Pour éviter les injections SQL par des petits fourbes
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':created_at', $date);


        // La view
        $isRequestOk = $stmt->execute(); 

        return $isRequestOk;

    }

    public function findByOneId($id) {
        
        // Crée une instance de DbConnection pour se connecter à la base de données
        $connection = new DbConnection();
        // Établit la connexion et obtient l'objet PDO
        $pdo = $connection->connect();

        // Exécute une requête SQL pour sélectionner un article par id
        $sql = "SELECT * FROM articles WHERE article_id = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        // Exécute la requête
        $stmt->execute();

        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retourne l'article par id
        return $article;
    }

    public function deleteById($id) {
        
        // Crée une instance de DbConnection pour se connecter à la base de données
        $connection = new DbConnection();
        // Établit la connexion et obtient l'objet PDO
        $pdo = $connection->connect();

        // Exécute une requête SQL pour sélectionner un article par id
        $sql = "DELETE FROM articles WHERE article_id = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        // Exécute la requête
        return $stmt->execute();

        
    }
}
?>
