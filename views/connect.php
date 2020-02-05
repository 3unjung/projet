<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php require("../controllers/connexion.php"); ?>

<!-- vérifie si l'utilisateur ne fait pas n'importe quoi -->
<?php

if (isset($_POST["connexion"])) {
  $login = htmlspecialchars($_POST["login"]);
  $mdp = ($_POST["mdp"]);

  if (!empty($login) && !empty($mdp)) {
    $db = connexionBase();
    $requete = $db->prepare("SELECT * FROM users WHERE identifiant = ?");
    $requete->execute(array($login));
    $userexist = $requete->rowCount();
    $usersinfo = $requete->fetch(); // cherche l'utilisateur avec son identiifant

    if ($userexist > 0 && password_verify($mdp, $usersinfo["mdp"])) // cherche le mot de passe de l'utilisateur et le vérifie avec celui saisis
    {
      $_SESSION["id"] =  $usersinfo["id"];
      header("location:  profil.php?id=" . $_SESSION["id"]); // renvoit à la page de profil de l'utilisateur
    } else {
      $erreur = "Identifiant ou mot de passe incorect.";
    }
  } else {
    $erreur = "Veillez entrer vos informations de connexion.";
  }
}

?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Mon compte</title>
</head>


<body>
  <div class="container-fluid">
    <!--contenaire parent qui prend tout le header de la page soit 900px-->
    <?php include("./headermvc.php"); ?> <br> <!-- importation l'header -->
    <br>

    <div class="text-center">

      <!-- formulaire-->

      <form action="" method="POST" id="inscription">
        <fieldset><br>
          <legend><strong>Connexion : </I></strong></legend>
          <?php
          if (isset($erreur)) // retourne les erreurs si elles existent
          {
            echo "<h5><font color ='red'>" . $erreur . "</font></h5>"; // affiche les erreurs
          }
          ?>
          <br>

          <label for="login">Identifiant :<input class="form-control" name="login" type="text"
              value="<?php if (isset($login)) {echo $login; } ?>"></label><br><br><br>
            
          <label for="mdp">Mot de passe : <input class="form-control" name="mdp" type="password"></label><br><br><br>
          <input type="submit" name="connexion" value="Je me connecte !" class="btn btn-dark">
          <input type="submit" name="inscription" value="Où je m'inscrit !" class="btn btn-dark"><br><br>
          <input type="submit" name="passwordForget" value="Mot de passe oublier?" class="btn btn-dark"><br><br><br>


          <?php
          if (isset($_POST["inscription"])) {
            if ($_POST["inscription"]) {
              header("location:  ./sessions.php"); // retourne à la plage d'inscription

            }
          } else {
          }
          ?>

        </fieldset><br>
      </form><br>

    </div>

  </div>
  <div>
    <?php include("./footer.php"); ?>
  </div>
</body>

</html>