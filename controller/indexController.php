<?php

// Inclut les fichiers nécessaires pour la configuration et le dépôt d'articles
require_once('../config/config.php'); 
require_once('../model/ArticleRepository.php');

// Déclare la classe IndexController
class IndexController {

    // Méthode principale pour gérer la page d'index
    public function index() {

        // Crée une instance de ArticleRepository pour interagir avec les articles
        $articleRepository = new ArticleRepository();
        // Appelle la méthode findAll pour obtenir tous les articles
        $articles = $articleRepository->findAll();

        // Inclut la vue pour afficher les articles
        require_once('../templates/pages/indexView.php');
    }
}

// Crée une instance de IndexController et appelle la méthode index pour exécuter le flux principal
// $indexController = new IndexController(); 
// $indexController->index();

?>
