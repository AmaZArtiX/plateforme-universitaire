<?php

  require("../modeles-controleurs/forum.php");

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
                    <a class="dropdown-item" href="../modeles-controleurs/deconnexion.php">Deconnexion</a>
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
        <?php
          if (isset($_GET['categorie']) && !isset($_GET['ss-categorie'])) {
            echo '
              <li class="breadcrumb-item"><a href="./forum.vue.php">Accueil</a></li>
              <li class="breadcrumb-item active" aria-current="page">' . $_GET['categorie'] . '</li>
              ';
          } elseif (isset($_GET['categorie']) && isset($_GET['ss-categorie'])) {
            echo '
              <li class="breadcrumb-item"><a href="./forum.vue.php">Accueil</a></li>
              <li class="breadcrumb-item"><a href="./forum.vue.php?categorie=' . $_GET['categorie'] . '">' . $_GET['categorie'] . '</a></li>
              <li class="breadcrumb-item active" aria-current="page">' . $_GET['ss-categorie'] . '</li>
              ';
          } elseif (!isset($_GET['categorie']) && isset($_GET['ss-categorie'])) {
            echo '
              <li class="breadcrumb-item"><a href="./forum.vue.php">Accueil</a></li>
              <li class="breadcrumb-item active" aria-current="page">' . $_GET['ss-categorie'] . '</li>
              ';
          } else {
        ?>
        <li class="breadcrumb-item active" aria-current="page">Accueil</li>
        <?php
          }
        ?>
      </ol>
    </nav>
    <!-- Fin Breadcrumb -->

    <!-- Principal -->
    <div class="container">
      <div class="row">
        <div class="col-md-9">

          <?php
            if (!isset($_GET['categorie']) && !isset($_GET['ss-categorie'])) {
          ?>
          <div class="card" style="margin-bottom:25px;">
            <h6 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">
              <b>Primaire</b>
            </h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <tr class="lien align-middle" onclick="location.href = './forum.vue.php?categorie=Informations'">
                  <td class="align-middle">▲</td>
                  <td class="align-middle"><b>Informations</b> <br/> <small class="text-muted">Tout ce qu'il y a à savoir.</small></td>
                  <td class="text-center text-muted align-middle">2 <br/> Topics</td>
                  <td class="text-center text-muted align-middle">2 <br/> Posts</td>
                  <td class="align-middle" style="text-align:right;">Bienvenue <br/> par <b><a href="">Toto</a></b> 13/03/2018</td>
                </tr>
                <tr class="lien align-middle" onclick="location.href = './forum.vue.php?categorie=Generalites'">
                  <td class="align-middle">▲</td>
                  <td class="align-middle"><b>Généralités</b> <br/> <small class="text-muted">Exemples de topics, vous pouvez voir comment tout fonctionne.</small></td>
                  <td class="text-center text-muted align-middle">6 <br/> Topics</td>
                  <td class="text-center text-muted align-middle">45 <br/> Posts</td>
                  <td class="align-middle" style="text-align:right;">Re: Topic Populaire <br/> par <b><a href="">Titi</a></b> 13/03/2018</td>
                </tr>
                <tr class="lien align-middle" onclick="location.href = '#'">
                  <td class="align-middle">▲</td>
                  <td class="align-middle"><b>Plateforme d'aide</b> <br/> <small class="text-muted">Redirection vers la page de bienvenue de la plateforme d'aide à l'étude.</small></td>
                  <td colspan="2" class="text-center text-muted align-middle">33049 <br/> Redirections</td>
                  <td></td>
                </tr>
              </table>
            </div>
          </div>

          <div class="card" style="margin-bottom:25px;">
            <h6 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">
              <b>Secondaire</b>
            </h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <tr class="lien align-middle" onclick="location.href = '#'">
                  <td class="align-middle">►</td>
                  <td class="align-middle"><b>Informations</b> <br/> <small class="text-muted">Tout ce qu'il y a à savoir.</small></td>
                  <td class="text-center text-muted align-middle">2 <br/> Topics</td>
                  <td class="text-center text-muted align-middle">2 <br/> Posts</td>
                  <td class="align-middle" style="text-align:right;">Bienvenue <br/> par <b><a href="">Toto</a></b> 13/03/2018</td>
                </tr>
                <tr class="lien align-middle" onclick="location.href = '#'">
                  <td class="align-middle">►</td>
                  <td class="align-middle"><b>Généralités</b> <br/> <small class="text-muted">Exemples de topics, vous pouvez voir comment tout fonctionne.</small></td>
                  <td class="text-center text-muted align-middle">6 <br/> Topics</td>
                  <td class="text-center text-muted align-middle">45 <br/> Posts</td>
                  <td class="align-middle" style="text-align:right;">Re: Topic Populaire <br/> par <b><a href="">Titi</a></b> 13/03/2018</td>
                </tr>
                <tr class="lien align-middle" onclick="location.href = '#'">
                  <td class="align-middle">►</td>
                  <td class="align-middle"><b>Plateforme d'aide</b> <br/> <small class="text-muted">Redirection vers la page de bienvenue de la plateforme d'aide à l'étude.</small></td>
                  <td colspan="2" class="text-center text-muted align-middle">33049 <br/> Redirections</td>
                  <td></td>
                </tr>
              </table>
            </div>
          </div>
          <?php
            }
          ?>

          <?php
            if (isset($_GET['categorie']) || isset($_GET['ss-categorie'])) {
          ?>
          <div class="card" style="margin-bottom:25px">
            <h6 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">
              <?php
                if(isset($_GET['categorie']) && !isset($_GET['ss-categorie'])) {
                  echo '<b>' . $_GET['categorie'] . '</b>';
                } elseif (isset($_GET['categorie']) && isset($_GET['ss-categorie'])) {
                  echo '<b>' . $_GET['ss-categorie'] . '</b>';
                } elseif (!isset($_GET['categorie']) && isset($_GET['ss-categorie'])) {
                  echo '<b>' . $_GET['ss-categorie'] . '</b>';
                }
              ?>
            </h6>

            <?php
              if(isset($_GET['categorie']) && !isset($_GET['ss-categorie'])) {
            ?>
            <div class="text-center table-responsive">
              <table class="table table-striped table-hover">
                <tr>
                  <?php
                    if (isset($_GET['categorie'])) {
                      echo '
                        <th>Titi</th>
                        <th>Toto</th>
                        <th>Tata</th>
                        ';
                    } else {
                  ?>
                  <th>Catégorie</th>
                  <th>Messages</th>
                  <th>Dernier message</th>
                  <?php
                    }
                  ?>
                </tr>
                <?php
                  if(isset($_GET['categorie'])) {
                    echo '<tr class="lien" onclick=\'location.href = "./forum.vue.php?categorie=' . $_GET['categorie'] . '&ss-categorie=Divers"\'>';
                  } elseif (!isset($_GET['categorie'])) {
                    echo '<tr class="lien" onclick=\'location.href = "./forum.vue.php?ss-categorie=Divers"\'>';
                  }
                ?>
                  <td>Divers</td>
                  <td>12</td>
                  <td>Dec 12, 2016 de Jill Smith</td>
                </tr>
                <?php
                  if(isset($_GET['categorie'])) {
                    echo '<tr class="lien" onclick=\'location.href = "./forum.vue.php?categorie=' . $_GET['categorie'] . '&ss-categorie=ISTV"\'>';
                  } elseif (!isset($_GET['categorie'])) {
                    echo '<tr class="lien" onclick=\'location.href = "./forum.vue.php?ss-categorie=ISTV"\'>';
                  }
                ?>
                  <td>ISTV</td>
                  <td>65</td>
                  <td>Dec 13, 2016 de Eve Jackson</td>
                </tr>
                <?php
                  if(isset($_GET['categorie'])) {
                    echo '<tr class="lien" onclick=\'location.href = "./forum.vue.php?categorie=' . $_GET['categorie'] . '&ss-categorie=IUT"\'>';
                  } elseif (!isset($_GET['categorie'])) {
                    echo '<tr class="lien" onclick=\'location.href = "./forum.vue.php?ss-categorie=IUT"\'>';
                  }
                ?>
                  <td>IUT</td>
                  <td>42</td>
                  <td>Dec 13, 2016 de John Doe</td>
                </tr>
                <?php
                  if(isset($_GET['categorie'])) {
                    echo '<tr class="lien" onclick=\'location.href = "./forum.vue.php?categorie=' . $_GET['categorie'] . '&ss-categorie=FLLASH"\'>';
                  } elseif (!isset($_GET['categorie'])) {
                    echo '<tr class="lien" onclick=\'location.href = "./forum.vue.php?ss-categorie=FLLASH"\'>';
                  }
                ?>
                  <td>FLLASH</td>
                  <td>17</td>
                  <td>Dec 14, 2016 de Stephanie Landon</td>
                </tr>
                <?php
                  if(isset($_GET['categorie'])) {
                    echo '<tr class="lien" onclick=\'location.href = "./forum.vue.php?categorie=' . $_GET['categorie'] . '&ss-categorie=FSMS"\'>';
                  } elseif (!isset($_GET['categorie'])) {
                    echo '<tr class="lien" onclick=\'location.href = "./forum.vue.php?ss-categorie=FSMS"\'>';
                  }
                ?>
                  <td>FSMS</td>
                  <td>23</td>
                  <td>Dec 15, 2016 de Mike Johnson</td>
                </tr>
              </table>
            </div>
            <div class="card-footer text-muted text-center">
              Dernière activité : Il y a 1 jour.
            </div>
            <?php
              } elseif(isset($_GET['categorie']) && isset($_GET['ss-categorie'])) {
            ?>
            <div class="card-body">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <?php
              }
            ?>

          </div>
          <?php
            }
          ?>
        </div>
        <div class="col-md-3">

          <!-- Activités récentes -->
          <div class="card" style="margin-bottom:25px">
            <h6 class="card-header">Dernières publications</h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <tr class="lien align-middle" onclick="location.href = '#'">
                  <td class="align-middle"><b>Re: Informations</b> <br/> <small class="text-muted">par Toto</small> <br/> Réponse...</td>
                </tr>
                <tr class="lien align-middle" onclick="location.href = '#'">
                  <td class="align-middle"><b>Re: Généralités</b> <br/> <small class="text-muted">par <b>Titi</b></small> <br/> Réponse...</td>
                </tr>
              </table>
            </div>
          </div>

          <?php
            if (isset($_SESSION['mem_id'])) {
          ?>
          <!-- Activités récentes relatives à l'utilisateur -->
          <div class="card" style="margin-bottom:25px">
            <h6 class="card-header">Réponses à vos publications</h6>
            <div class="card-body">
              <p class="card-text text-muted">Aucune réponse à afficher.</p>
            </div>
            <div class="card-footer text-muted text-center">
              Dernière activité : Jamais.
            </div>
          </div>
          <!-- Fin -->
          <?php
            }
          ?>
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
