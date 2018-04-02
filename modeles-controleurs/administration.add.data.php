<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if(isset($_POST['for_id']) && isset($_POST['cat_nom']) && isset($_POST['cat_desc'])) {

    // Ajout d'une catégorie
    $requete = $bdd->prepare("INSERT INTO t_categorie_cat(for_id, cat_nom, cat_description) VALUES (?, ?, ?)");
    $result = $requete->execute(array($_POST['for_id'], $_POST['cat_nom'], $_POST['cat_desc']));
    //echo '<script type="text/javascript">alert("'.$_POST['cat_nom'].' ('.$_POST['cat_desc'].') ajouté dans le forum d\'id:'.$_POST['for_id'].' !");</script>';

  } elseif (isset($_POST['cat_id']) && isset($_POST['sscat_nom'])) {

    // Ajout d'une sous-catégorie
    $requete = $bdd->query("SELECT sscat_id FROM t_souscategorie_sscat ORDER BY t_souscategorie_sscat.sscat_id DESC LIMIT 0,1");
    $sscat = $requete->fetch();
    $sscat_id = $sscat['sscat_id'] + 1;
    $requete = $bdd->prepare("INSERT INTO t_souscategorie_sscat(sscat_id, cat_id, sscat_nom) VALUES (?, ?, ?)");
    $result = $requete->execute(array($sscat_id, $_POST['cat_id'], $_POST['sscat_nom']));
    //echo '<script type="text/javascript">alert("'.$_POST['sscat_nom'].' d\'id:'.$sscat_id.' ajouté dans la catégorie d\'id:'.$_POST['cat_id'].' !");</script>';

  } else {

    //echo '<script type="text/javascript">alert("Pas de données reçues !");</script>';

  }

?>
