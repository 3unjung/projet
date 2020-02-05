<?php 
session_start();
session_unset(); 
session_destroy();
header("location:  ../views/connect.php"); // renvoit à la page de profil de l'utilisateur
?>