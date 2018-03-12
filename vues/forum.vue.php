<?php

  require("../modeles-controleurs/forum.php");
  session_start();

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Forum étudiant</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/forum.css">
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
                  <a class="nav-link" href="forum.vue.php">Forum</a>
                </li>
                <li class="nav-item active">
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
                  <a class="nav-link" href="forum.vue.php">Forum</a>
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
                    <a class="dropdown-item" href="administration.vue.php">Administration</a>
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

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="container" style="margin-top:5rem; margin-bottom: 25px;">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Accueil</li>
      </ol>
    </nav>
    <!-- Fin Breadcrumb -->

    <?php
      if (isset($_SESSION['mem_id'])) {
    ?>
    <!-- Activités récentes relatives à l'utilisateur -->
    <div class="container" style="margin-bottom: 25px;">
      <div class="card">
        <h5 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">Réponses à vos publications</h5>
        <div class="card-body">
          <p class="card-text text-muted">Aucune publication à afficher.</p>
        </div>
        <div class="card-footer text-muted text-center">
          Dernière activité : Jamais.
        </div>
      </div>
    </div>
    <!-- Fin -->
    <?php
      }
    ?>

    <!-- Activités récentes -->
    <div class="container">
      <div class="card">
        <h5 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">Publications récentes</h5>
        <div class="card-body text-center">
          <table class="table table-striped table-hover">
            <tr>
              <th>Catégorie</th>
              <th>Messages</th>
              <th>Dernier message</th>
            </tr>
            <tr class="lien" onclick="location.href = '#'">
              <td>Divers</td>
              <td>12</td>
              <td>Dec 12, 2016 de Jill Smith</td>
            </tr>
            <tr class="lien" onclick="location.href = '#'">
              <td>ISTV</td>
              <td>65</td>
              <td>Dec 13, 2016 de Eve Jackson</td>
            </tr>
            <tr class="lien" onclick="location.href = '#'">
              <td>IUT</td>
              <td>42</td>
              <td>Dec 13, 2016 de John Doe</td>
            </tr>
            <tr class="lien" onclick="location.href = '#'">
              <td>FLLASH</td>
              <td>17</td>
              <td>Dec 14, 2016 de Stephanie Landon</td>
            </tr>
            <tr class="lien" onclick="location.href = '#'">
              <td>FSMS</td>
              <td>23</td>
              <td>Dec 15, 2016 de Mike Johnson</td>
            </tr>
          </table>
        </div>
        <div class="card-footer text-muted text-center">
          Dernière activité : Il y a 1 jour.
        </div>
      </div>
    </div>
    <!-- Fin -->

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
                        <li><a href="connexion.vue.php">Se connecter</a></li>
                        <?php
                          }
                        ?>
                        <li><a href="inscription.vue.php">S'inscrire</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>À propos de nous</h5>
                    <ul>
                        <li><a href="#">Informations</a></li>
                        <li><a href="contact.vue.php">Nous contacter</a></li>
                        <li><a href="#">Nouveautés</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Aide</a></li>
                        <li><a href="forum.vue.php">Forum</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <div class="social-networks">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <a href="contact.vue.php" class="btn btn-default">Nous contacter</a>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2018 Copyright</p>
        </div>
    </footer>
    <!-- Fin footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/inscription.js"></script>
  </body>
</html>
