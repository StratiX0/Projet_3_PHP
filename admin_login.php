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
			<style>
  				<?php include "css/admin_login.css" ?>
			</style>
<title>Admin Login</title>
</head>
<!-- class="bg-dark bg-gradient d-flex flex-column min-vh-100" -->
<body>

	<video autoplay muted loop preload id="bgVideo">
  		<source src="video/Admin_loginBG.mp4" type="video/mp4">
	</video>
	
	<div class="title position-absolute top-0 start-50 translate-middle">
		<h1>Page Admin</h1>
	</div>

	<div class="log position-absolute top-50 start-50 translate-middle">
		<!-- Formulaire -->
		<form action="" method="post">

		<input type="text" placeholder= "Identifiant" name="identifiant" id="id" required></input>
		<br><br>
		<input type="password" placeholder= "Mot de passe" name="motdepasse" id="mdp" required></input>
		<br><br>
		<button type="text" name="post" id="btn"><i class="bi bi-box-arrow-in-right"> Se connecter </i><i class="bi bi-box-arrow-in-left"></i></button>
		</form>
	</div>



</body>
</html>





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




