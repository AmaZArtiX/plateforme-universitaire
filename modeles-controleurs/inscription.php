<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  // Envoie du formulaire
  if(isset($_POST['btn_inscription'])){

    // On récupère les informations saisies
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $longueur_mot_de_passe = strlen($_POST['mot_de_passe']);
    $mot_de_passe = sha1($_POST['mot_de_passe']);
    $mot_de_passe_confirmation = sha1($_POST['mot_de_passe_confirmation']);

    // Les conditions d'utilisation doivent être acceptées
    if(isset($_POST['conditions'])){

      // Tous les champs doivent être complétés
      if(!empty($prenom) && !empty($nom) && !empty($email) && !empty($mot_de_passe) && !empty($mot_de_passe_confirmation)){
          
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

                  echo strlen($mot_de_passe);
                  // Vérification de la taille du mot de passe
                  if($longueur_mot_de_passe >= 8 && $longueur_mot_de_passe <= 40){

                    // Vérification de l'égalité des mots de passe
                    if($mot_de_passe == $mot_de_passe_confirmation){

                      // Insertion du nouveau membre dans la bdd
<<<<<<< Updated upstream
                      if(inserer_membre($prenom, $nom, $email, $mot_de_passe)){

                        /*********************************************************************
  											$header = "MIME-Version: 1.0\r\n";
  											$header .= 'From: "Forum.com" <bacquet.simon@outlook.fr>'."\n";
  											$header .= 'Content-Type:text/html; charset="utf-8"'."\n";
  											$header .= 'Content-Transfer-Encoding: 8bit';

  											$message='
  											<html>
  												<body>
  										      <p> Félicitations ! Votre compte a bien été créé. </p
  												</body>
  											</html>
  											';

  											mail($mail, "Confirmation de création de compte", $message, $header);
  											************************************************************************/

                        $succes = "Vous êtes bien enregistré ! Cliquez <a href=\"../vues/connexion.vue.php\" class=\"alert-link\">ici</a> pour vous connecter.";
                      } else {

                        $erreur = "Votre inscription a échoué, veuillez ré-essayer ultérieurement.";
                      }
=======
                      
                      inserer_membre(filtrerMots($prenom), $nom, $email, $mot_de_passe);

                      /*********************************************************************
											$header = "MIME-Version: 1.0\r\n";
											$header .= 'From: "Forum.com" <bacquet.simon@outlook.fr>'."\n";
											$header .= 'Content-Type:text/html; charset="utf-8"'."\n";
											$header .= 'Content-Transfer-Encoding: 8bit';

											$message='
											<html>
												<body>
										      <p> Félicitations ! Votre compte a bien été créé. </p
												</body>
											</html>
											';

											mail($mail, "Confirmation de création de compte", $message, $header);
											************************************************************************/

                      $succes = "Vous êtes bien enregistré ! Cliquez <a href=\"../vues/connexion.vue.php\" class=\"alert-link\">ici</a> pour vous connecter.";

>>>>>>> Stashed changes
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
