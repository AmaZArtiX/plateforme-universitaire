<?php
  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  // Envoie du formulaire
  if(isset($_POST['btn_connexion'])){

    // Récupération des informations saisies
    $email = htmlspecialchars($_POST['email']);
    $mdp = sha1($_POST['mot_de_passe']);

    // On vérifie que les champs sont remplis
    if(!empty($email) && !empty($mdp)){

      // On vérifie que le membre existe
      if(existe_membre($email, $mdp) == 1){

        // On set les variables de session
        $mem_infos = getInfosMembre($email, $mdp);
        $_SESSION['mem_id'] = $mem_infos['mem_id'];
        $_SESSION['mem_nom'] = $mem_infos['mem_nom'];
        $_SESSION['mem_prenom'] = $mem_infos['mem_prenom'];
        $_SESSION['mem_mail'] = $mem_infos['mem_mail'];
        $_SESSION['mem_administrateur'] = $mem_infos['mem_administrateur'];
        $_SESSION['mem_date_inscription'] = $mem_infos['mem_date_inscription'];
        
        // Redirection vers la page d'accueil
        header("Location: ../index.php");

      } else {

        $erreur = "L'e-mail ou le mot de passe est incorrect";
      }
    } else {

      $erreur = "Vous devez remplir tous les champs";
    }
  }

 ?>
