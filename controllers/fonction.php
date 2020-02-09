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

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}





?>