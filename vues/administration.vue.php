<?php
  require("../modeles-controleurs/inscription.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administration</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/administration.css">
  </head>
  <body>
    <!-- Header -->
    <?php
      require("header.vue.php");
    ?>
    <!-- Fin Header -->

    <!-- Header Management-->
    <header>
      <div class="container-fluid" style="margin-top:3.5rem; margin-bottom:25px; background-color:#8CB75B;">
        <div class="row">
          <div class="col-md-10">
            <h1 style="color:white;"> Tableau de bord <small style="color:#C6DBAE;">Gérer la messagerie</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:white; color:#8CB75B;">
                Créer du contenu
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Ajouter page</a>
                <a class="dropdown-item" href="#">Ajouter topic</a>
                <a class="dropdown-item" href="#">Ajouter utilisateur</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Fin Header -->

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="container" style="margin-bottom: 25px;">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Administration</li>
      </ol>
    </nav>
    <!-- Fin Breadcrumb -->

    <!-- Section -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group" style="margin-bottom:25px">
              <a href="administration.vue.php" class="list-group-item active" style="background-color:#8CB75B; border-color:#8CB75B;">
                Tableau de bord
              </a>
              <a href="messagerie.vue.php" class="list-group-item d-flex justify-content-between align-items-center" style="color:#8CB75B;"> Messagerie <span class="badge badge-secondary">12</span></a>
              <a href="topic.vue.php" class="list-group-item d-flex justify-content-between align-items-center" style="color:#8CB75B;"> Topics <span class="badge badge-secondary">33</span></a>
              <a href="utilisateur.vue.php" class="list-group-item d-flex justify-content-between align-items-center" style="color:#8CB75B;"> Utilisateurs <span class="badge badge-secondary">203</span></a>
              <a href="#" class="list-group-item d-flex justify-content-between align-items-center" style="color:#8CB75B;"> Autres <span class="badge badge-secondary">+999</span></a>
            </div>
          </div>

          <div class="col-md-9">
            <div class="card" style="margin-bottom:25px">
              <h5 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">Vue d'ensemble</h5>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <h2 class="card-title"><span class="badge badge-secondary">203</span></h2>
                        <p class="card-text">Utilisateurs</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <h2 class="card-title"><span class="badge badge-secondary">12</span></h2>
                        <p class="card-text">Pages</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <h2 class="card-title"><span class="badge badge-secondary">33</span></h2>
                        <p class="card-text">Topics</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <h2 class="card-title"><span class="badge badge-secondary">123</span></h2>
                        <p class="card-text">Visiteurs</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Derniers Utilisateurs -->
            <div class="card">
              <h5 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">Derniers topics</h5>
              <table class="table table-striped table-hover mb-0">
                <tr>
                  <th>Titre</th>
                  <th>Créateur</th>
                  <th>Composante</th>
                  <th>Date</th>
                </tr>
                <tr>
                  <td>Titi</td>
                  <td>Jill Smith</td>
                  <td>ISTV</td>
                  <td>Dec 12, 2016</td>
                </tr>
                <tr>
                  <td>Toto</td>
                  <td>Eve Jackson</td>
                  <td>FLLASH</td>
                  <td>Dec 13, 2016</td>
                </tr>
                <tr>
                  <td>Tata</td>
                  <td>John Doe</td>
                  <td>IAE</td>
                  <td>Dec 13, 2016</td>
                </tr>
                <tr>
                  <td>Tutu</td>
                  <td>Stephanie Landon</td>
                  <td>FSMS</td>
                  <td>Dec 14, 2016</td>
                </tr>
                <tr>
                  <td>Tete</td>
                  <td>Mike Johnson</td>
                  <td>IUT</td>
                  <td>Dec 15, 2016</td>
                </tr>
              </table>
              <div class="card-footer text-center text-muted">
                Attention : Contenu non pertinent !
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Fin Section -->

    <!-- Footer -->
    <?php
      require("footer.vue.php");
    ?>
    <!-- Fin footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/inscription.js"></script>
  </body>
</html>
