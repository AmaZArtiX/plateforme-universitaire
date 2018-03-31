<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  // Requete des membres
  $membres = $bdd->query("SELECT mem_id FROM t_membre_mem");
  $nb_mem = $membres->rowCount();

  // Requete des forums
  $forums = $bdd->query("SELECT for_id FROM t_forum_for");
  $nb_for = $forums->rowCount();

  // Requete des forums
  $forums = $bdd->query("SELECT * FROM t_forum_for ORDER BY for_priorite");

  // Préparation requete des catégories
  $categories = $bdd->prepare("SELECT * FROM t_categorie_cat WHERE for_id = ? ORDER BY cat_nom");

  // Préparation requete des sous-catégories
  $sscategories = $bdd->prepare("SELECT * FROM t_souscategorie_sscat WHERE cat_id = ?");

  // Préparation requete des topics
  $requete_topics = "SELECT * FROM t_topic_top
        LEFT JOIN tj_topictheme_topth ON t_topic_top.top_id = tj_topictheme_topth.top_id
        LEFT JOIN t_categorie_cat ON tj_topictheme_topth.cat_id = t_categorie_cat.cat_id
        LEFT JOIN t_souscategorie_sscat ON tj_topictheme_topth.sscat_id = t_souscategorie_sscat.sscat_id
        LEFT JOIN t_membre_mem ON t_topic_top.mem_id = t_membre_mem.mem_id
        WHERE t_categorie_cat.cat_id = ? AND t_souscategorie_sscat.sscat_id = ? ORDER BY t_topic_top.top_id";
  $topics = $bdd->prepare($requete_topics);
?>
