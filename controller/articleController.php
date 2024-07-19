<?php

require_once('../config/config.php');
require_once('../model/ArticleRepository.php');

class ArticleController {

    public function addArticle() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $title = $_POST['title'];
            $content = $_POST['content'];
            $dateNow = new DateTime('NOW');
            $date = $dateNow->format('Y-m-d H:i:s');
            
    
            // j'instancie l'ArticleRepository
            // et j'appelle la méthode insert
            // on lui donnant les valeurs pour le titre, le contenu et la date
            // que je veux insérer
            $articleRepository = new ArticleRepository();
            $isRequestOk = $articleRepository->insert($title, $content, $date);  

        }
          

          require_once('../templates/pages/addArticleView.php');

    }

    public function showArticle() {

        // Récupère l'id passé dans l'url de la requête
        $id=$_GET['id'];

        // On instancie le repository pour accéder aux méthodes de BDD
        $articleRepository = new ArticleRepository();
        // Appelle la méthode findByOneId pour obtenir un article spécifique
        $article = $articleRepository->findByOneId($id);

        require_once('../templates/pages/showArticleView.php');
    }

    public function deleteArticle() {

        // Récupère l'id passé dans l'url de la requête
        $id=$_GET['id'];

        // On instancie le repository pour accéder aux méthodes de BDD
        $articleRepository = new ArticleRepository();
        // Appelle la méthode findByOneId pour obtenir un article spécifique
        $isDeleted = $articleRepository->deleteById($id);

        require_once('../templates/pages/deleteArticleView.php');
    }
}

// Exécution de la méthode pour créer un article
// $addController = new AddArticle(); 
// $addController->showArticle();