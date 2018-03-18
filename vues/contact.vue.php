<?php
  require("../modeles-controleurs/contact.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Nous contacter</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/contact.css">
  </head>
  <body>
    <!-- Header -->
    <?php
      require("header.vue.php");
    ?>
    <!-- Fin header -->

    <div class="container bg-light py-3" style="margin-top: 100px; margin-bottom:50px;">
      <form id="contact-form" method="post" action="" role="form">
        <div class="messages">
          <?php

            if(isset($erreur)){

              afficherAlerte("", $erreur, "danger");
            } else if(isset($succes)){

              afficherAlerte("", $succes, "success");
            }

          ?>
        </div>
        <div class="controls">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="form_nom">Nom complet</label>
                <input id="form_nom" type="text" name="nom_complet" class="form-control" placeholder="Votre nom complet" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="form_email">Adresse e-mail</label>
                <input id="form_email" type="email" name="email" class="form-control" placeholder="Votre adresse e-mail" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="form_sujet">Sujet</label>
                <input id="form_sujet" type="text" name="sujet" class="form-control" placeholder="Le sujet de votre demande" required>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="form_message">Message</label>
              <textarea id="form_message" onkeyup="reste(this.value);" name="message" class="form-control" placeholder="Décrivez vos remarques ici ..." rows="4" required></textarea>
              <span id="caracteres"></span>
              <script type="text/javascript">
                function reste(texte) {
                    var restants=200-texte.length;
                    if (restants >= 0) {
                      document.getElementById('caracteres').innerHTML=restants + " caractères restants";
                    } else {

                      document.getElementById('caracteres').style.visibility = 'hidden';
                    }
                }
              </script>
            </div>
          </div>
          <div class="col-md-12">
            <input type="submit" name="btn_contact" class="btn btn-primary btn-send" value="Envoyer">
          </div>
        </div>
      </form>
    </div>

    <!-- Footer -->
    <?php
      require("footer.vue.php");
    ?>
    <!-- Fin Footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
