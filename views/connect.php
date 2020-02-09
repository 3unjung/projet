<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php require("../controllers/connexion.php"); ?>
<?php require("../controllers/controlConnexion.php"); ?>
<?php require("../controllers/fonction.php"); ?>

<?php
if (isset($_POST["inscription"])) {
  header("location:  ./sessions.php"); // retourne à la plage d'inscription
}

if (isset($_POST["passwordForget"])) {
  if (empty($_POST["login"])) {
    $erreur = "Entrez votre identifiant et nous vous enverrons un mail si un compte existe avec cet identifiant";
  } else {
    $db = connexionBase();
    $req = $db->prepare("SELECT * from users WHERE identifiant = ?");
    $req->execute(array($_POST["login"]));
    $infos = $req->fetch();
    if (isset($infos["id"])) {
      $id = $infos["id"];
      $link = generateRandomString(40);
      $req = $db->prepare("UPDATE users SET mdp = ? WHERE id = ?");
      $req->execute(array($link, $id));
      $msg = '<!DOCTYPE html> <html lang="fr"> <form action="http://localhost/jarditou/views/passwordForget.php?id=' . $id . '&link=' . $link . '" method="POST"> <input type="submit" name="passwordForget" value="Choisir un nouveau mot de passe">';
      $msg = wordwrap($msg,70);
      mail("hellogoodbye1853@gmail.com", "Jarditou - Mot de passe oublié", $msg);
    } else {
      $erreur = "Cet identifiant n'existe pas, veuillez vous inscrire";
    }
  }
}
?>

<!-- vérifie si l'utilisateur ne fait pas n'importe quoi -->

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

        </fieldset><br>
      </form><br>

    </div>

  </div>
  <div>
    <?php include("./footer.php"); ?>
  </div>
</body>

</html>