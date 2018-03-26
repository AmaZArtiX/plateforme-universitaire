<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if(isset($_GET['categorie']) && !empty($_GET['categorie'])){

    $get_categorie = addslashes($_GET['categorie']);
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

    if(@$id_categorie){

      $req_souscategories = $bdd->prepare("SELECT * FROM t_souscategorie_sscat WHERE cat_id = ?");
      $req_souscategories->execute(array($id_categorie));

    } else {

      //header("Location: ../vues/erreur.vue.php");
    }

  } else {

    header("Location: ../vues/erreur.vue.php");
  }

?>
