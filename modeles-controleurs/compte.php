<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if (isset($_SESSION['mem_id'])) {

    $requete = $bdd->prepare("SELECT * FROM t_membre_mem WHERE mem_id = ?");
	  $requete->execute(array($_SESSION['mem_id']));
	  $membre = $requete->fetch();

    // Redirection vers compte si tout les champs sont vides
    if ((isset($_POST['mem_prenom']) && empty($_POST['mem_prenom'])) && (isset($_POST['mem_nom']) && empty($_POST['mem_nom'])) && (isset($_POST['mem_mail']) && empty($_POST['mem_mail']))) {
      // Redirection vers page du compte
      header('Location: ./compte.vue.php');
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
          $_SESSION['mem_prenom'] = $prenom;

			  } else
				  $message = "Prénom déjà existant";

		  } else
			  $message = "Votre prenom ne doit pas dépasser 32 caractères";
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
          $_SESSION['mem_nom'] = $nom;

			  } else
				  $message = "Nom déjà existant";

		  } else
			  $message = "Votre nom ne doit pas dépasser 36 caractères";
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
          $_SESSION['mem_mail'] = $mail;

			  } else
				  $message = "Adresse e-mail déjà existante";

		  } else
			  $message = "Votre adresse e-mail ne doit pas dépasser 320 caractères";
	  }

  }

?>
