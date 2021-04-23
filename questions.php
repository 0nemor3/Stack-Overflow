<?php session_start();
	const HOST = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const BASE = "Stackoverflow";
?>



<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
        <title>Stack Overflow - Questions</title>
        <meta name="description" content="Posez vos questions et obtenez des réponses.">
        <link rel="icon" type="image/ico" href="img/favicon.ico">
        <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
        <link rel="stylesheet" type="text/css" href="CSS/questions.css">
</head>
<body>

	<?php require_once('header.php'); ?>

	<div class="body">
		<div class="content">
			<div class="top">
				<div class="top__title">
					<h1>All Questions</h1>
					<button onclick="">Ask Question</button>
				</div>
				<div class="top__filter">
					<p class="top__numbers">
						<?php
							//Connexion à la base de données
							$link = mysqli_connect(HOST, USER, PASSWORD, BASE);
							$query = "SELECT COUNT(*) FROM QUESTIONS;";
							$resultlignes = mysqli_query($link, $query);
							$row = mysqli_fetch_row($resultlignes);
							echo $row[0];
							mysqli_close($link);
						 ?>
						 question(s)
					</p>
					<button class="top__button-new">Sort by New</button>
					<button class="top__button-karma">Sort by Karma</button>
				</div>
			</div>
			<?php
				//Connexion à la base de données
				$link = mysqli_connect(HOST, USER, PASSWORD, BASE);
				$query = "SELECT titre, question, date, auteur, reponses, karma FROM QUESTIONS;";
				$resultquestion = mysqli_query($link, $query);

				while ($questionline = mysqli_fetch_array($resultquestion)) {
					$titre = $questionline['titre'];
					$question = $questionline['question'];
					$date = $questionline['date'];
					$auteur = $questionline['auteur'];
					$reponses = $questionline['reponses'];
					$karma = $questionline['karma'];
			?>
			<div class="question">
				<div class="question__top">
					<div class="question__left">
						<p class="question__reponses">
							Réponses<br>
							<strong><?php echo $reponses; ?></strong>
						</p>
						<p class="question__karma">
							Karma<br>
							<strong><?php echo $karma; ?></strong>
						</p>
					</div>
					<div class="question__right">
						<h2></h2>
						<p></p>
					</div>
				</div>
				<div class="question__bottom">
					
				</div>
			</div>


			<?php
				}
				mysqli_close($link);
			?>
		</div>
	</div>

	</body>


	<?php require_once('footer.php'); ?>


</body>
</html>