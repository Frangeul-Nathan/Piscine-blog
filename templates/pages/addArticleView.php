<?php require_once('../templates/partials/header.php'); ?>

<section>

    <h1> Le blog de la Piscine </h1>

    <form method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea>
        <br>
        <input type="submit" value="Submit">
    </form>

    <?php if (isset($isRequestOk) && $isRequestOk) { ?>

        <p> Article ajouté </p>
        
    <?php } ?>
	

</section>

<?php require_once('../templates/partials/footer.php'); ?>