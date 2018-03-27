<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if(isset($_POST['envoyer'])){

    if(isset($_SESSION['mem_id'])){

      if(isset($_POST['domaine']) && !empty($_POST['domaine']) && isset($_POST['matiere']) && !empty($_POST['matiere']) && isset($_POST['niveau']) && !empty($_POST['niveau'])){

        $domaine = intval($_POST['domaine']);
        $matiere = intval($_POST['matiere']);
        $niveau = intval($_POST['niveau']);

        header("Location: ../vues/questionnaire.vue.php?matiere=$matiere&niveau=$niveau");

      } else {

        $erreur = "Vous devez choisir un domaine, une matière et un niveau de formation";
      }
    } else {

      $erreur = "Vous devez être connecté pour participer à un test";
    }
  }

 ?>
