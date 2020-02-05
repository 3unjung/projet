<?php session_start(); ?>
<?php require("../controllers/connexion.php"); ?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <?php

  $db = connexionBase();
  $requete = "SELECT * FROM produits";
  $result = $db->query($requete); // exécute une requête SQL, retourne un jeu de résultats en tant qu'objet PDOStatement
  $produit = $result->fetchall(PDO::FETCH_OBJ); // récupère toutes les lignes de la table produits et les retournes sous forme d'objet


  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Tableau des produits</title>

</head>

<body>
  <div class="container-fluid">
    <!--contenaire parent qui prend tout le header de la page soit 900px-->
    <?php include("./headermvc.php"); ?> <br>


    <!--Tableau des articles-->
    <h3><strong>Tableau des articles</strong></h3>
    <div class="table-responsive-col-xs=12 col-sm=12 col-md-12">

      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="table-dark" scope="col">Clé:</th>
            <th scope="col">Catégorie du produit:</th>
            <th scope="col">Référence du produit:</th>
            <th class="table-dark" scope="col">Nom du produit:</th>
            <th scope="col">Description du produit:</th>
            <th class="table-dark" scope="col">Prix:</th>
            <th scope="col">Nombre d'unité en stock:</th>
            <th scope="col">Couleur:</th>
            <th scope="col">Photo:</th>
            <th scope="col">Date d'ajout:</th>
            <th scope="col">Date de modificiton:</th>
            <th class="table-dark" scope="col">Bloquer le produit de la vente:</th>
          </tr>
        </thead>

        <?php foreach ($produit as $key) { ?>

          <td class="table-dark" scrope="row"><?= $key->pro_id; ?></td>

          <td scrope="row"><?= $key->pro_cat_id; ?></td>

          <td scrope="row"><?= $key->pro_ref; ?></td>

          <td class="table-dark" scope="row"><a href="./page.php?pro_id=<?= $key->pro_id; ?>"><?= $key->pro_libelle; ?></a></td>

          <td scrope="row"><?= $key->pro_description; ?></td>

          <td class="table-dark" scope="row"><?= $key->pro_prix; ?></td>

          <td scrope="row"><?= $key->pro_stock; ?></td>

          <td scrope="row"><?= $key->pro_couleur; ?></td>

          <td scope="row"><img class="img-fluid" src="../assets/img/<?= $key->pro_photo ?>"> </td>

          <td scrope="row"><?= $key->pro_d_ajout; ?></td>

          <td scrope="row"><?= $key->pro_d_modif; ?></td>

          <td class="table-dark" scrope="row"><?= $key->pro_bloque; ?></td>

          </tr>

        <?php
        }
        ?>
      </table> <br>


    </div>
    <!-- footer-->
    <?php include("./footer.php"); ?>
    <!-- importe le fichier du footer -->


  </div>
  </div>

</body>

</html>