<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php require("../controllers/connexion.php"); ?>
<!-- vérifie si l'utilisateur ne fait pas n'importe quoi -->


<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../assets/css/style.css">
	<title>Inscription</title>
</head>


<body>
	<div class="container-fluid">
		<!--contenaire parent qui prend tout le header de la page soit 900px-->
    <?php include("./headermvc.php"); ?> <br>
		<!-- importation l'header -->
		<br>

		<div class="text-center">

			<!-- formulaire-->

			<form action="" method="POST" id="inscription">
				<fieldset>
					<br>
					<legend>
						<strong>Inscription</strong>
					</legend>
          <?php
        if (isset($erreur)) {
            echo "<h5><font color ='red'>" . $erreur . "</font></h5>"; // affiche les erreurs
        }
        ?>
		  <br>
					<label for="prenom">Votre prenom : <input class="form-control" id="prenom" type="text" value="<?php if (isset($prenom)) { echo $prenom; } ?>" name="prenom"></label><br>
					<label for="nom">Votre nom :<input class="form-control" id="nom" value="<?php if (isset($nom)) {  echo $nom; } ?>" type="text" name="nom"></label><br>
					<label for="email">Votre adresse mail :<input class="form-control" id="email" type="email" value="<?php if (isset($email)) { echo $email; } ?>" name="email"></label><br>

					<label for="identifiant">Votre identifiant : <input class="form-control" id="identifiant" type="text" value="<?php if (isset($identifiant)) { echo $idenfiant; } ?>" name="identifiant"></label><br>
					<label for="mdp">Votre mot de passe :<input class="form-control" id="mdp" type="password" name="mdp"> </label><br><br><br>
					<input type="submit" name="inscription" value="Je m'inscris !" class="btn btn-dark" id="inscription">

				</fieldset>
				<br>
			</form>

			<br>

		</div>

	</div>

	<!-- footer-->

	<!-- importation du footer -->

	<div>
    <?php include("./footer.php"); ?>
  </div>
</body>
</html>