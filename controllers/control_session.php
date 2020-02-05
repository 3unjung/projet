<?php session_start(); ?>
<?php require("connexion.php"); ?>

<!-- vérifie si l'utilisateur ne fait pas n'importe quoi -->
<?php

if (isset($_POST["inscription"])) // si le formulaire est envoyé
{
    $prenom = htmlspecialchars(($_POST["prenom"]));
    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);
    $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

    if (!empty($_POST["prenom"]) && !empty($_POST["nom"] && !empty($_POST["mdp"]) && !empty($_POST["email"]))) // vérifie si les champs ne sont pas vide
    {
        echo $mdp . $nom . $email;
        $db = connexionBase();
        $insert = $db->prepare(
            // crée une requète préparer
            "INSERT INTO users (prenom, nom, email, mdp) VALUES (:prenom, :nom, :email, :mdp)"
        );
        $insert->bindValue(":prenom", $prenom);
        $insert->bindValue(":nom", $nom);
        $insert->bindValue(":email", $email);
        $insert->bindValue(":mdp", $mdp);
        $insert->execute();
        header("location:  ./table.php"); // renvoit à la table des produits
    } else {
        $erreur = "Tous les champs doivent être renseigner."; // gère les erreurs
    }
}


?>