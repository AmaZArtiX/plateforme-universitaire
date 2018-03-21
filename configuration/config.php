<?php

  // Connexion à la BDD
  try {

    $bdd = new PDO('mysql:host=localhost;dbname=bd_platuniv', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

  } catch(Exception $e) {

    die('Erreur : '.$e->getMessage());

  }

 ?>
