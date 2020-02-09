<?php

if (isset($_POST["inscription"])) // si le formulaire est envoyé
{
    $prenom = htmlspecialchars(($_POST["prenom"]));
    $nom = htmlspecialchars($_POST["nom"]);
    $identifiant = htmlspecialchars($_POST["identifiant"]);
    $email = htmlspecialchars($_POST["email"]);
    $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
    $role = 0;

    if (! empty($_POST["prenom"]) && ! empty($_POST["nom"] && ! empty($_POST["identifiant"] && ! empty($_POST["mdp"]) && ! empty($_POST["email"])))) // vérifie si les champs ne sont pas vide
    {
        echo $mdp . $nom . $email;
        $db = connexionBase();
        $insert = $db->prepare(
            // crée une requète préparer
            "INSERT INTO users (prenom, nom, identifiant, email, mdp) VALUES (:prenom, :nom, :identifiant, :email, :mdp)");
        $insert->bindValue(":prenom", $prenom);
        $insert->bindValue(":nom", $nom);
        $insert->bindValue(":email", $prenom);
        $insert->bindValue(":mdp", $mdp);
        $insert->bindValue(":identifiant", $identifiant);
        $insert->execute();
        header("location:  ./connect.php"); // renvoit à la page de connexion
    } else {
        $erreur = "Tous les champs doivent être renseigner."; // gère les erreurs
    }
}
?>