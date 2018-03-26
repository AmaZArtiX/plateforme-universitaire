<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if(isset($_GET['recherche']) && !empty($_GET['recherche'])){

    $recherche = addslashes($_GET['recherche']);
    $tab_recherche = explode(' ', $recherche);

    $requete = "SELECT * FROM t_topic_top";
    $i = 0;

    foreach($tab_recherche as $mot) {

      if(strlen($mot) > 3){

        if($i == 0){

          $requete .= " WHERE ";
        } else {

          $requete .= " OR ";
        }
        $requete .= "top_sujet LIKE '%".$mot."%'";
      }

      $i++;
    }

    $requete .= " ORDER BY top_id DESC";

    $topics = $bdd->query($requete);

    if($topics->rowCount() == 0){

      $requete = "SELECT * FROM t_topic_top";
      $i = 0;

      foreach($tab_recherche as $mot) {

        if(strlen($mot) > 3){

          if($i == 0){

            $requete .= " WHERE ";
          } else {

            $requete .= " OR ";
          }
          $requete .= "CONCAT(top_sujet, top_contenu) LIKE '%".$mot."%'";
        }

        $i++;
      }

      $requete .= " ORDER BY top_id DESC";

      $topics = $bdd->query($requete);
    }
  } else {

    header("Location: ../vues/erreur.vue.php");
  }

?>
