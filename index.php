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
  <link href="css/index_php.css" rel="stylesheet"/>
  	<!-- Liens d'intégration d'icônes Bootstrap -->
  <link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>
  <title>Contact</title>
</head>

<body>

  <video autoplay muted loop preload id="bgVideo">
  	<source src="video/indexPHP.mp4" type="video/mp4">
	</video>

  <div class="title position-absolute top-0 start-50 translate-middle-x">
    <h1>Vos informations</h1>
  </div>

  <div class="log position-absolute top-50 start-50 translate-middle">
      <!-- Formulaire -->
    <form action="" method="post">
      <input type="text" placeholder= "Nom" id="nom" name="nom" required></input>
      <br><br>
      <input type="text" placeholder= "Prénom" id="prenom" name="prenom" required></input>
      <br><br>
      <input type="text" placeholder= "Email" id="mail" name="email" required></input>
      <br><br>
      <input type="password" placeholder= "Mot de passe" id="mdp" name="motdepasse" minlength= "8" maxlenght="16" required></input>
      <br><br>
      <input type="text" placeholder= "Téléphone" id="tel" name="telephone" required></input>
      <br><br>
      <button type="text" id="btn" name="post"><i class="bi bi-box-arrow-in-right"> Envoyer </i><i class="bi bi-box-arrow-in-left"></i></button>
    </form>
  </div>

  <?php

    if ($_POST){
        //Variable du nom
      $nom =  $_POST['nom'];

        //Variable du prénom
      $prenom =  $_POST['prenom'];

        //Variable de l'email
      $email =  $_POST['email'];

        //Variable du mot de passe
      $password = $_POST['motdepasse'];

        //Variable du numéro de téléphone
      $tel = $_POST['telephone'];
        
        //Valider le nom
      echo "<div class='confirmation position-absolute top-50 end-0 translate-middle-y'>";
      if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])#', $nom)){
          echo "Le nom est conforme";
          $validenom = 1;    //Contient vrai puisque c'est conforme
          echo"<br><br>";
        }
      else
        {
          echo "Le nom n'est pas conforme";
          $validenom = 0;    //Contient faux puisque ce n'est pas conforme
          echo"<br><br>";
        }
      
        
        //Valider le prénom
      if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])#', $prenom)){
          echo "Le prénom est conforme";
          $valideprenom = 1;    //Contient vrai puisque c'est conforme
          echo"<br><br>";
        }
      else
        {
          echo "Le prénom n'est pas conforme";
          $valideprenom = 0;    //Contient faux puisque ce n'est pas conforme
          echo"<br><br>";
        }

        //Valider l'email
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){
          echo "L'adresse e-mail est valide";
          $validemail = 1;    //Contient vrai puisque c'est conforme
          echo"<br><br>";
        }
      else
        {
          echo "L'adresse e-mail n'est pas valide";
          $validemail = 0;    //Contient faux puisque ce n'est pas conforme
          echo"<br><br>";
        }


        //Valider le mot de passe
      if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password)) {
          echo 'Mot de passe conforme';    
          $passwordhash = password_hash($password, PASSWORD_DEFAULT); //Hashage du mot de passe
          $validemdp = 1;    //Contient vrai puisque c'est conforme
          echo"<br><br>";
      } else {
          echo 'Mot de passe non conforme';
          $validemdp = 0;    //Contient faux puisque ce n'est pas conforme
          echo"<br><br>";
        }	


        //Valider le numéro de téléphone
      if (preg_match("#[0][6][- \.?]?([0-9][0-9][- \.?]?){4}$#", $tel) || preg_match("#[0][7][- \.?]?([0-9][0-9][- \.?]?){4}$#", $tel)){
        echo 'Numéro de téléphone conforme';
        $validetel = 1;    //Contient vrai puisque c'est conforme
        echo"<br><br>";
      } else {
          echo 'Numéro de téléphone non conforme';
          $validetel = 0;    //Contient faux puisque ce n'est pas conforme
          echo"<br><br>";
        }      
      echo"</div>";	
}

      //        // Non utilisé par moi - utilisable pour debug
      //        //Vérification du post, de la validité du mot de passe, de l'email et du numéro de téléphone
      // if($_POST && $validemdp && $validemail && $validetel && $validenom && $valideprenom) {
      //        //Affiche le nom
      //   echo $nom;
      //   echo"<br><br>";

      //        //Affiche le prénom

      //   echo $prenom;
      //   echo"<br><br>";

      //        //Affiche l'email
      //   echo $email;
      //   echo"<br><br>";

      //        //Affiche le téléphone
      //   echo $tel;
      //   echo"<br><br>";

      //        //Affiche le mot de passe hasher
      //   echo $passwordhash;
      //   }
	

  ?>

  <?php

    $pdo = new PDO('mysql:host=localhost;dbname=gtech', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    if ($_POST) {
    $pdo->exec("INSERT INTO contact (nom, prenom, email, motdepasse, telephone) VALUES ('$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[motdepasse]', '$_POST[telephone]')");
  }
  ?>

</body>
</html>


