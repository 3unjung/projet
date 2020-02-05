<?php
require ("./connexion.php");
$db = connexionBase();
 function deleteProduct($getid){
  $db = connexionBase();
  $delete = $db->prepare("DELETE FROM produits WHERE pro_id= ?");
  $delete->execute(array($getid));
  header("location:../views/table.php");
 }

 deleteProduct($_GET["pro_id"]);
?>