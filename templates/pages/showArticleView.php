<?php require_once('../templates/partials/header.php'); ?>

<section>

	<h1> Le blog de la Piscine </h1>

		<article>

			<h2><?php echo $article['title']; ?></h2>
			<p><?php echo $article['content']; ?></p>
		</article>	

</section>

<?php require_once('../templates/partials/footer.php'); ?>