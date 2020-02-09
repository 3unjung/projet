<!-- 
    * creat 07/01/2020
    * update 15/01/2020
-->

<?php
require("./connexion.php");
$pro_id = $_REQUEST["pro_id"]; // désigne requet quand on ne sait pas le get ou le post
// variables
$controlreference = "/[\p{L}0-9 -]+/u"; // autorise tous les espaces et caractères non spéciaux 
$controlcouleur = "#[a-z]#"; // autorise que des lettres de a -> z
$controldate = "/([0-2][0-9]|(3)[0-1])(/)(((0)[0-9])|((1)[0-2]))(/)\d{4}$/"; // date au format dd/mm/yy */

if (empty($_POST["reference"]) || !preg_match($controlreference, $_POST["reference"])) // vérifie si le champs de la référence n'est pas vide ou incorrecte
{
    echo "Veillez saisir une référence valide." . "<br>";
} else {
    echo "Rérefence :" . $_POST["reference"] . "<br>"; // retourne la référence 
}

if (empty($_POST["categorie"])) // vérifie si le champs catégorie est remplie
{
    echo "Veillez saisir la categorie du produit à ajouter." . "<br>";
} else {
    echo "Catégorie :" . $_POST["categorie"] . "<br>";
}

if (empty($_POST["libelle"])) // vériie si le champs du libelle n'est pas vide
{
    echo "Veillez indiquer le nom du produit." . "<br>";
} else {
    echo "Nom du produit :" . $_POST["libelle"] . "<br>";
}

if (empty($_POST["description"])) {
    echo "Veillez ajouter une description du produit." . "<br>";
} else {
    echo "Description :" .  $_POST["description"] . "<br>";
}

if (empty($_POST["prix"])) {
    echo "Veillez indiquer le prix du produit." . "<br>";
} else {
    echo "Prix du produit :" . $_POST["prix"] . "<br>";
}

if (empty($_POST["stock"])) {
    echo "Veillez choisir la quantité de produit." . "<br>";
} else {
    echo "Quantité de produit : " .  $_POST["stock"] . "<br>";
}

if (empty($_POST["couleur"]) || !preg_match($controlcouleur, $_POST["couleur"])) {
    echo "Veillez saisir la couleur du produit." . "<br>";
} else {
    echo "Couleur :" . $_POST["couleur"] . "<br>";
}


// modification des informations du produit
$bd = connexionBase();

// reception donnée 

$reference = $_POST["reference"]; // récupère la référence envoyée
$categorie = (int)($_POST["categorie"]); // récupère en entier la catégorie du produit envoyée
$libelle = $_POST["libelle"]; // récupère le nom du produit enviyé
$description = $_POST["description"]; // récupère la description du produit envoyée
$prix = (float)$_POST["prix"]; // récupère le prix du produit envoyé
$stock = (int)($_POST["stock"]); // récupère la quantité du produit envoyée
$couleur = $_POST["couleur"]; // récupère la couleur du produit envoyée
$img = $_FILES["fichier"]; // recupère le nom de l'image du formulaire
$img_name=basename($img["name"]);
$fichier_path = "../assets/img/" . $img_name;
move_uploaded_file ($_FILES["fichier"]["tmp_name"] ,$fichier_path);

$insert = $bd->prepare("UPDATE produits 
SET pro_cat_id = :categorie,
pro_ref = :reference, 
pro_libelle = :libelle, 
pro_description = :description, 
pro_prix = :prix, 
pro_stock = :stock, 
pro_couleur = :couleur, 
pro_photo = :format,
pro_d_modif = NOW(), 
pro_bloque = null
WHERE pro_id = :pro_id");

$insert->bindValue(":categorie", $categorie, PDO::PARAM_INT); // insère la catégorie du produit et change le type de donnée en entier 
$insert->bindValue(":reference", $reference); // insère la réference de produit 
$insert->bindValue(":libelle", $libelle); // insère le nom du produit 
$insert->bindValue(":description", $description); // insère la description du produit 
$insert->bindValue(":prix", $prix, PDO::PARAM_INT); // insère le prix du produit et change le type de donnée en entier 
$insert->bindValue(":stock", $stock, PDO::PARAM_INT); // insère la quantité de produit et change le type de donnée  en entier
$insert->bindValue(":couleur", $couleur); // insère la couleur du produit 
$insert->bindValue(":format",  $img_name); // insère le format l'image 
$insert->bindValue(":pro_id", $pro_id);
$insert->execute(); //éxécute la requète
header("location: ../views/table.php"); // renvoit à la table des produits
?>