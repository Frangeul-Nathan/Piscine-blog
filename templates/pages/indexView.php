<?php require_once('../templates/partials/header.php'); ?>

<section>

	<h1> Le blog de la Piscine </h1>

	<?php foreach($articles as $article) { ?>


		<article>

			<h2><?php echo $article['title']; ?></h2>
			<a href="http://localhost/piscine-blog/public/show-article?id=<?php echo $article['article_id']; ?>">Afficher l'article</a>
			<a href="http://localhost/piscine-blog/public/delete-article?id=<?php echo $article['article_id']; ?>">Supprimer l'article</a>
		</article>


	<?php } ?>

</section>

<?php require_once('../templates/partials/footer.php'); ?>