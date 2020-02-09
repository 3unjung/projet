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