<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if (isset($_GET['mem_id']) && !empty($_GET['mem_id'])) {

    $requete = $bdd->prepare("SELECT * FROM t_membre_mem WHERE mem_id = ?");
	  $requete->execute(array($_GET['mem_id']));
    $existe = $requete->rowCount();

    if($existe < 1) header("Location: ../vues/erreur.vue.php");

	  $membre = $requete->fetch();
  }

?>
