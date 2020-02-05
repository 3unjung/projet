<?php

// Variables for regex
$controlname = "/^[a-zA-ZéèîïÊËÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÊËÎÏ][a-zéèêàçîï])?/";
$controlage = "/^[a-zA-ZéèîïÊËÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÊËÎÏ][a-zéèêàçîï])?/";
$controlpscode = "^[0-9]{2,}$^";
$controladresse = "#[0-9]+ rue de [a-z]+ [a-z]+ [0-9]{5}#i";
$controlville = "/^[a-zA-ZéèîïÊËÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÊËÎÏ][a-zéèêàçîï])?/"; // le nom doit commencer par une lettre suivit de une ou plusieurs lettres pouvant être précédée(s) par un caractère spécial.
$controlmail = "/^[a-zA-ZéèîïÊËÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÊËÎÏ][a-zéèêàçîï])?/";



if (empty($_POST["nom"]) || !preg_match($controlname, $_POST["nom"])) // test if the name is missing or isn't corect.
{
    echo "Format incorrect, caractères alphabétiques et ou accentués uniquement autorisés."."<br>"; // display error message.

} else {
    echo "Votre nom est :" . $_POST["nom"] . "<br>"; // if is corect , return data.
}




if (empty($_POST["prenom"]) ||  !preg_match($controlname, $_POST["prenom"])) // test if the firstname is missing or isn't corect.
{
    echo "Format incorrect, caractères alphabétiques et ou accentués uniquement autorisés."."<br>"; // display error message.
} else {
    echo "Votre nom est :" . $_POST["prenom"] . "<br>"; // if is corect, return data.
}




if (empty($_POST["pscode"]) || !preg_match($controlpscode, $_POST["pscode"])) // test if the postal code is missing or isn't corect.
{
    echo "Veuillez saisir un code postal valide." . "<br>"; // display error message.
} else {
    echo "Votre code postal est :" . $_POST["pscode"] . "<br>"; // if is corect, return data.
}




if (empty($_POST["adresse"]) || !preg_match($controladresse, $_POST["adresse"])) // test if adresse is missing or isn't corect.
{
    echo " Veuillez saisir une adresse valide." . "<br>"; // display error message.
} else {
    echo "Votre adresse est :" . $_POST["adresse"] . "<br>"; // if is corect, return data.  
}




if (empty($_POST["Ville"]) || !preg_match($controlville, $_POST["ville"])) // test if ville is missing or isn't corect.
{
    echo " Veuillez saisir une ville valide." . "<br>"; // display error message.
} else {
    echo "Votre Ville est :" . $_POST["Ville"] . "<br>"; // if is corect, return data.
}



if (strlen($_POST["date"]) != 10)
{
    echo "Veuillez saisir une date de naissance valide." . "<br>"; // display error message.
} else  {
    echo "Vous être né(e) le :" . $_POST["date"] . "<br>"; // if is corect, return data.
}




if (empty($_POST["couriel"]) ||  !preg_match($controlmail, $_POST["couriel"])) // test if mail is missing or isn't corect.
{
    echo "Veuillez saisir une adresse mail valide." . "<br>"; // display error message.
} else {
    echo "Votre adresse mail :" . $_POST["couriel"] . "<br>"; // if is corect, return data.
}

?>