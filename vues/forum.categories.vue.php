<?php
  require("../modeles-controleurs/forum.categories.php");
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
      $header = "forum";
      require("header.vue.php");
    ?>
    <!-- Fin header -->

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="container" style="margin-top:5rem; margin-bottom: 25px;">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./forum.vue.php">Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $_GET['categorie']?></li>
      </ol>
    </nav>
    <!-- Fin Breadcrumb -->

    <!-- Principal -->
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="card" style="margin-bottom:25px;">
            <h6 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">
              <b>► <a href="#" style="color:white;"><?= $_GET['categorie'] ?></a></b>
            </h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <?php while($sscat = $req_souscategories->fetch()) { ?>
                  <tr class="lien align-middle" onclick="location.href = './forum.ss-categories.vue.php?categorie=<?= $_GET['categorie'] ?>&ss-categorie=<?= $sscat['sscat_nom'] ?>&page=1'">
                    <td class="align-middle">¤</td>
                    <td class="align-middle"><b><?= $sscat['sscat_nom'] ?></b></td>
                    <td class="text-center text-muted align-middle"><?= get_nb_topics_sscategorie($sscat['sscat_id']) ?><br/> Topics</td>
                    <td class="text-center text-muted align-middle"><?= get_nb_posts_sscategorie($sscat['sscat_id']) ?><br/> Posts</td>
                    <td class="align-middle" style="text-align:right;"><?= get_dernier_topic_sscategorie($sscat['sscat_id']) ?></td>
                  </tr>
                <?php } ?>
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
                <?php
                  $dernieres_publis_categorie = get_derniers_topics_categorie($id_categorie);

                  while($dpc = $dernieres_publis_categorie->fetch()) {
                ?>
                  <tr class="lien align-middle" onclick="location.href = './forum.topic.vue.php?titre=<?= url_custom_encode($dpc['top_sujet']) ?>&id=<?= $dpc['top_id'] ?>&page=1'">
                    <td class="align-middle"><b>Re: <a href="./forum.topic.vue.php?titre=<?= url_custom_encode($dpc['top_sujet']) ?>&id=<?= $dpc['top_id'] ?>&page=1"><?= $dpc['top_sujet'] ?></a></b> <br/> <small class="text-muted">par <b><a href=""><?= get_nom_prenom_membre($dpc['mem_id']) ?></a></b></small></td>
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
    <script src="../js/inscription.js"></script>
  </body>
</html>
