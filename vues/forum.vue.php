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
        <li class="breadcrumb-item active" aria-current="page">Accueil</li>
      </ol>
    </nav>
    <!-- Fin Breadcrumb -->

    <!-- Principal -->
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <?php while ($f = $forums->fetch()) {

            $categories->execute(array($f['for_id']));

          ?>
            <div class="card" style="margin-bottom:25px;">
              <h6 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">
                <b>▲ <a href="#" style="color:white;"><?= $f['for_nom'] ?></a></b>
              </h6>
              <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                  <?php while ($c = $categories->fetch()) { ?>
                    <tr class="lien align-middle" onclick="location.href = './forum.categories.vue.php?categorie=<?= $c['cat_nom'] ?>'">
                      <td class="align-middle">►</td>
                      <td class="align-middle"><b><?= $c['cat_nom'] ?></b> <br/> <small class="text-muted"><?= $c['cat_description'] ?></small></td>
                      <td class="text-center text-muted align-middle"><?= get_nb_topics_categorie($c['cat_id']) ?><br/> Topics</td>
                      <td class="text-center text-muted align-middle"><?= get_nb_posts_categorie($c['cat_id']) ?><br/> Posts</td>
                      <td class="align-middle" style="text-align:right;"><?= get_dernier_topic_categorie($c['cat_id']) ?></td>
                    </tr>
                  <?php } ?>
                </table>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="col-md-3">

          <!-- Activités récentes -->
          <div class="card" style="margin-bottom:25px">
            <h6 class="card-header">Dernières publications</h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <?php

                  $dernieres_publis = get_derniers_topics();

                  while ($dp = $dernieres_publis->fetch()) {

                ?>
                  <tr class="lien align-middle" onclick="location.href='./forum.topic.vue.php?titre=<?= url_custom_encode($dp['top_sujet']) ?>&id=<?= $dp['top_id'] ?>&page=1'">
                    <td class="align-middle"><b>Re: <a href="./forum.topic.vue.php?titre=<?= url_custom_encode($dp['top_sujet']) ?>&id=<?= $dp['top_id'] ?>&page=1"><?= $dp['top_sujet'] ?></a></b> <br/> <small class="text-muted">par <b><a href="#"><?= get_nom_prenom_membre($dp['mem_id']) ?></a></b></small></td>
                  </tr>
                <?php } ?>
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
