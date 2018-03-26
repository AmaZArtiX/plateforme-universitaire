<?php

  if(isset($_POST['envoyer'])){

    if(isset($_POST['domaine']) && !empty($_POST['domaine']) && isset($_POST['matiere']) && !empty($_POST['matiere']) && isset($_POST['niveau']) && !empty($_POST['niveau'])){

      $domaine = htmlspecialchars($_POST['domaine']);
      $matiere = htmlspecialchars($_POST['matiere']);
      $niveau = htmlspecialchars($_POST['niveau']);

    } else {

      $erreur = "Vous devez choisir un domaine, une matière et un niveau de formation";
      echo $erreur;
    }
  }

 ?>
