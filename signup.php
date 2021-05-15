<?php session_start();
require_once('const.php');
require_once('vendor/autoload.php');
?>


<!DOCTYPE html>
<html lang="fr">


<head>
	<meta charset="utf-8">
	<title>Stack Overflow</title>
	<meta name="description" content="Posez vos questions et obtenez des réponses.">
	<?php require_once('css_inclusion.php'); ?>
	<link rel="stylesheet" href="CSS/signup.css">
</head>






<body>
	<div class="container">
		<?php require_once('header.php') ?>

		<div class="body">
			<div class="content">
				<div class="content__left">
					<h1>Join the Stack Overflow <br>community</h1>
					<div class="content__ask"><span><i class="far fa-question-circle"></i>  </span>Get unstuck — ask a question</div>
					<div class="content__unlock"><span><i class="fas fa-arrows-alt-v"></i>  </span>Unlock new privileges like voting and commenting</div>
					<p class="content__start">Get Stack Overflow now!</p>
				</div>
				<div class="content__right">
					<?php
					$client = new Google_Client();
					$client->setClientId(GOOGLE_CLIENT_ID);
					$client->setClientSecret(GOOGLE_CLIENT_SECRET);
					$client->setRedirectUri(GOOGLE_REDIRECTURL);
					$client->addScope('profile');
					$client->addScope('email');
					echo "<a href='".$client->createAuthUrl()."'>";
					if (isset($_GET['code'])) {
						$code = $_GET['code'];

						$token = $client->fetchAccessTokenWithAuthCode($code);
						$client->setAccessToken($token);

						$gauth = new Google_Service_Oauth2($client);
						$google_info = $gauth->userinfo -> get();
						$email = $google_info->email;
						$displayname = $google_info->name;
						if (isset($displayname) && isset($email)) {
							if (empty($displayname) || empty($email)) {
								echo "<script>window.location.href = 'error.php';</script>";
							}
							$date = date('Y-m-d H:i:s');
							$karma = 1;
							$profilpic = "profilpic/default.png";
							$link = mysqli_connect(HOST, USER, PASSWORD, BASE);
							$query = "SELECT email FROM MEMBRES WHERE email = '$email';";
							$resultemail = mysqli_query($link, $query);
							if (0 != mysqli_num_rows($resultemail)) {
								//echo '<p class="form__erreur">Existe déja!</p>';
								$query = "SELECT id FROM MEMBRES WHERE email = '$email';";
								$resultlog = mysqli_query($link, $query);
								$logline = mysqli_fetch_array($resultlog);
								$_SESSION['id'] = $logline['id'];
								$_SESSION['displayname'] = $displayname;
								$_SESSION['email'] = $email;
								$_SESSION['profilpic'] = $profilpic;
								mysqli_close($link);
								header('Location:index.php');
							}else {
								$query = "INSERT INTO MEMBRES (displayname, email, date, karma, profilpic) VALUES ('$displayname', '$email', '$date', '$karma', '$profilpic')";
								mysqli_query($link, $query);

								$query = "SELECT id FROM MEMBRES WHERE email = '$email';";
								$resultlog = mysqli_query($link, $query);
								$logline = mysqli_fetch_array($resultlog);
								$_SESSION['id'] = $logline['id'];
								$_SESSION['displayname'] = $displayname;
								$_SESSION['email'] = $email;
								$_SESSION['profilpic'] = $profilpic;
								mysqli_close($link);
								header('Location:index.php');

							}
						}
					}
					?>
					<button class="right__google"><img src="img/google.svg" alt="">Sign up with Google</button>
					<?php echo "</a>"; ?>
					<button class="right__facebook"><i class="fab fa-facebook-square"></i> Sign up with Facebook</button>
					<button class="right__github"><i class="fab fa-github"></i> Sign up with Github</button>
					<div class="form">
						<form action="#" method="post">
							<div class="form__name">
								<label for="display_name">Display Name</label>
								<input type="text" name="display_name">
							</div>
							<div class="form__email">
								<label for="email">Email</label>
								<input type="email" name="email">
							</div>
							<div class="form__password">
								<label for="password">Password</label>
								<input type="password" name="password">
							</div>
							<button type="submit" class="form__signup-button">Sign Up</button>
							<?php
							if (isset($_POST['display_name']) && isset($_POST['email']) && isset($_POST['password'])) {
								$displayname = $_POST['display_name'];
								$email = $_POST['email'];
								$password = $_POST['password'];
								if (empty($displayname) || empty($email) || empty($password)) {
									echo "<script>window.location.href = 'error.php';</script>";
								}else {
									$date = date('Y-m-d H:i:s');
									$karma = 1;
									$profilpic = "profilpic/default.png";
									//Connexion à la base de données
									$link = mysqli_connect(HOST, USER, PASSWORD, BASE);
									/*$query = "SELECT displayname FROM MEMBRES WHERE displayname = '$displayname';";
									$resultname = mysqli_query($link, $query);*/
									$query = "SELECT email FROM MEMBRES WHERE email = '$email';";
									$resultemail = mysqli_query($link, $query);

									if (0 != mysqli_num_rows($resultemail)) {
										$query = "SELECT id FROM MEMBRES WHERE email = '$email';";
										$resultlog = mysqli_query($link, $query);
										$logline = mysqli_fetch_array($resultlog);
										$_SESSION['id'] = $logline['id'];
										$_SESSION["displayname"] = $displayname;
										$_SESSION['email'] = $email;
										$_SESSION['profilpic'] = $profilpic;
										//Déconnexion de la base de données
										mysqli_close($link);
										header('Location:index.php');
									}else {


										$query = "INSERT INTO MEMBRES (displayname, email, password, date, karma, profilpic) VALUES ('$displayname', '$email', '$password', '$date', '$karma', '$profilpic')";
										mysqli_query($link, $query);
										$query = "SELECT id FROM MEMBRES WHERE email = '$email';";
										$resultlog = mysqli_query($link, $query);
										$logline = mysqli_fetch_array($resultlog);
										$_SESSION['id'] = $logline['id'];
										$_SESSION["displayname"] = $displayname;
										$_SESSION['email'] = $email;
										$_SESSION['profilpic'] = $profilpic;
										//Déconnexion de la base de données
										mysqli_close($link);
										header('Location:index.php');
									}
								}
							}
							?>
						</form>
						<p class="right__bottom-text">By clicking “Sign up”, you agree to our <a href="">terms of service</a>, <a href="">privacy policy</a> and <a href="">cookie policy</a></p>
					</div>
					<p></p>
				</div>
			</div>








		</div>








	</div>
</body>
</html>