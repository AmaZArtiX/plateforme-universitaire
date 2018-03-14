<?php

  session_start();

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>
    <!-- Header -->
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark header">
        <a class="navbar-brand" href="index.php">
          <img src="assets/UVHC-blanc.png" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <?php
            if(!isset($_SESSION['mem_id'])) {
          ?>
              <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="vues/forum.vue.php">Forum</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="vues/connexion.vue.php">Se connecter</a>
                </li>
              </ul>
          <?php
            } else {
          ?>
              <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="vues/forum.vue.php">Forum</a>
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
                    <a class="dropdown-item" href="vues/administration.vue.php">Administration</a>
                    <?php
                      }
                    ?>
                    <a class="dropdown-item" href="modeles-controleurs/deconnexion.php">Deconnexion</a>
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

    <main role="main">
      <!-- Carrousel -->
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="" alt="">
            <div class="container">
              <div class="carousel-caption text-left content content-left">
                <h1>Créer un compte</h1>
                <p>La création d'un compte vous permettra de publier sur le Forum ainsi qu'accéder à la Plateforme d'aide en ligne proposé par nos services. N'hésitez plus, ça ne prend que quelques secondes !</p>
                <p><a class="btn btn-lg btn-primary" href="vues/inscription.vue.php" role="button">S'inscrire</a>
                  <?php
                    if(!isset($_SESSION['mem_id'])) {
                  ?>
                  <a class="btn btn-lg btn-success" href="vues/connexion.vue.php" role="button">Déjà inscrit(e) ? Connectez-vous !</a>
                  <?php
                    }
                  ?>
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="" alt="">
            <div class="container">
              <div class="carousel-caption content content-middle">
                <h1>Forum étudiant</h1>
                <p>Le Forum étudiant vous permettra de discuter et d'échanger vos expériences et ressentis sur les cours dispensés à l'Université de Valenciennes et du Hainaut-Cambrésis. Rejoignez des centaines d'étudiant(e)s dès maintenant !</p>
                <p><a class="btn btn-lg btn-primary" href="vues/forum.vue.php" role="button">Découvrir</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="" alt="">
            <div class="container">
              <div class="carousel-caption text-right content content-right">
                <h1>Plateforme d'aide</h1>
                <p>Description de la plateforme.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Accéder</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
      <!-- Fin carrousel -->
      <!-- Container -->
      <div class="container marketing upfooter">
        <!-- Featurette -->

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Premier. <span class="text-muted">Toto</span></h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Titi <span class="text-muted">Tata</span></h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Tata <span class="text-muted">Tutu</span></h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">
        <!-- Fin featurette -->
        <!-- Trois colonnes -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
            <h2>Ronan</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p><a class="btn btn-secondary" href="https://github.com/Aklugua" role="button">Voir &raquo;</a></p>
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
            <h2>Simon</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p><a class="btn btn-secondary" href="https://github.com/AmaZArtiX" role="button">Voir &raquo;</a></p>
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
            <h2>Yacine</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
            <p><a class="btn btn-secondary" href="https://github.com/thechocoboy" role="button">Voir &raquo;</a></p>
          </div>
        </div>
        <!-- Fin des colonnes -->
      </div>
      <!-- Fin container -->

      <!-- Footer -->
      <footer id="footer">
          <div class="container">
              <div class="row">
                  <div class="col-sm-3">
                      <h2 class="logo"><img src="./assets/UVHC-blanc.png"/></h2>
                  </div>
                  <div class="col-sm-2">
                      <h5>Pour commencer</h5>
                      <ul>
                          <li><a href="./index.php">Accueil</a></li>
                          <?php
                            if(!isset($_SESSION['mem_id'])) {
                          ?>
                          <li><a href="./vues/connexion.vue.php">Se connecter</a></li>
                          <?php
                            }
                          ?>
                          <li><a href="./vues/inscription.vue.php">S'inscrire</a></li>
                      </ul>
                  </div>
                  <div class="col-sm-2">
                      <h5>À propos de nous</h5>
                      <ul>
                          <li><a href="#">Informations</a></li>
                          <li><a href="vues/contact.vue.php">Nous contacter</a></li>
                          <li><a href="#">Nouveautés</a></li>
                      </ul>
                  </div>
                  <div class="col-sm-2">
                      <h5>Support</h5>
                      <ul>
                          <li><a href="#">FAQ</a></li>
                          <li><a href="#">Aide</a></li>
                          <li><a href="vues/forum.vue.php">Forum</a></li>
                      </ul>
                  </div>
                  <div class="col-sm-3">
                      <div class="social-networks">
                          <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                          <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                          <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                      </div>
                      <a href="vues/contact.vue.php" class="btn btn-default">Nous contacter</a>
                  </div>
              </div>
          </div>
          <div class="footer-copyright">
              <p>© 2018 Copyright</p>
          </div>
      </footer>
      <!-- ./Footer -->

    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
