<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  $requete = $bdd->query("SELECT * FROM t_questionreponse_qr");

?>
