<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<?php

require ("../controllers/connexion.php");
$db = connexionBase();
$requete = "SELECT * from categories";
$result = $db->query($requete); // exécute une requête SQL, retourne un jeu de résultats en tant qu'objet PDOStatement
$categorie = $result->fetchall(PDO::FETCH_OBJ); // récupère toutes les lignes de la table categorie et les retournes sous forme d'objet
?>

<?php

// récupération du produit selon son idans l'url
$getProduct = $db->prepare("SELECT * FROM produits WHERE pro_id = ?");
$getProduct->execute(array(
	$_GET["pro_id"]
));
$infoProduct = $getProduct->fetch();

// extraction des valeurs du produit
$nomProduit = $infoProduct["pro_libelle"];
$refProduit = $infoProduct["pro_ref"];
$decriProduit = $infoProduct["pro_description"];
$prixProduit = $infoProduct["pro_prix"];
$stockProduit = $infoProduct["pro_stock"];
$couleurProduit = $infoProduct["pro_couleur"];

?>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../assets/css/style.css">
	<title>Modifier des produits</title>
</head>
<body>
	<div class="container-fluid">
		<!-- importation de l'header -->
        <?php include("./headermvc.php"); ?>
        <h3 class="text-center">Modifier un produit :</h3>
		<br>
						
		<div class="text-center">
			<form action=" " method="POST" id="formulaire_ajout_produit" enctype="multipart/form-data">
				<input type="hidden" name="pro_id" value="<?php echo $_GET["pro_id"]; ?>">
				<fieldset>
					<label for="reference">Référence : <input value="<?php if (isset($refProduit)) { echo $refProduit; } ?>" class="form-control" id="reference" type="text" name="reference"></label><br>
					<span id="reference_manquante"></span><br>
					
					<select class="col-4 custom-select form-control" name="categorie" id="categorie">

						<?php foreach ($categorie as $key) { ?>
							
							<option value="<?php echo $key->cat_id; ?>"><?php echo $key->cat_nom; ?></option><?php }
							
							?> </select><br> <br>

							<label for="libelle">Nom du produit : <input value="<?php if (isset($nomProduit)) { echo $nomProduit; } ?>"class="form-control" id="libelle" type="text" name="libelle"></label><br>
							<span id="libelle_manquant"></span><br>

							<label for="descritiption">Description : <textarea class="form-control" id="description" name="description"><?php if (isset($decriProduit)) { echo $decriProduit; } ?></textarea> </label><br>
							<span id="description_manquante"></span><br>
							
							<label for="prix">Prix : <input value="<?php if (isset($prixProduit)) { echo $prixProduit; } ?>" class="form-control" id="prix" type="number" name="prix"></label><br>
							<span id="prix_manquant"></span><br>

							<label for="stock">Unité en stock : <input value="<?php if (isset($stockProduit)) { echo $stockProduit; } ?>" class="form-control" id="stock" type="number" name="stock"></label><br>

							<span id="quantite_manquante"></span><br>

							<label for="couleur">Couleur : <input value="<?php if (isset($couleurProduit)) { echo $couleurProduit; } ?>" class="form-control" id="couleur" type="text" name="couleur"></label><br>
							<span id="couleur_manquante"></span><br>
							
							<label for="produit_bloquer">Produit bloquer : <input inputmode="produit_bloquer" type="radio" value="oui"> Oui <input type="radio" name="produit_bloquer" value="non"> Non </label><br>

							<input class="col-1-form-control btn" type="file" value="<?php if (isset($photoProduit)) { echo $photoProduit; } else { 'Insérer un fichier';} ?>" name="fichier"><br> <br>

							<input type="submit" value="Valider" class="btn btn-dark" id="bouton_envoi" name="bouton_envoi">
							<input type="reset" value="Anuler" class="btn btn-dark"id="bouton_annuler" name="bouton_cancel"><br>
				</fieldset>
			</form>
			<br>
		</div>

		<script src="control.js"></script>
        <?php include("./footer.php"); ?>
    </div>

	</div>
</body>

</html>