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
            header('Location: ./forum.topics.vue.php?categorie=' . $_GET['categorie'] . '&ss-categorie=' . $_GET['ss-categorie']);
          } elseif (!isset($_GET['categorie']) && isset($_GET['ss-categorie'])) {
            header('Location: ./forum.vue.php');
          } elseif (!isset($_GET['categorie']) && !isset($_GET['ss-categorie'])) {
            echo '<li class="breadcrumb-item active" aria-current="page">Accueil</li>';
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
              <b>▲ <a href="./forum.ss-categories.vue.php?categorie=Catégorie" style="color:white;">@Catégorie</a></b>
            </h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <tr class="lien align-middle" onclick="location.href = './forum.topics.vue.php?categorie=Catégorie&ss-categorie=Sous-catégorie'">
                  <td class="align-middle">►</td>
                  <td class="align-middle"><b>@Sous-catégorie</b> <br/> <small class="text-muted">@Tout ce qu'il y a à savoir.</small></td>
                  <td class="text-center text-muted align-middle">@2 <br/> Topics</td>
                  <td class="text-center text-muted align-middle">@2 <br/> Posts</td>
                  <td class="align-middle" style="text-align:right;">Re: @Topic <br/> par <b><a href="">@Toto</a></b> @13/03/2018</td>
                </tr>
                <tr class="lien align-middle" onclick="location.href = './forum.topics.vue.php?categorie=Catégorie&ss-categorie=Sous-catégorie'">
                  <td class="align-middle">►</td>
                  <td class="align-middle"><b>@Sous-catégorie</b> <br/> <small class="text-muted">@Exemples de topics, vous pouvez voir comment tout fonctionne.</small></td>
                  <td class="text-center text-muted align-middle">@6 <br/> Topics</td>
                  <td class="text-center text-muted align-middle">@45 <br/> Posts</td>
                  <td class="align-middle" style="text-align:right;">Re: @Topic <br/> par <b><a href="">@Titi</a></b> @13/03/2018</td>
                </tr>
              </table>
            </div>
          </div>

          <div class="card" style="margin-bottom:25px;">
            <h6 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">
              <b>▲ <a href="./forum.ss-categories.vue.php?categorie=Catégorie" style="color:white;">@Catégorie</a></b>
            </h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <tr class="lien align-middle" onclick="location.href = './forum.topics.vue.php?categorie=Catégorie&ss-categorie=Sous-catégorie'">
                  <td class="align-middle">►</td>
                  <td class="align-middle"><b>@Sous-catégorie</b> <br/> <small class="text-muted">@Tout ce qu'il y a à savoir.</small></td>
                  <td class="text-center text-muted align-middle">@2 <br/> Topics</td>
                  <td class="text-center text-muted align-middle">@2 <br/> Posts</td>
                  <td class="align-middle" style="text-align:right;">Re: @Topic <br/> par <b><a href="">@Toto</a></b> @13/03/2018</td>
                </tr>
                <tr class="lien align-middle" onclick="location.href = './forum.topics.vue.php?categorie=Catégorie&ss-categorie=Sous-catégorie'">
                  <td class="align-middle">►</td>
                  <td class="align-middle"><b>@Sous-catégorie</b> <br/> <small class="text-muted">@Exemples de topics, vous pouvez voir comment tout fonctionne.</small></td>
                  <td class="text-center text-muted align-middle">@6 <br/> Topics</td>
                  <td class="text-center text-muted align-middle">@45 <br/> Posts</td>
                  <td class="align-middle" style="text-align:right;">Re: @Topic <br/> par <b><a href="">@Titi</a></b> @13/03/2018</td>
                </tr>
              </table>
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
  </body>
</html>
