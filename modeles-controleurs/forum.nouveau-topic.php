<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if (isset($_GET['categorie'])) {

  	$get_categorie = addslashes($_GET['categorie']);
  	$categorie = $bdd->prepare("SELECT * FROM t_categorie_cat WHERE cat_id = ?");
  	$categorie->execute(array($get_categorie));
  	$categorie_existe = $categorie->rowCount();

  	if ($categorie_existe == 1) {

  		$categorie = $categorie->fetch();
  		$categorie = $categorie['cat_nom'];

  		$souscategorie = $bdd->prepare("SELECT * FROM t_souscategorie_sscat WHERE cat_id = ? ORDER BY sscat_nom");
  		$souscategorie->execute(array($get_categorie));

  		if (isset($_SESSION['mem_id'])) {

  			if (isset($_POST['btn_envoyer'])) {

  				if (isset($_POST['top_sujet'], $_POST['top_contenu'])) {

  					$sujet = htmlspecialchars(filtrerMots($_POST['top_sujet']));
  					$contenu = htmlspecialchars(filtrerMots($_POST['top_contenu']));
  					$tsouscategorie = htmlspecialchars($_POST['top_sscat']);

  					$souscategorie_existe = $bdd->prepare("SELECT sscat_id FROM t_souscategorie_sscat WHERE sscat_id = ? AND cat_id = ?");
  					$souscategorie_existe->execute(array($tsouscategorie, $get_categorie));
  					$souscategorie_existe = $souscategorie_existe->rowCount();

  					if ($souscategorie_existe == 1) {

  						if (!empty($sujet) AND !empty($contenu)) {

  							if (strlen($sujet) <= 70) {

  								if (isset($_POST['top_notif'])) {

  									$notification_mail = 1;
  								}
  								else {
  									$notification_mail = 0;
  								}

  								$insert = $bdd->prepare("INSERT INTO t_topic_top (mem_id, top_sujet, top_contenu, top_notification, top_date_creation) VALUES (?, ?, ?, ?, NOW())");
  								$insert->execute(array($_SESSION['mem_id'], $sujet, $contenu, $notification_mail));

  								$dernier_topic = $bdd->query("SELECT top_id FROM t_topic_top ORDER BY top_id DESC LIMIT 0,1");
  								$dernier_topic = $dernier_topic->fetch();
  								$id_topic = $dernier_topic['top_id'];

  								$insert = $bdd->prepare("INSERT INTO tj_topictheme_topth (top_id, cat_id, sscat_id) VALUES (?, ?, ?)");
  								$insert->execute(array($id_topic, $get_categorie, $tsouscategorie));

  								$succes  = "Cliquez <a href=\"forum.topic.vue.php?titre=".url_custom_encode($sujet)."&id=".$id_topic."&page=1\">ici</a> pour y accéder";
  								//header("location: forum_topics.php?categorie=".$get_categorie."&souscategorie=".$souscategorie."");

  							}
  							else {
  								$erreur = "Le sujet de votre topic ne doit pas dépasser 70 caractères";
  							}
  						}
  						else
  							$erreur = "Vous devez compléter tous les champs pour créer un topic";
  					}
  					else
  						$erreur = "La sous-catégorie est introuvable";
  				}
  			}
  		}
  		else {
  			header("Location: ../vues/connexion.vue.php");
  		}
  	}
  	else
  		header("Location: ../vues/erreur.vue.php");
  }
  else
  	header("Location: ../vues/erreur.vue.php");


?>
