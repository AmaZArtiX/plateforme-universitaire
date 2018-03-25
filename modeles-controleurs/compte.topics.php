<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if(isset($_POST['envoyer'])){

    if(isset($_POST['resolu']) && !empty($_POST['resolu'])){

      $resolu = $_POST['resolu'];

      foreach ($resolu as $r) {

        $requete = $bdd->prepare("UPDATE t_topic_top SET top_resolu = ? WHERE top_id = ?");
        $requete->execute(array(1, $r));
      }
    }
  }

?>
