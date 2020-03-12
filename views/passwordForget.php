<?php session_start(); ?>
<!-- 
    * create 09-02-2020
    * update 09-02-2020
-->
<!DOCTYPE html>
<html lang="fr">
<?php require("../controllers/connexion.php"); ?>
<?php require("../controllers/fonction.php"); ?>

<?php
if (isset($_GET["id"]) && isset($_GET["link"])) {

	$usersInfos = getUsersInfo($_GET["id"]);
	if ($usersInfos["mdp"] == $_GET["link"]) {
		if (isset($_POST["passwordForget"])) {
			$db = connexionBase();
			$req = $db->prepare("UPDATE users SET mdp = ? WHERE id = ?");
			$new_mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
			$req->execute(array($new_mdp, $usersInfos["id"]));
			header("location:  connect.php");
		}
		?>
		<head>
		  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		  <meta http-equiv="X-UA-Compatible" content="ie=edge">
		  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		  <link rel="stylesheet" href="../assets/css/style.css">
		  <title>Mot de passe oublié</title>
		</head>
		<body>
		  <div class="container-fluid">
		    <?php include("./headermvc.php"); ?> <br> 
		    <br>

		    <div class="text-center">

		      <!-- formulaire-->

		      <form action="" method="POST">
		        <fieldset><br>	            
		          <label for="mdp">Nouveau mot de passe : <input class="form-control" name="mdp" type="password"></label><br><br><br>
		          <input type="submit" name="passwordForget" value="Je change mon mot de passe !" class="btn btn-dark">

		        </fieldset><br>
		      </form><br>

		    </div>

		  </div>
		  <div>
		    <?php include("./footer.php"); ?>
		  </div>
		</body>
		<?php
	} else {
		?> <h1>Ce lien a expiré, merci d'en demander un nouveau si vous avez oublié votre mot de passe.</h1> <?php
	}
}
?>

</html>