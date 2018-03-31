<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  /////////////////////////////////////////////////////////////////////////////

  // Requete des membres
  $membres = $bdd->query("SELECT mem_id FROM t_membre_mem");
  $nb_mem = $membres->rowCount();

  // Requete des évaluations
  $evaluations = $bdd->query("SELECT * FROM tj_evaluation_eval");
  $nb_eval = $evaluations->rowCount();

  // Requete des questions
  $questions = $bdd->query("SELECT quest_id FROM t_question_quest");
  $nb_quest = $questions->rowCount();

  // Requete des réponses
  $reponses = $bdd->query("SELECT rep_id FROM t_reponse_rep");
  $nb_rep = $reponses->rowCount();

  /////////////////////////////////////////////////////////////////////////////

  // Requete des forums
  $forums = $bdd->query("SELECT for_id FROM t_forum_for");
  $nb_for = $forums->rowCount();

  // Requete des catégories
  $categories = $bdd->query("SELECT cat_id FROM t_categorie_cat");
  $nb_cat = $categories->rowCount();

  // Requete des sous-catégories
  $sscategories = $bdd->query("SELECT sscat_id FROM t_souscategorie_sscat");
  $nb_sscat = $sscategories->rowCount();

  // Requete des topics
  $topics = $bdd->query("SELECT top_id FROM t_topic_top");
  $nb_top = $topics->rowCount();

  /////////////////////////////////////////////////////////////////////////////

  // Requete des domaines
  $domaines = $bdd->query("SELECT dom_id FROM t_domaine_dom");
  $nb_dom = $domaines->rowCount();

  // Requete des formations
  $formations = $bdd->query("SELECT form_id FROM t_formation_form");
  $nb_form = $formations->rowCount();

  // Requete des matieres
  $matieres = $bdd->query("SELECT mat_id FROM t_matiere_mat");
  $nb_mat = $matieres->rowCount();

  // Requete des groupes
  $groupes = $bdd->query("SELECT gr_id FROM t_groupe_gr");
  $nb_gr = $groupes->rowCount();

  /////////////////////////////////////////////////////////////////////////////
?>
