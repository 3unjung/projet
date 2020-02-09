<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php require("../controllers/connexion.php"); ?>

<?php
$db = connexionBase();

// fonction qui récupère toutes les informations de l'utilisateur
function getUsersInfo($id)
{ // $id est la contraite de where
    $db = connexionBase();
    $userInfo = $db->prepare("SELECT * FROM users WHERE id = ?");
    $userInfo->execute(array(
        $id
    ));
    return $userInfo->fetch();
}

/*
 * fonction qui met à jour le role de l'utilisateur
 * si son role est = 0 et que l'administrateur modifie son role
 * il faut respectivement respecter l'ordre de la requète et des arguments sinon admin prendra id et id prendra admin comme paramètre
 */
function setUsersRole($admin, $id)
{ // set = mettre une valeur
    $db = connexionBase();
    $setRole = $db->prepare("UPDATE users SET admin = ? WHERE id =  ?");
    $setRole->execute(array(
        $admin,
        $id
    )); // $admin prendra comme valeur 0 ou 1 dans les paramètres
}

if (isset($_POST["id"])) {
    $userRole = getUsersInfo($_POST["id"])["admin"]; // appel la fonction et envoit la ligne admin
    setUsersRole((int)!$userRole, $_POST["id"]); // transforme le rôle de l'utilisateur en entier 

    /*
     * trouve le role de l'utilisateur avec son id
     * permute son role avec !
     */
}

// donne les droits d'admin
/*
 * si id existe dans l'url et la session correspond à l'id de l'url
 * on récupère ses informations et on l'utilisera plus tard
 */
if (isset($_GET["id"]) && isset($_SESSION["id"]) && $_SESSION["id"] == $_GET["id"]) {
    $userinfo = getUsersInfo($_GET["id"]); // retourne les informations de l'utilisateur connecté car son id dans l'url et égal à sa session
    ?>

  <head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/style.css">
<title>Mon compte</title>
</head>


<body>
	<div class="container-fluid">
		<!--contenaire parent qui prend tout le header de la page soit 900px-->
      <?php include("./headermvc.php"); ?> <br> <br>

		<div class="text-center">
			<h1>Bonjour <?php echo $userinfo["identifiant"] . "!" ?></h1>
			<form>
				<fieldset>
					<input type="submit" value="Editer mon profil" class="btn btn-dark"
						name="edit">
				</fieldset>
			</form>
			<br>
			<br>
			<br>

		</div>
      <?php
    if ($userinfo["id"] == $_SESSION["id"]) {
        ?>

      <?php
    }
    ?>
      <?php
    $requete = "SELECT * FROM users";
    $result = $db->query($requete);
    $infousers = $result->fetchall(PDO::FETCH_OBJ);

    if ($userinfo["admin"] == 1) {
        ?>
        <div class="table-responsive col-xs-8 col-sm-8 col-md-12 ">

			<table class="table table-striped table-hover table-bordered">

				<!-- tableau des utilisateurs -->
				<tr>
					<th class="table-dark">Prénom</th>
					<th class="table-dark">Nom</th>
					<th class="table-dark">Identifiant</th>
					<th class="table-dark">Mot de passe</th>
					<th class="table-dark">Administrateur</th>
				</tr>
            <?php foreach ($infousers as $key) { ?>
              <!-- sélectionne tous les id des utilisateurs -->
				<tr>
					<td scrope="row"><?= $key->prenom; ?></td>
					<td scrope="row"><?= $key->nom; ?></td>
					<!-- récupère l'identifiant dans la base de donnée -->
					<td scrope="row"><?= $key->identifiant; ?></td>
					<td scrope="row"><?= $key->mdp; ?></td>
					<td scrope="row"><?php

if ($key->admin) {
                echo "Oui";
            } else {
                echo "Non";
            }
            ?><form class="table" action=""
							method="POST">
							<fieldset>
								<input type="submit" value="<?= $key->id ?>"
									class="btn btn-dark" name="id">
							</fieldset>
						</form></td>
				</tr>
          <?php

}
    } else {
        echo "<p>blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah
            blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah
            blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah
            blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah
            blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah
            blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah
            blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah
            blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah
            blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah </p><br>";
    }
    ?>
          </table>
		</div>
		<br>
		<br>
		<div>
          <?php include("./footer.php"); ?>
        </div>

</body>
<?php
} // fin de la boucle
else {}
?>

</html>