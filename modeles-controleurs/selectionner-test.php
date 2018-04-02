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

        $requete = $bdd->prepare("SELECT * FROM tj_evaluation_eval WHERE mem_id = ? AND mat_id = ? AND form_id = ?");
        $requete->execute(array($_SESSION['mem_id'], $matiere, $niveau));

        if($requete->rowCount() > 0)
          $erreur = "Vous vous êtes déjà positionné pour cette matière";
        else
        header("Location: ../vues/questionnaire.vue.php?matiere=$matiere&niveau=$niveau");

      } else {

        $erreur = "Vous devez choisir un domaine, une matière et un niveau de formation";
      }
    } else {

      $erreur = "Vous devez être connecté pour participer à un test";
    }
  }

 ?>
