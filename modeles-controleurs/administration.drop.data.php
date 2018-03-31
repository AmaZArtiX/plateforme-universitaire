<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if(isset($_POST['cat_id'])) {

    // Suppression d'une catégorie
    $requete = $bdd->prepare("DELETE FROM t_categorie_cat WHERE cat_id = ?");
    $result = $requete->execute(array($_POST['cat_id']));
    echo '<script type="text/javascript">alert("Catégorie d\'id:'.$_POST['cat_id'].' supprimée !");</script>';

  } elseif (isset($_POST['sscat_id'])) {

    // Suppression d'une sous-catégorie
    $requete = $bdd->prepare("DELETE FROM t_souscategorie_sscat WHERE sscat_id = ?");
    $result = $requete->execute(array($_POST['sscat_id']));
    echo '<script type="text/javascript">alert("Sous-catégorie d\'id:'.$_POST['sscat_id'].' supprimée !");</script>';

  } elseif (isset($_POST['top_id'])) {

    // Suppression d'un topic
    $requete = $bdd->prepare("DELETE FROM t_topic_top WHERE top_id = ?");
    $result = $requete->execute(array($_POST['top_id']));
    echo '<script type="text/javascript">alert("Topic d\'id:'.$_POST['top_id'].' supprimé !");</script>';

  } elseif (isset($_POST['mem_id'])) {

    // Suppression d'un membre
    //$requete = $bdd->prepare("DELETE FROM t_membre_mem WHERE mem_id = ?");
    //$result = $requete->execute(array($_POST['mem_id']));
    echo '<script type="text/javascript">alert("Utilisateur d\'id:'.$_POST['mem_id'].' supprimé !");</script>';

  } else {

    echo '<script type="text/javascript">alert("Pas de données reçues !");</script>';

  }
  
?>
