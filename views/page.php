  
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php require("../controllers/connexion.php"); ?>

<head>

  <?php
  $db = connexionBase();
  $pro_id = $_GET["pro_id"];
  $requete = "SELECT * FROM produits WHERE pro_id=" . $pro_id;
  $result = $db->query($requete); // exécute une requête SQL, retourne un jeu de résultats en tant qu'objet PDOStatement
  $key = $result->fetchObject();
  $product = $result->fetchObject();
  
  ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Page du produit </title>
</head>

<body>
  <div class="container-fluid">

    <?php include("./headermvc.php"); ?> <br>
    <div class="container-fluid row">
      <?php
      $getUsersId = $_SESSION["id"]; // recupère l'id de l'utilisateur stocké dans le cookie
      $requete = $db->prepare("SELECT admin from users where id = " . $_SESSION['id']); // prépare une requète 
      $requete->execute(array($getUsersId)); // retourne la ligne correspondante au tableau selon l'id de la session
      $userinfo = $requete->fetch(); // stock l'information
      ?>

      <?php if ($userinfo["admin"] == 1) { ?>
        <a class="col-1 btn btn-lg btn-primary" href="./update.php?pro_id=<?= $key->pro_id ?>"role="alert">Modifier</a>
        <a class="col-1 btn btn-lg btn-primary" name="id" href="../controllers/control_delete.php?pro_id=<?= $key->pro_id ?>" role="button">Supprimer</a>
      <?php } ?>


    </div>
    <div class="text-center"><br><br>
      <?php while ($key) { ?>

        <div class="row-xl-1 row-lg-1 row-md-1 row-sm-1 row-xs-2">
          <!-- Récupère la prochaine ligne et la retourne en tant qu'objet -->
          <img class="img-fluid" src="../assets/img/<?= $key->pro_photo ?>" alt="Photo du produit recherché">
        </div>


        <h5>Nom du produit : <?php echo $key->pro_libelle; ?>
          <h5>Identifiant : <?php echo $key->pro_id; ?></h5>
          <h5>Référence produit : <?php echo $key->pro_ref; ?></h5>
          <h5>Description du produit : <?php echo $key->pro_description; ?></h5>
          <h5>Prix : <?php echo $key->pro_prix; ?>&nbsp;€</h5>
          <h5>Date d'ajout : <?php echo $key->pro_d_ajout; ?></h5>


        <?php
        break; // instruction de fin pour éviter de répéter la boucle 
      }
        ?>

        <br>
    </div>


    <?php include("./footer.php"); ?>

  </div>

</body>

</html>