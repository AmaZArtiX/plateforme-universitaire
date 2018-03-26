<?php

  require("../configuration/config.php");

  if(isset($_GET['domaine']) && !empty($_GET['domaine'])) {

    $idDomaine = intval($_GET['domaine']);

    $requete =  $bdd->prepare("SELECT * FROM t_matiere_mat WHERE dom_id = ?");
    $requete->execute(array($idDomaine));

    if($requete->rowCount() > 0){

      while($data = $requete->fetch()){

        echo '<option value="'.$data['mat_id'].'">'.$data['mat_nom'].'</option>';
      }

    } else {

      echo '<option>Aucune matière disponible</option>';
    }

  } else {

    echo 'erreur';
  }







 ?>
