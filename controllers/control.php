<!-- 
    * creat 07/01/2020
    * update 17/01/2020
-->

<?php
require ("connexion.php");

/*
 * $text_regex = '/^[a-zA-Z\-\,\. \déèàçùëüïôäâêûîô#&]+$/';
 * $price_regex = '/^[\d]{1,6}[.]?[\d]{0,2}+$/';
 * $num_regex = '/^[0-9]+$/';
 * $password_regex = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w])/';
 * $controlreference = "/[\p{L}0-9 -]+/u"; // autorise tous les espaces et caractères non spéciaux
 * $controlcouleur = "#[a-z]#"; // autorise que des lettres de a -> z
*/

if (empty($_POST["reference"]) || ! preg_match($controlreference, $_POST["reference"])) // vérifie si le champs de la référence n'est pas vide ou incorrecte
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
    echo "Description" . $_POST["description"] . "<br>";
}

if (empty($_POST["prix"])) {
    echo "Veillez indiquer le prix du produit." . "<br>";
} else {
    echo "Prix du produit :" . $_POST["prix"] . "<br>";
}

if (empty($_POST["stock"])) {
    echo "Veillez choisir la quantité de produit." . "<br>";
} else {
    echo "Quantité de produit : " . $_POST["stock"] . "<br>";
}

if (empty($_POST["couleur"]) || ! preg_match($controlcouleur, $_POST["couleur"])) {
    echo "Veillez saisir la couleur du produit." . "<br>";
} else {
    echo "Couleur :" . $_POST["couleur"] . "<br>";
}

$bd = connexionBase();
// reception donnée

$reference = $_POST["reference"]; // récupère la référence envoyée
$categorie = (int) ($_POST["categorie"]); // récupère en entier la catégorie du produit envoyée
$libelle = $_POST["libelle"]; // récupère le nom du produit envoyé
$description = $_POST["description"]; // récupère la description du produit envoyée
$prix = $_POST["prix"]; // récupère le prix du produit envoyé
$stock = (int) ($_POST["stock"]); // récupère la quantité du produit envoyée
$couleur = $_POST["couleur"]; // récupère la couleur du produit envoyée
$img = $_FILES["fichier"]; // recupère le nom de l'image du formulaire
$img_name = basename($img['name']);
$fichier_path = "../assets/img/" . $img_name;
move_uploaded_file($_FILES["fichier"]["tmp_name"], $fichier_path);

// prépare une requète sql
$insert = $bd->prepare( // crée une requète préparer
                         // insère dans latable produits en spécifiant les colonnes
    "INSERT INTO
produits (pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout)

VALUES(:categorie, :reference, :libelle, :description, :prix, :stock, :couleur, :format, now())");

// ajoute les données envoyés en renommant le champs par sécurité
$insert->bindValue(":categorie", $categorie, PDO::PARAM_INT); /* insère la catégorie du produit et change le type de donnée en entier */
$insert->bindValue(":reference", $reference); /* insère la référence de produit */
$insert->bindValue(":libelle", $libelle); /* insère le nom du produit */
$insert->bindValue(":description", $description); /* insère la description du produit */
$insert->bindValue(":prix", $prix, PDO::PARAM_INT); /* insère le prix du produit et change le type de donnée en entier */
$insert->bindValue(":stock", $stock, PDO::PARAM_INT); /* insère la quantité de produit et change le type de donnée en entier */
$insert->bindValue(":couleur", $couleur); /* insère la couleur du produit */
$insert->bindValue(":format", $img_name); /* insère le format l'image */
// var_dump($categorie, $reference, $libelle, $description, $prix, $stock, $couleur, $extension->getExtension()); // affiche les données récupérées
$insert->execute();

header("location: ../views/table.php"); // renvoit à la table des produits
                                        // var_dump($insert->execute());

?>