<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<!-- Liens d'intégration de style css Bootstrap -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
			crossorigin="anonymous"/>
			<!-- Liens d'intégration d'icônes Bootstrap -->
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>
				<!-- Force l'intégration de la page de style css -->
			<style>
  				<?php include "css/admin_login.css" ?>
			</style>
<title>Admin Login</title>
</head>

<body>
		<!-- Importation de la vidéo d'arrière plan -->
	<video autoplay muted loop preload id="bgVideo">
  		<source src="video/Admin_loginBG.mp4" type="video/mp4">
	</video>
	
		<!-- Titre et la position avec bootstrap -->
	<div class="title position-absolute top-0 start-50 translate-middle-x">
		<h1>Page Admin</h1>
	</div>

		<!-- Div incluant le formulaire et la position avec bootstrap -->
	<div class="log position-absolute top-50 start-50 translate-middle">
		<!-- Formulaire -->
		<form action="" method="post">

			<!-- Input zone de texte de l'identifiant -->
		<input type="text" placeholder= "Identifiant" name="identifiant" id="id" required></input>
		<br><br>
			<!-- Input zone de texte du mot de passe -->
		<input type="password" placeholder= "Mot de passe" name="motdepasse" id="mdp" required></input>
		<br><br>
			<!-- Bouton envoyant les informations pour la connection -->
		<button type="text" name="post" id="btn"> <i class="bi bi-box-arrow-in-right"></i> Se connecter <i class="bi bi-box-arrow-in-left"></i> </button>
		</form>
	</div>

		<!-- Disclaimer de bas de page -->
	<div class="disclaimer position-absolute bottom-0 start-50 translate-middle-x"><p>2022 - Page dédiée uniquement aux ADMINS</p></div>




	<!-- Code PHP -->
	<?php

		include_once('connection.php');

		function test_input($data) {
			
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			$username = test_input($_POST["identifiant"]);
			$password = test_input($_POST["motdepasse"]);
			$stmt = $conn->prepare("SELECT * FROM admin");
			$stmt->execute();
			$users = $stmt->fetchAll();
			
			foreach($users as $user) {
				
				if(($user['identifiant'] == $username) &&
					($user['motdepasse'] == $password)) {
						header("location: admin.php");
				}
				else {
					echo "<script language='javascript'>";
					echo "alert('Informations invalides !')";
					echo "</script>";
					die();
				}
			}
		}

	?>

</body>
</html>










