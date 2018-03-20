<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if (isset($_GET['categorie']) AND !empty($_GET['categorie'])) {

  	$get_categorie = htmlspecialchars($_GET['categorie']);

  	$categories = array();
  	$req_categories = $bdd->query("SELECT * FROM t_categorie_cat");

  	while ($c = $req_categories->fetch()) {

  		array_push($categories, array($c['cat_id'], $c['cat_nom']));
  	}

  	foreach ($categories as $cat) {

  		if (in_array($get_categorie, $cat)) {

  			$id_categorie = intval($cat[0]);
  		}
  	}

    var_dump($id_categorie);

  	if (@$id_categorie) {

  		if (isset($_GET['ss-categorie']) AND !empty($_GET['ss-categorie'])) {


  			$get_souscategorie = htmlspecialchars($_GET['ss-categorie']);
  			$souscategories = array();
  			$req_souscategories = $bdd->prepare("SELECT * FROM t_souscategorie_sscat WHERE cat_id = ?");
  			$req_souscategories->execute(array($id_categorie));

  			while ($c = $req_souscategories->fetch()) {

  				array_push($souscategories, array($c['sscat_id'], $c['sscat_nom']));
  			}

  			foreach ($souscategories as $cat) {

  				if (in_array($get_souscategorie, $cat)) {

  					$id_sous_categorie = intval($cat[0]);
  				}
  			}
  		}

  		$requete = "SELECT * FROM t_topic_top
  					LEFT JOIN tj_topictheme_topth ON t_topic_top.top_id = tj_topictheme_topth.top_id
  					LEFT JOIN t_categorie_cat ON tj_topictheme_topth.cat_id = t_categorie_cat.cat_id
  					LEFT JOIN t_souscategorie_sscat ON tj_topictheme_topth.sscat_id = t_souscategorie_sscat.sscat_id
  					LEFT JOIN t_membre_mem ON t_topic_top.mem_id = t_membre_mem.mem_id
  					WHERE t_categorie_cat.cat_id = ? AND t_souscategorie_sscat.sscat_id = ? ORDER BY t_topic_top.top_id DESC";

  		$total_topics = $bdd->prepare($requete);

  		$total_topics->execute(array($id_categorie, $id_sous_categorie));

      $nb_topics = $total_topics->rowCount();
      $topicsParPage = 3;
      $pagesTotales = ceil($nb_topics/$topicsParPage);

      if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0) {

				$_GET['page'] = intval($_GET['page']);
				$pageCourante = $_GET['page'];
			}

      $depart = ($pageCourante-1)*$topicsParPage;

			$topics = $bdd->prepare('SELECT * FROM t_topic_top
  					LEFT JOIN tj_topictheme_topth ON t_topic_top.top_id = tj_topictheme_topth.top_id
  					LEFT JOIN t_categorie_cat ON tj_topictheme_topth.cat_id = t_categorie_cat.cat_id
  					LEFT JOIN t_souscategorie_sscat ON tj_topictheme_topth.sscat_id = t_souscategorie_sscat.sscat_id
  					LEFT JOIN t_membre_mem ON t_topic_top.mem_id = t_membre_mem.mem_id
  					WHERE t_categorie_cat.cat_id = ? AND t_souscategorie_sscat.sscat_id = ?
            ORDER BY t_topic_top.top_id
            DESC LIMIT '.$depart.', '.$topicsParPage.'');

			$topics->execute(array($id_categorie, $id_sous_categorie));
  	}
  	else
  		header("Location: ../vues/erreur.vue.php");
  }
  else
  	header("Location: ../vues/erreur.vue.php");


?>
