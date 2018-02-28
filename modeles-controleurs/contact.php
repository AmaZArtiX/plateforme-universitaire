<?php

  session_start();

  require("../fonctions/fonctions.php");

  // Existence du bouton submit du formulaire
  if (isset($_POST['btn_contact'])) {

    // Existence du nom complet
    if (isset($_POST['nom_complet']) && !empty(['nom_complet'])) {

      // Récupération du nom saisi
      $nom_complet = htmlspecialchars($_POST['nom_complet']);
      // Longueur du nom complet saisi
      $nom_completLength = strlen($nom_complet);

      if ($nom_completLength >= 8) {

        // Existence du mail
        if (isset($_POST['email']) && !empty($_POST['email'])) {

          // Récupération du mail saisi
          $mail = htmlspecialchars($_POST['email']);
          // Longueur du mail saisi
          $mailLength = strlen($mail);

          if ($mailLength >= 8) {

            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

              if (isset($_POST['sujet']) && !empty(['sujet'])) {

                // Récupération du sujet saisi
                $sujet = htmlspecialchars($_POST['sujet']);
                // Longueur du sujet saisi
                $sujetLength = strlen($sujet);

                if ($sujetLength >= 5) {

                  if (isset($_POST['message']) && !empty(['message'])) {

                    // Récupération du message saisi
                    $message = htmlspecialchars($_POST['message']);
                    // Longueur du message saisi
                    $messageLength = strlen($message);

                    if ($messageLength >= 200) {

                      // Envoie du mail
                      /***********************************************************/
                      $header = "MIME-Version: 1.0\r\n";
                      $header .= 'From: "'.$nom_complet.'" <'.$mail.'>'."\n";
                      $header .= 'Content-Type:text/html; charset="utf-8"'."\n";
                      $header .= 'Content-Transfer-Encoding: 8bit';

                      $message_mail='
                      <html>
                        <body>
                          <p>'.$message.'</p>
                        </body>
                      </html>
                      ';

                      mail("bacquet.simon@outlook.fr", $sujet, $message_mail, $header);
                      /***********************************************************/

                      $succes = "Votre message a bien été envoyé, nous vous remercions pour l'attention que vous portez à notre application";
                    }
                    else
                      $erreur = "Votre message ne doit pas être inférieur à 200 caractères";
                  }
                }
                else
                  $erreur = "Votre sujet ne doit pas être inférieur à 5 caractères";
              }
            }
            else
              $erreur = "Votre adresse e-mail n'est pas valide";
          }
          else
            $erreur = "Votre adresse e-mail ne doit pas être inférieure à 8 caractères";
        }
      }
      else
        $erreur = "Votre nom complet ne doit pas être inférieur à 8 caractères";
    }
  }

?>
