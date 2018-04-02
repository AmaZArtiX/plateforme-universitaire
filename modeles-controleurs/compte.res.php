<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if(isset($_SESSION['mem_id'])){

    $requete = $bdd->prepare("SELECT * FROM tj_evaluation_eval WHERE mem_id = ? ORDER BY eval_date DESC");
    $requete->execute(array($_SESSION['mem_id']));
  } 


 ?>
