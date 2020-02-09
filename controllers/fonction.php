<?php 

// fonction qui récupère toutes les informations de l'utilisateur
function getUsersInfo($id)
{ // $id est la contraite de where
    $db = connexionBase();
    $userInfo = $db->prepare("SELECT * FROM users WHERE id = ?");
    $userInfo->execute(array(
        $id
    ));
    return $userInfo->fetch();
}


/*
    * fonction qui met à jour le role de l'utilisateur
    * si son role est = 0 et que l'administrateur modifie son role
    * il faut respectivement respecter l'ordre de la requète et des arguments sinon admin prendra id et id prendra admin comme paramètre
 */
function setUsersRole($admin, $id)
{ // set = mettre une valeur
    $db = connexionBase(); 
    $setRole = $db->prepare("UPDATE users SET admin = ? WHERE id =  ?");
    $setRole->execute(array(
        $admin,
        $id
    )); // $admin prendra comme valeur 0 ou 1 dans les paramètres
}


/* 
    * fonction qui génère une chaîne de  caractère au hasard.
    * $characters => liste tous les nombres et toutes les lettres.
    * $charactersLength => calcul la taille de la liste si dessus.
    * $randomString => initialise la variable vide.
    * à chaque fois que le compteur est inférieur à l'argument de la fonction, génère un caractère random de la liste avec rand().
    * retourne la chaîne de caractère générer.s
*/
function generateRandomString($length = 10) {
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $charactersLength = strlen($characters); // retourne la taille de la chaine
    $randomString = "";
    for ($i = 0; $i < $length; $i++) { // à chaque fois que le compteur est inférieur à l'argument, incrémente de 1
        $index = rand(0, $charactersLength - 1); // génère un caractère au hasard
        $character = $characters[$index];
        $randomString .= $character; // concatêne chaque caractère

    }
    return $randomString; // retourne le mot de passe provisoire.
}

?>