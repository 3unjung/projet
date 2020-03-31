<!-- 
    * creat 07/01/2020
    * update 31/03/2020
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

if (isset($_POST['newProduct'])) {
    $bd = connexionBase();
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

    if (empty($categorie) || empty($reference) || empty($description) || empty($libelle) || empty($couleur) || empty($img_name) || empty($stock) || empty($prix)) {
        $erreur = "Les champs requis doivent être reneigner !";
        echo $erreur;
    } else {
        $insert = $bd->prepare("INSERT INTO
        produits (pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout)
        VALUES(:categorie, :reference, :libelle, :description, :prix, :stock, :couleur, :format, now())");

        $insert->bindValue(":categorie", $categorie, PDO::PARAM_INT);
        $insert->bindValue(":reference", $reference);
        $insert->bindValue(":libelle", $libelle);
        $insert->bindValue(":description", $description);
        $insert->bindValue(":prix", $prix, PDO::PARAM_INT);
        $insert->bindValue(":stock", $stock, PDO::PARAM_INT);
        $insert->bindValue(":couleur", $couleur);
        $insert->bindValue(":format", $img_name);
        $insert->execute();
        header("location: ../views/table.php"); 
    }
}


?>