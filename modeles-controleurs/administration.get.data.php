<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if(isset($_POST['data_type']) && $_POST['data_type'] == "categorie") {

    // Selection des forums
    $requete = $bdd->query("SELECT for_id, for_nom FROM t_forum_for");

    $retour = '<div class="input-group mb-2">
              <select class="form-control input-group-prepend" id="select">';

    while($for = $requete->fetch()) {
      $retour .= '<option value="'.$for['for_id'].'">'.$for['for_nom'].'</option>';
    }

    $retour .= '</select>
                <input type="text" id="cat_nom" class="form-control" placeholder="Catégorie">
                <input type="text" id="cat_desc" class="form-control" placeholder="Description">
                </div>';

    echo $retour;

  } elseif (isset($_POST['data_type']) && $_POST['data_type'] == "sous-categorie") {

    // Selection des catégories
    $requete = $bdd->query("SELECT cat_id, cat_nom FROM t_categorie_cat");

    $retour = '<div class="input-group mb-2">
              <select class="form-control input-group-prepend" id="select">';

    while($cat = $requete->fetch()) {
      $retour .= '<option value="'.$cat['cat_id'].'">'.$cat['cat_nom'].'</option>';
    }

    $retour .= '</select>
                <input type="text" id="sscat_nom" class="form-control" placeholder="Sous-catégorie">
                </div>';

    echo $retour;

  } elseif (isset($_POST['data_type']) && $_POST['data_type'] == "utilisateur") {

    // Selection des membres
    $requete = $bdd->query("SELECT mem_id, mem_nom, mem_prenom, mem_administrateur FROM t_membre_mem");

    $retour = '<label>Administrateur:</label>
              <div class="input-group mb-2">
              <select class="form-control input-group-prepend" id="sel_mem">';

    while($membre = $requete->fetch()) {
      $retour .= '<option value="'.$membre['mem_id'].'">'.$membre['mem_prenom'].' '.$membre['mem_nom'].'</option>';
    }

    $retour .= '</select>
                <select class="form-control" id="sel_admin">
                  <option value="0">Non</option>
                  <option value="1">Oui</option>
                </select>
                </div>';

    echo $retour;

  } else {

    //echo '<script type="text/javascript">alert("Pas de données reçues !");</script>';

  }

?>
