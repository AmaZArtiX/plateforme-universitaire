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
    <?php
      require("header.vue.php");
    ?>
    <!-- Fin header -->

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="container" style="margin-top:5rem; margin-bottom: 25px;">
      <ol class="breadcrumb">
        <?php
          if (isset($_GET['categorie']) && !isset($_GET['ss-categorie'])) {
            header('Location: ./forum.ss-categories.vue.php?categorie=' . $_GET['categorie']);
          } elseif (isset($_GET['categorie']) && isset($_GET['ss-categorie'])) {
            echo '
              <li class="breadcrumb-item"><a href="./forum.vue.php">Accueil</a></li>
              <li class="breadcrumb-item"><a href="./forum.ss-categories.vue.php?categorie=' . $_GET['categorie'] . '">@' . $_GET['categorie'] . '</a></li>
              <li class="breadcrumb-item active" aria-current="page">@' . $_GET['ss-categorie'] . '</li>
              ';
          } elseif (!isset($_GET['categorie']) && isset($_GET['ss-categorie'])) {
            header('Location: ./forum.vue.php');
          } elseif (!isset($_GET['categorie']) && !isset($_GET['ss-categorie'])) {
            header('Location: ./forum.vue.php');
          }
        ?>
      </ol>
    </nav>
    <!-- Fin Breadcrumb -->

    <!-- Principal -->
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="card" style="margin-bottom:25px;">
            <h6 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">
              <b>¤ <a href="./forum.topic.vue.php?categorie=Catégorie&ss-categorie=Sous-catégorie" style="color:white;">@Topic - @Auteur - @Date</a></b>
            </h6>
            <div class="card-body">
              Description: @Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="card-footer text-muted text-center">
              Dernière activité : @Il y a 1 jour - @Pseudo.
            </div>
          </div>

          <div class="card" style="margin-bottom:25px;">
            <h6 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">
              <b>¤ <a href="./forum.topic.vue.php?categorie=Catégorie&ss-categorie=Sous-catégorie" style="color:white;">@Topic - @Auteur - @Date</a></b>
            </h6>
            <div class="card-body">
              Description: @Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="card-footer text-muted text-center">
              Dernière activité : @Il y a 1 jour - @Pseudo.
            </div>
          </div>
        </div>
        <div class="col-md-3">

          <!-- Activités récentes -->
          <div class="card" style="margin-bottom:25px">
            <h6 class="card-header">Dernières publications</h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <tr class="lien align-middle" onclick="location.href = '#'">
                  <td class="align-middle"><b>Re: <a href="./forum.topic.vue.php?categorie=Catégorie&ss-categorie=Sous-catégorie">@Informations</a></b> <br/> <small class="text-muted">par <b><a href="">@Toto</a></b></small> <br/> @Réponse...</td>
                </tr>
                <tr class="lien align-middle" onclick="location.href = '#'">
                  <td class="align-middle"><b>Re: <a href="./forum.topic.vue.php?categorie=Catégorie&ss-categorie=Sous-catégorie">@Généralités</a></b> <br/> <small class="text-muted">par <b><a href="">@Titi</a></b></small> <br/> @Réponse...</td>
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
              <p class="card-text text-muted">@Aucune réponse à afficher.</p>
            </div>
            <div class="card-footer text-muted text-center">
              Dernière activité : @Jamais.
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
    <?php
      require("footer.vue.php");
    ?>
    <!-- Fin footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/inscription.js"></script>
  </body>
</html>
