<?php session_start();
require_once ('const.php');
require_once('vendor/autoload.php');

if (isset($_SESSION['displayname'])) {
	header("Location:index.php");
}
if (isset($_POST['email']) && isset($_POST['password'])) {
	if (empty($_POST['email']) || empty($_POST['password'])) {
		//echo "<script>alert('Identifiants manquants ou incorects!');</script>";
		header('Location:login.php');
	}
	$email = $_POST['email'];
	$password = $_POST['password'];

	$link = mysqli_connect(HOST, USER, PASSWORD, BASE);
	$query = "SELECT email FROM MEMBRES WHERE email = '$email';";
	$resultlogin = mysqli_query($link, $query);
	if (1 != mysqli_num_rows($resultlogin)) {
		//echo "<script>alert('Identifiants manquants ou incorects!');</script>";
		header('Location:login.php');
	}





}




?>




<!DOCTYPE html>
<html lang="fr">


<head>
	<meta charset="utf-8">
	<title>Login - Stack Overflow</title>
	<meta name="description" content="Posez vos questions et obtenez des réponses.">
	<?php require_once('css_inclusion.php'); ?>
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
					<form action="login.php" method="post">
					<div class="center__form">
						<div class="center__login">
							<label>Email</label>
							<input type="email" name="email" class="center__email-input">
						</div>
						<div class="center__password">
							<label>Password</label>
							<input type="password" name="password" class="center__password-input">
						</div>
						<button type="submit" class="center__login-button" onclick="window.location.href='login.php'">Log In</button>
					</div>
					</form>
					<p class="center__bottom">
						Don't have an account ? <a href="signup.php">Sign In</a>
					</p>
				</div>

			</div>



		</div>

	</div>
</body>
</html>