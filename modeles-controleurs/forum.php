<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  $forums = $bdd->query("SELECT * FROM t_forum_for ORDER BY for_priorite");
  $categories = $bdd->prepare("SELECT * FROM t_categorie_cat WHERE for_id = ? ORDER BY cat_nom");
?>
