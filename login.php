<?php session_start(); ?>




<!DOCTYPE html>
<html lang="fr">


<head>
	<meta charset="utf-8">
	<title>Login - Stack Overflow</title>
	<meta name="description" content="Posez vos questions et obtenez des réponses.">
	<link rel="icon" type="image/ico" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
	<link rel="stylesheet" type="text/css" href="CSS/login.css">
</head>

<body>
	<div class="container">

		<?php require_once('header.php') ?>

		<div class="body">
			<div class="content">
				<div class="center">
					<a href="index.php" class="center__logo"><span></span></a>
					<button class="center__button-google"><img src="img/google.svg" alt=""> Login with Google</button>
					<button class="center__button-facebook"><i class="fab fa-facebook-square"></i> Login with Facebook</button>
					<button class="center__button-github"><i class="fab fa-github"></i> Login with Github</button>
					<div class="center__form">
						<div class="center__login">
							<label>Email</label>
							<input type="email" name="email" class="center__email-input">
						</div>
						<div class="center__password">
							<label>Password</label>
							<input type="password" name="password" class="center__password-input">
						</div>
						<button type="submit" class="center__login-button">Log In</button>
					</div>
					<p class="center__bottom">
						Don't have an account ? <a href="">Sign In</a>
					</p>
				</div>

			</div>



		</div>

	</div>
</body>
</html>