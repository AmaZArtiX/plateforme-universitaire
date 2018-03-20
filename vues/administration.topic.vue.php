<?php
  require("../modeles-controleurs/inscription.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administration | Topics</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/administration.css">
  </head>
  <body>
    <!-- Header -->
    <?php
      $header = "utilisateur";
      require("header.vue.php");
    ?>
    <!-- Fin header -->

    <!-- Header Management-->
    <header>
      <div class="container-fluid" style="margin-top:3.5rem; margin-bottom:25px; background-color:#8CB75B;">
        <div class="row">
          <div class="col-md-10">
            <h1 style="color:white;"> Tableau de bord <small style="color:#C6DBAE;">Gérer les topics</small></h1>
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
        <li class="breadcrumb-item"><a href="administration.vue.php">Administration</a></li>
        <li class="breadcrumb-item active" aria-current="page">Topics</li>
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
              <a href="administration.messagerie.vue.php" class="list-group-item d-flex justify-content-between align-items-center" style="color:#8CB75B;"> Messagerie <span class="badge badge-secondary">12</span></a>
              <a href="administration.topic.vue.php" class="list-group-item d-flex justify-content-between align-items-center" style="color:#8CB75B;"> Topics <span class="badge badge-secondary">33</span></a>
              <a href="administration.utilisateur.vue.php" class="list-group-item d-flex justify-content-between align-items-center" style="color:#8CB75B;"> Utilisateurs <span class="badge badge-secondary">203</span></a>
              <a href="#" class="list-group-item d-flex justify-content-between align-items-center" style="color:#8CB75B;"> Autres <span class="badge badge-secondary">+999</span></a>
            </div>
          </div>

          <div class="col-md-9">
            <!-- Utilisateurs -->
            <div class="card">
              <h5 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">Topics</h5>
              <div class="card-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </div>
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
  </body>
</html>
