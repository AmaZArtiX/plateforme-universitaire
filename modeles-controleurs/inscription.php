<?php

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  // Envoie du formulaire
  if(isset($_POST['btn_inscription'])){

    // Les conditions d'utilisation doivent être acceptées
    if(!isset($_POST['conditions'])){

      // Tous les champs doivent être complétés
      if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe']) && !empty($_POST['mot_de_passe_confirmation'])){

        // On récupère les informations saisies
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $mot_de_passe = sha1($_POST['mot_de_passe']);
        $mot_de_passe_confirmation = sha1($_POST['mot_de_passe_confirmation']);

        // Vérification de la taille du nom
        if(strlen($prenom) <= 36){

          // Vérification de la taille du prénom
          if(strlen($nom) <= 32){

            // Vérification de la taille de l'adresse e-mail
            if(strlen($email) <= 320){

              // Vérification du format de l'adresse e-mail
							if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                // Vérification de l'existence de l'adresse e-mail
                if(existe_email($email) ==  0){

                  // Vérification de la taille du mot de passe
                  if(strlen($mot_de_passe) <= 40 && strlen($mot_de_passe) >= 8){

                    // Vérification de l'égalité des mots de passe
                    if($mot_de_passe == $mot_de_passe_confirmation){

                      // Insertion du nouveau membre dans la bdd
                      inserer_membre($prenom, $nom, $email, $mot_de_passe);

                      // TODO: mail de création de compte

                    } else {

                      $erreur = "Vos mots de passe doivent être identiques";
                    }
                  } else {

                    $erreur = "Votre mot de passe doit contenir entre 8 et 40 caractères";
                  }
                } else {

                  $erreur = "Cette adresse e-mail existe déjà";
                }
              } else {

                $erreur = "Votre adresse e-mail n'est pas valide";
              }
            } else {

              $erreur = "Votre adresse e-mail ne doit pas excéder 320 caractères";
            }
          } else {

             $erreur = "Votre nom ne doit pas excéder 32 caractères";
          }
        } else {

          $erreur = "Votre prénom ne doit pas excéder 36 caractères";
        }
      } else {

        $erreur = "Vous devez remplir tous les champs";
      }
    } else {

      $erreur = "Vous devez acceptez les conditons d'utilisation du site.";
    }
  }

?>
