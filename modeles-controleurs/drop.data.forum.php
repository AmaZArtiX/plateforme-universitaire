<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if(isset($_POST['cat_id'])) {
    $requete = $bdd->prepare("DELETE FROM t_categorie_cat WHERE cat_id = ?");
    $result = $requete->execute(array($_POST['cat_id']));
    echo '<script type="text/javascript">alert("'.$_POST['cat_id'].'");</script>';
  } elseif (isset($_POST['sscat_id'])) {
    $requete = $bdd->prepare("DELETE FROM t_souscategorie_sscat WHERE sscat_id = ?");
    $result = $requete->execute(array($_POST['sscat_id']));
    echo '<script type="text/javascript">alert("'.$_POST['sscat_id'].'");</script>';
  } elseif (isset($_POST['top_id'])) {
    $requete = $bdd->prepare("DELETE FROM t_message_mess WHERE top_id = ?");
    $result = $requete->execute(array($_POST['top_id']));
    $requete = $bdd->prepare("DELETE FROM tj_topictheme_topth WHERE top_id = ?");
    $result = $requete->execute(array($_POST['top_id']));
    $requete = $bdd->prepare("DELETE FROM t_topic_top WHERE top_id = ?");
    $result = $requete->execute(array($_POST['top_id']));
    echo '<script type="text/javascript">alert("Topic d\'id:'.$_POST['top_id'].' supprimé !");</script>';

    /*
    DELETE t_topic_top, tj_topictheme_topth, t_message_mess FROM t_topic_top
	   LEFT JOIN tj_topictheme_topth ON t_topic_top.top_id = tj_topictheme_topth.top_id
     LEFT JOIN t_message_mess ON t_topic_top.top_id = t_message_mess.top_id
    WHERE t_topic_top.top_id = 9;
  */
  } elseif(isset($_POST['data'])) {
    echo '<script type="text/javascript">alert("Pas de données reçues ! ('.$_POST['data'].')");</script>';
  } else {
    echo '<script type="text/javascript">alert("Pas de données reçues !");</script>';
  }
?>
