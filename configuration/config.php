<?php

  // Connexion à la BDD
  try {

    $bdd = new PDO('mysql:host=localhost;dbname=bd_platuniv', 'root', 'root');

  } catch(Exception $e) {

    die('Erreur : '.$e->getMessage());
    
  }

 ?>
