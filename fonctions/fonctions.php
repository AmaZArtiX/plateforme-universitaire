<?php

  /**
   * Vérifie si une adresse email existe dans la bdd
   * @param  [string] $email [adresse e-mail à vérifier]
   * @return [boolean]        [existence de l'e-mail]
   */
  function existe_email($email) {

    global $bdd;
    $requete = $bdd->prepare("SELECT * FROM t_membre_mem WHERE mem_mail = ?");
		$requete->execute(array($email));
    $existe = $requete->rowCount();

    if($existe >= 1)
      return 1;
    else
      return 0;
  }

  /**
   * Insère un nouveau membre dans la bdd
   * @param  [string] $prenom [le prenom du membre]
   * @param  [string] $nom    [le nom du membre]
   * @param  [string] $email  [l'e-mail du membre]
   * @param  [string] $mdp    [le mot de passe du membre]
   */
  function inserer_membre($prenom, $nom, $email, $mdp){

    global $bdd;
    $requete = $bdd->prepare("INSERT INTO t_membre_mem(mem_nom, mem_prenom, mem_mail, mem_pwd, mem_date_inscription) VALUES (?, ?, ?, ?, NOW())");
    $requete_insertion->execute(array($nom, $prenom, $email, $mdp));
  }

?>