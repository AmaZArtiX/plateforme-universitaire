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
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark header">
        <a class="navbar-brand" href="../index.php">
          <img src="../assets/UVHC-blanc.png" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <?php
            if(!isset($_SESSION['mem_id'])) {
          ?>
            <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
              <li class="nav-item">
                <a class="nav-link" href="../index.php">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Forum</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="connexion.vue.php">Se connecter</a>
              </li>
            </ul>
          <?php
            } else {
          ?>
            <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
              <li class="nav-item">
                <a class="nav-link" href="../index.php">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Forum</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?= $_SESSION['mem_prenom'] ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mon compte</a>
                  <?php
                    if($_SESSION['mem_administrateur'] == 1) {
                  ?>
                  <a class="dropdown-item" href="../vues/administration.vue.php">Administration</a>
                  <?php
                    }
                  ?>
                  <a class="dropdown-item" href="../modeles-controleurs/deconnexion.php">Quitter</a>
                </div>
              </li>
            </ul>
          <?php
            }
          ?>
        </div>
      </nav>
    </header>
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
              <span id="caracteres">200</span> caractères restants
              <script type="text/javascript">
                function reste(texte) {
                    var restants=200-texte.length;
                    document.getElementById('caracteres').innerHTML=restants;
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
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2 class="logo"><img src="../assets/UVHC-blanc.png"/></h2>
                </div>
                <div class="col-sm-2">
                    <h5>Pour commencer</h5>
                    <ul>
                        <li><a href="../index.php">Accueil</a></li>
                        <?php
                          if(!isset($_SESSION['mem_id'])) {
                        ?>
                        <li><a href="../vues/connexion.vue.php">Se connecter</a></li>
                        <?php
                          }
                        ?>
                        <li><a href="../vues/inscription.vue.php">S'inscrire</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>À propos de nous</h5>
                    <ul>
                        <li><a href="#">Informations</a></li>
                        <li><a href="../vues/contact.vue.php">Nous contacter</a></li>
                        <li><a href="#">Nouveautés</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Aide</a></li>
                        <li><a href="#">Forum</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <div class="social-networks">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <a href="../vues/contact.vue.php" class="btn btn-default">Nous contacter</a>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2018 Copyright</p>
        </div>
    </footer>
    <!-- Fin Footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
