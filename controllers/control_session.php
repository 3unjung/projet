<?php session_start(); ?>
<?php require("connexion.php"); ?>

<!-- vérifie si l'utilisateur ne fait pas n'importe quoi -->
<?php

if (isset($_POST["inscription"])) // si le formulaire est envoyé
{
    $prenom = htmlspecialchars(($_POST["prenom"]));
    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);
    $identifiant = htmlspecialchars($_POST["identifiant"]);
    $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

    if (!empty($prenom) && !empty($nom) && !empty($email) && !empty($identifiant) && !empty($_POST["mdp"])) // vérifie si les champs ne sont pas vide
    {
        $db = connexionBase();
        $insert = $db->prepare(
            // crée une requète préparer
            "INSERT INTO users (prenom, nom, identifiant, email, mdp) VALUES (:prenom, :nom, :identifiant, :email, :mdp)"
        );
        $insert->bindValue(":prenom", $prenom);
        $insert->bindValue(":nom", $nom);
        $insert->bindValue(":identifiant", $identifiant);
        $insert->bindValue(":email", $email);
        $insert->bindValue(":mdp", $mdp);
        $insert->execute();
        header("location:  ../views/connect.php"); // renvoit à la table des produits
    } else {
        $erreur = "Tous les champs doivent être renseigner."; // gère les erreurs
    }
}


?>