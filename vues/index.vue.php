<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/carousel.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/index.css">
  </head>
  <body>
    <!-- Header -->
    <?php
      $header = "accueil";
      require("header.vue.php");
    ?>
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
            <img class="first-slide" src="../assets/img1-carousel.jpg" alt="">
            <div class="layer">
              <div class="container">
                <div class="carousel-caption text-left content content-left">
                  <h1>Créer un compte</h1>
                  <p>La création d'un compte vous permettra de publier sur le Forum ainsi qu'accéder à la Plateforme d'aide en ligne proposé par nos services. N'hésitez plus, ça ne prend que quelques secondes !</p>
                  <p><a class="btn btn-lg btn-primary" href="inscription.vue.php" role="button">S'inscrire</a>
                    <?php
                      if(!isset($_SESSION['mem_id'])) {
                    ?>
                    <a class="btn btn-lg btn-success" href="connexion.vue.php" role="button">Déjà inscrit(e) ? Connectez-vous !</a>
                    <?php
                      }
                    ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="../assets/img2-carousel.jpg" alt="">
            <div class="layer">
              <div class="container">
                <div class="carousel-caption content content-middle">
                  <h1>Forum étudiant</h1>
                  <p>Le Forum étudiant vous permettra de discuter et d'échanger vos expériences et ressentis sur les cours dispensés à l'Université de Valenciennes et du Hainaut-Cambrésis. Rejoignez des centaines d'étudiant(e)s dès maintenant !</p>
                  <p><a class="btn btn-lg btn-primary" href="forum.vue.php" role="button">Découvrir</a></p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="../assets/img3-carousel.jpg" alt="">
            <div class="layer">
              <div class="container">
                <div class="carousel-caption text-right content content-right">
                  <h1>Plateforme d'aide</h1>
                  <p>Description de la plateforme.</p>
                  <p><a class="btn btn-lg btn-primary" href="#" role="button">Accéder</a></p>
                </div>
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
            <img class="rounded-circle" src="../assets/ronan.png" width="140" height="140">
            <h2>Ronan</h2>
            <blockquote class="blockquote">
              <p>Ancien stagiaire à la <i>SNCF</i>, je travaille désormais en tant que stagiaire développeur web pour la <i>DIRECCTE</i>.</p>
              <footer class="blockquote-footer"><cite>L'informatique a toujours été une passion pour moi, si celle-ci était une voiture, la curiosité en serait le moteur.</cite></footer>
            </blockquote>
            <p><a class="btn btn-secondary" href="https://github.com/Aklugua" role="button">Voir &raquo;</a></p>
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="../assets/simon.jpg" width="140" height="140">
            <h2>Simon</h2>
            <blockquote class="blockquote">
              <p>En étroite collaboration avec la <i>CCI</i> des Hauts-de-France, je renouvelle mon contrat pour me tourner vers la sécurité</p>
              <footer class="blockquote-footer"><cite>Notre service informatique possède plus de virus qu'une prostitué à $10 !</cite></footer>
            </blockquote>
            <p><a class="btn btn-secondary" href="https://github.com/AmaZArtiX" role="button">Voir &raquo;</a></p>
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="../assets/yacine.jpg" width="140" height="140">
            <h2>Yacine</h2>
            <blockquote class="blockquote">
              <p>Après avoir récemment travaillé au sein d'une équipe IT, je me dirige vers le monde de l'automobile aux côtés de <i>Toyota</i>.</p>
              <footer class="blockquote-footer"><cite>L'informatique, ça fait gagner beaucoup de temps... à condition d'en avoir beaucoup devant soi !</cite></footer>
            </blockquote>
            <p><a class="btn btn-secondary" href="https://github.com/thechocoboy" role="button">Voir &raquo;</a></p>
          </div>
        </div>
        <!-- Fin des colonnes -->
      </div>
      <!-- Fin container -->

      <!-- Footer -->
      <?php
        require("footer.vue.php");
      ?>
      <!-- Fin footer -->

    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
