<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if (isset($_SESSION['mem_id'])) {

    $requete = $bdd->prepare("SELECT * FROM t_membre_mem WHERE mem_id = ?");
	  $requete->execute(array($_SESSION['mem_id']));
	  $membre = $requete->fetch();

    // Redirection vers compte si tout les champs sont vides
    if ((isset($_POST['mem_prenom']) && empty($_POST['mem_prenom'])) && (isset($_POST['mem_nom']) && empty($_POST['mem_nom'])) && (isset($_POST['mem_mail']) && empty($_POST['mem_mail'])) && (isset($_POST['mem_pwd']) && empty($_POST['mem_pwd'])) && (isset($_POST['mem_pwd_conf']) && empty($_POST['mem_pwd_conf']))) {
      $erreur = "Veuillez entrer une valeur à modifier";
    }

    // Modification du prenom si existant et valide
    if (isset($_POST['mem_prenom']) && !empty($_POST['mem_prenom']) && $_POST['mem_prenom'] != $membre['mem_prenom']) {

		  $prenom = htmlspecialchars($_POST['mem_prenom']);
		  $prenomLength = strlen($prenom);

		  if ($prenomLength <= 32) {

			  // Vérification de l'existence du prenom
			  $requete_prenom = $bdd->prepare("SELECT * FROM t_membre_mem WHERE mem_prenom = ?");
			  $requete_prenom->execute(array($prenom));
			  $prenom_existe = $requete_prenom->rowCount();

			  if ($prenom_existe == 0) {

				  $requete_insertion_prenom = $bdd->prepare("UPDATE t_membre_mem SET mem_prenom = ? WHERE mem_id = ?");
				  $requete_insertion_prenom->execute(array($prenom, $_SESSION['mem_id']));
          $succes = "Le prenom a bien été changé";
          $_SESSION['mem_prenom'] = $prenom;

			  } else
				  $erreur = "Prénom déjà existant";

		  } else
			  $erreur = "Votre prenom ne doit pas dépasser 32 caractères";
	  }

    // Modification du nom si existant et valide
    if (isset($_POST['mem_nom']) && !empty($_POST['mem_nom']) && $_POST['mem_nom'] != $membre['mem_nom']) {

		  $nom = htmlspecialchars($_POST['mem_nom']);
		  $nomLength = strlen($nom);

		  if ($nomLength <= 36) {

			  // Vérification de l'existence du nom
			  $requete_nom = $bdd->prepare("SELECT * FROM t_membre_mem WHERE mem_nom = ?");
			  $requete_nom->execute(array($nom));
			  $nom_existe = $requete_nom->rowCount();

			  if ($nom_existe == 0) {

				  $requete_insertion_nom = $bdd->prepare("UPDATE t_membre_mem SET mem_nom = ? WHERE mem_id = ?");
				  $requete_insertion_nom->execute(array($nom, $_SESSION['mem_id']));
          $succes = "Le nom a bien été changé";
          $_SESSION['mem_nom'] = $nom;

			  } else
				  $erreur = "Nom déjà existant";

		  } else
			  $erreur = "Votre nom ne doit pas dépasser 36 caractères";
	  }

    // Modification du mail si existant et valide
    if (isset($_POST['mem_mail']) && !empty($_POST['mem_mail']) && $_POST['mem_mail'] != $membre['mem_mail']) {

		  $mail = htmlspecialchars($_POST['mem_mail']);
		  $mailLength = strlen($mail);

		  if ($mailLength <= 320) {

			  // Vérification de l'existence de l'adresse mail
			  $requete_mail = $bdd->prepare("SELECT * FROM t_membre_mem WHERE mem_mail = ?");
			  $requete_mail->execute(array($mail));
			  $mail_existe = $requete_mail->rowCount();

			  if ($mail_existe == 0) {

				  $requete_insertion_mail = $bdd->prepare("UPDATE t_membre_mem SET mem_mail = ? WHERE mem_id = ?");
				  $requete_insertion_mail->execute(array($mail, $_SESSION['mem_id']));
          $succes = "L'adresse mail a bien été changée";
          $_SESSION['mem_mail'] = $mail;

			  } else
				  $erreur = "Adresse e-mail déjà existante";

		  } else
			  $erreur = "Votre adresse e-mail ne doit pas dépasser 320 caractères";
	  }

    // Modification du mdp si existant et valide
    if (isset($_POST['mem_pwd']) && !empty($_POST['mem_pwd'])) {

      if(isset($_POST['mem_pwd_conf']) && !empty($_POST['mem_pwd_conf'])) {

        $mdp = sha1($_POST['mem_pwd']);
  		  $mdp_confirmation = sha1($_POST['mem_pwd_conf']);

  		  if ($mdp == $mdp_confirmation) {

  		  	$requete_insertion_mdp = $bdd->prepare("UPDATE t_membre_mem SET mem_pwd = ? WHERE mem_id = ?");
  		  	$requete_insertion_mdp->execute(array($mdp, $_SESSION['mem_id']));
          $succes = "Le mot de passe a bien été changé";

  		  } else
  			  $erreur = "Le mot de passe et la confirmation doivent être identiques";
      } else
			  $erreur = "Le champ Confirmation doit être rempli pour modifier le mot de passe";

	  }
  }

?>
