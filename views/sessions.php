<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php require("../controllers/connexion.php"); ?>
<!-- vérifie si l'utilisateur ne fait pas n'importe quoi -->
<?php

if (isset($_POST["inscription"])) // si le formulaire est envoyé
{
    $prenom = htmlspecialchars(($_POST["prenom"]));
    $nom = htmlspecialchars($_POST["nom"]);
    $identifiant = htmlspecialchars($_POST["identifiant"]);
    $email = htmlspecialchars($_POST["email"]);
    $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
    $role = 0;

    if (! empty($_POST["prenom"]) && ! empty($_POST["nom"] && ! empty($_POST["identifiant"] && ! empty($_POST["mdp"]) && ! empty($_POST["email"])))) // vérifie si les champs ne sont pas vide
    {
        echo $mdp . $nom . $email;
        $db = connexionBase();
        $insert = $db->prepare(
            // crée une requète préparer
            "INSERT INTO users (prenom, nom, identifiant, email, mdp) VALUES (:prenom, :nom, :identifiant, :email, :mdp)");
        $insert->bindValue(":prenom", $prenom);
        $insert->bindValue(":nom", $nom);
        $insert->bindValue(":email", $prenom);
        $insert->bindValue(":mdp", $mdp);
        $insert->bindValue(":identifiant", $identifiant);
        $insert->execute();
        header("location:  ./connect.php"); // renvoit à la page de connexion
    } else {
        $erreur = "Tous les champs doivent être renseigner."; // gère les erreurs
    }
}
?>

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