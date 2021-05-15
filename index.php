<?php session_start(); ?>


<!DOCTYPE html>
<html lang="fr">


	<head>
        <meta charset="utf-8">
        <title>Stack Overflow</title>
        <meta name="description" content="Posez vos questions et obtenez des réponses.">
        <?php require_once('css_inclusion.php'); ?>
    </head>






<body>
	<div class="container">
	<?php require_once('header.php') ?>

	<div class="body">
        Bienvenue sur Stack Overflow !
        <?php //echo $_SESSION["displayname"]; ?>
    </div>

	<?php require_once('footer.php') ?>






</div>
</body>
</html>