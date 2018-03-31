<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  /////////////////////////////////////////////////////////////////////////////

  // Requete des membres
  $membres = $bdd->query("SELECT mem_id, mem_nom, mem_prenom, mem_mail, mem_administrateur, mem_date_inscription FROM t_membre_mem ORDER BY t_membre_mem.mem_date_inscription DESC");
  $nb_mem = $membres->rowCount();

  // Requete des forums
  $forums = $bdd->query("SELECT for_id FROM t_forum_for");
  $nb_for = $forums->rowCount();

  /////////////////////////////////////////////////////////////////////////////

?>
