<?php require_once('../templates/partials/header.php'); ?>

<section>
    <h1>Le blog de la Piscine</h1>
    <?php if ($isDeleted) { ?>
        <p>L'article a été supprimé</p>
    <?php } else { ?>
        <p>Erreur lors de la suppression de l'article.</p>
    <?php } ?>
</section>

<?php require_once('../templates/partials/footer.php'); ?>