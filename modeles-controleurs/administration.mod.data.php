<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if(isset($_POST['mem_id']) && isset($_POST['mem_admin'])) {

    // Ajout d'une catégorie
    $requete = $bdd->prepare("UPDATE t_membre_mem SET mem_administrateur=? WHERE mem_id=?");
    $result = $requete->execute(array($_POST['mem_admin'], $_POST['mem_id']));
    //echo '<script type="text/javascript">alert("Membre d\'id:'.$_POST['mem_id'].' Administrateur:'.$_POST['mem_admin'].' ");</script>';

  } else {

    //echo '<script type="text/javascript">alert("Pas de données reçues !");</script>';

  }

?>
