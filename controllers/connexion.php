<?php 

if (!function_exists("connexionBase")) {
  function connexionBase()
  {
     // Paramètre de connexion serveur
     $host = "localhost:3306";
     $login= "root";     // Votre loggin d'accès au serveur de BDD 
     $password="";    // Le Password pour vous identifier auprès du serveur
     $base = "Jarditou";    // La bdd avec laquelle vous voulez travailler 
   
     try 
     {
          $db = new PDO('mysql:host=' .$host. ';charset=utf8;dbname=' .$base, $login, $password); // essaye une connexion à la base de donnée jarditou
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $db;
      } 
      catch (Exception $e)  // sinon affiche les erreurs lié
      {
          echo 'Erreur : ' . $e->getMessage() . '<br>';
          echo 'N° : ' . $e->getCode() . '<br>';
          die('Connexion au serveur impossible.');
      } 
  }
}

?>