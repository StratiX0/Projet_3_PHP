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
    <link rel="stylesheet" href="css/admin.css"/>
    <title>Admin</title>
</head>
<body class="d-flex flex-column min-vh-100" >

    <video autoplay muted loop preload id="bgVideo">
  		<source src="video/adminBG.mp4" type="video/mp4">
	</video>
    
    <?php

    $pdo = new PDO('mysql:host=localhost;dbname=gtech', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $query = "SELECT * FROM contact";
    $d = $pdo->query($query);

    ?>



    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>prenom</th>
                <th>email</th>
                <th>motdepasse</th>
                <th>telephone</th>
            </tr>
        </thead>

        <?php
        foreach($d as $data)
        {
        ?>
        <tr class="content">
            <td id="col1"><?php echo $data['id']; ?></td>
            <td><?php echo $data['nom']; ?></td>
            <td><?php echo $data['prenom']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['motdepasse']; ?></td>
            <td><?php echo $data['telephone']; ?></td>
        </tr>

        <?php
        }
        ?>
    </table>

</body>
</html>






