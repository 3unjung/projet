

<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php require("../controllers/connexion.php"); ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Inscription</title>

</head>


<body>
    <!--contenaire parent qui prend tout le header de la page soit 900px-->
    <?php include("./headermvc.php"); ?> <br> <!-- importation l'header -->
    <br>

    <div class="text-center">

      <!-- formulaire-->
      <form action="../controllers/script.php" method="POST" id="formulaire_contact">
        <fieldset>
          <legend><strong>Coordonnées:</strong></legend><br>

          <label for="nom">Nom:<input class="form-control" id="nom" type="text" name="nom"></label><br>
          <span id="nom_manquant"></span><br>

          <label for="prenom">Prenom:<input class="form-control" id="prenom" tabindex="text" name="prenom"></label><br>
          <span id="prenom_manquant"></span><br>

          <label for="sex">Sex : <input inputmode="sexe" type="radio" name="sex" value="f"> femme <input type="radio" name="sex" value="h"> homme</label><br>

          <span id="sex"></span><br>

          <label for="date">Date de naissance:<input class="form-control" id="date" type="date" placeholder="jj/mm/aaaa" name="date"></label><br>
          <span id="date_manquante"></span><br>

          <label for="pscode">Code postal: <input class="form-control" id="pscode" type="text" name="pscode"></label><br>
          <span id="pscode_manquant"></span><br>

          <label for="adresse">Adresse: <input class="form-control" id="adresse" type="text" name="adresse"></label><br>
          <span id="adresse_manquante"></span><br>

          <label for="ville">Ville: <input class="form-control" id="ville" type="text" name="ville"></label><br>
          <span id="ville_manquante"></span><br>

          <label for="couriel">Email: <input class="form-control" id="couriel" type="text" placeholder="adresse.mail@gmail.com" name="couriel"></label><br>
          <span id="couriel_manquant"></span><br>
        </fieldset><br>

        <fieldset>
          <span id="votre_question_manquante"></span><br>
          <legend><strong>Votre demande:</strong></legend>
          Sujet: <select name="commandes">
            <option>mes commandes</option>

          </select>
          <label for="votre_question">Votre question: <textarea name="votre_question" rows="3" cols="32"></textarea></label><br>

          <input type="radio" name="envoyer"> j'accepte le traitement de données personnelles.<br>
          <input type="submit" id="bouton_envoi" class="btn btn-dark" name="bouton_envoi">
          <input type="submit" class="btn btn-dark" value="Annuler"><br>

        </fieldset><br>
      </form><br>
    </div>

  </div>

  <!-- footer-->
  <?php include("./footer.php"); ?>
  <!-- importation du footer -->


  </div>

  <script src="../assets/javascript/formulaire.js"></script> <!-- scrip de contrôle de formulaire -->


  </script>

  </div>
</body>

</html>