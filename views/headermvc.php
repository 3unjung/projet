<?php require("../controllers/connexion.php"); ?>
<?php
if (isset($_SESSION["id"])) {
  $db = connexionBase();
  $requete = $db->prepare("SELECT * FROM users WHERE id = ?");
  $requete->execute(array($_SESSION["id"]));
  $usersinfo = $requete->fetch();

  //echo "<h5>Vous êtes connecté," . $usersinfo["identifiant"] . "</h5>";
  $myAccountLI = '<li class="nav-item"><a class="nav-link" style="color: white" href="profil.php?id=' . $_SESSION["id"] . '">Mon compte</a></li>';
  $udprequest = $db->prepare("SELECT admin from users where id = ?");
  $udprequest->execute(array($_SESSION["id"]));
  $resulrole = $udprequest->fetch()["admin"];

  if ($resulrole == 1) {
    $addproduit = '<li class="nav-item"><a id="produit_menu" class="nav-link" style="color: white" href="produit.php">Ajouter un produit</a></li>';
  } else {
    $addproduit = "";
  }
} else {
  echo "Vous êtes déconnecté";
  $myAccountLI = "";
  $addproduit = "";
}
?>

<div class="row">

  <a href="../index.php"><img class="col-xs=2 col-sm=2 col-md-2" id="logo_jarditou" src="../assets/img/jarditou_logo.jpg" alt="logo de index"></a>

  <h3 class="col-xs=10 col-sm=12 col-md-2"><strong><?php if (isset($_SESSION["id"])) { echo "Bienvenue " . $usersinfo["identifiant"]; } ?>
</div>

<body>

  <header>
    <div class="container-fluid">
      <div class="row">
        <!-- navigation -->
        <nav class="col-12 navbar navbar-expand-lg navbar-light bg">
          <button id="bouton_burger" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0-">
              <li class="nav-item active">
                <a id="index_menu" class="nav-link" href="../index.php">Acceuil<span class="sr-only">(current)</span></a>
              </li> 
              <li class="nav-item">
                <a id="table_menu" class="nav-link" href="./table.php">Nos produits</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="color: white" href="./connect.php">Connexion</a></li>

              <li class="nav-item">
                <a id="table_menu" class="nav-link" href="..\controllers\deconnection.php">Deconnexion</a>
              </li>


              <?php echo $myAccountLI ?>

              <?php echo $addproduit ?>
              
            </ul>
          </div>
        </nav>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <img class="image-fluid" src="../assets/img/promotion.jpg" id="promotion_jarditou" alt="promotion_du_site">
      </div>
    </div>
  </header>