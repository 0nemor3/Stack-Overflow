<?php session_start(); ?>


<!DOCTYPE html>
<html lang="fr">


	<head>
        <meta charset="utf-8">
        <title>Stack Overflow</title>
        <meta name="description" content="Posez vos questions et obtenez des réponses.">
        <link rel="icon" type="image/ico" href="img/favicon.ico">
        <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
    </head>






<body>
	<div class="container">
	<?php require_once('header.php') ?>

	<div class="body">
		<div class="content">
			<div class="content__left">
				<h1>Join the Stack Overflow community</h1>
				<div class="content__ask"><span></span>Get unstuck — ask a question</div>
				<div class="content__unlock"><span></span>Unlock new privileges like voting and commenting</div>
				<p class="content__start">Get Stack Overflow now!</p>
			</div>
			<div class="content__right">
				<button class="right__google"></button>
				<button class="right__facebook"></button>
				<button class="right__github"></button>
				<div class="form">
					<label for=""></label>
					<input type="text">
					<label for=""></label>
					<input type="text">
					<label for=""></label>
					<input type="text">
					<button></button>
					<p></p>
				</div>
				<p></p>
			</div>
		</div>








	</div>

	<?php require_once('footer.php') ?>






</div>
</body>
</html>