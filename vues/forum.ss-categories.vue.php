<?php
  require("../modeles-controleurs/forum.ss-categories.php");
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

    <!-- Principal -->
    <div class="container" style="margin-top:5rem; margin-bottom:1rem;">
      <div class="row">
        <div class="col-md-9">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./forum.vue.php">Accueil</a></li>
              <li class="breadcrumb-item"><a href="./forum.categories.vue.php?categorie=<?= $_GET['categorie'] ?>"><?= $_GET['categorie'] ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?= $_GET['ss-categorie'] ?></li>
            </ol>
          </nav>

          <div class="card" style="margin-bottom:1rem;">
            <h6 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">
              <b>► <a href="#" style="color:white;"><?= $_GET['ss-categorie'] ?></a></b>
            </h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <?php
                  if($topics->rowCount() > 0) {
                    while ($t = $topics->fetch()) {
                ?>
                <tr class="lien align-middle" onclick="location.href = './forum.topic.vue.php?titre=<?= url_custom_encode($t['top_sujet']) ?>&id=<?= $t['top_id'] ?>&page=1'">
                  <td class="align-middle">¤</td>
                  <td class="align-middle"><b><?= $t['top_sujet'] ?></b> <br/> <small class="text-muted">@Tout ce qu'il y a à savoir.</small></td>
                  <td class="text-center text-muted align-middle"><?= get_nb_messages_topic($t['top_id']) ?><br/> Posts</td>
                  <td class="align-middle" style="text-align:right;">par <b><a href="./compte.vue.php?mem_id=<?php echo $t['mem_id']; ?>"><?= $t['mem_prenom']." ".$t['mem_nom'] ?></a></b> <?= date_format(date_create($t['top_date_creation']), 'd/m/Y H:i') ?></td>
                </tr>
                <?php } } else { ?>
                <tr>
                  <td class="align-middle">Aucun topic n'a été trouvée.</td>
                </tr>
                <?php } ?>
              </table>
            </div>
          </div>

          <?php

            $pagination = "<nav aria-label=\"Page navigation example\">
                            <ul class=\"pagination\">";

            if($pageCourante != 1) {

              $pagination .= "<li class=\"page-item\">
                              <a class=\"page-link\" href=\"forum.ss-categories.vue.php?categorie=".$_GET['categorie']."&ss-categorie=".$_GET['ss-categorie']."&page=".($pageCourante-1)."\" aria-label=\"Previous\">
                                <span aria-hidden=\"true\">&laquo;</span>
                                <span class=\"sr-only\">Previous</span>
                              </a>
                            </li>";
            }

            for ($i=1; $i <= $pagesTotales; $i++) {

              if ($i == $pageCourante) {
                $pagination .= "<li class=\"page-item active\">
                                  <a class=\"page-link\" href=\"forum.ss-categories.vue.php?categorie=".$_GET['categorie']."&ss-categorie=".$_GET['ss-categorie']."&page=".$i."\">".$i."<span class=\"sr-only\">(current)</span></a>
                                </li>";
              }
              else {
                $pagination .= "<li class=\"page-item\">
                                  <a class=\"page-link\" href=\"forum.ss-categories.vue.php?categorie=".$_GET['categorie']."&ss-categorie=".$_GET['ss-categorie']."&page=".$i."\">".$i."</a>
                                </li>";
              }
            }

            if($pageCourante < $pagesTotales){

              $pagination .= "<li class=\"page-item\">
                                <a class=\"page-link\" href=\"forum.ss-categories.vue.php?categorie=".$_GET['categorie']."&ss-categorie=".$_GET['ss-categorie']."&page=".($pageCourante+1)."\" aria-label=\"Next\">
                                  <span aria-hidden=\"true\">&raquo;</span>
                                  <span class=\"sr-only\">Next</span>
                                </a>
                              </li>";
          }

            $pagination .= "</ul>
                          </nav>";

            echo $pagination;
          ?>

          <a href="./forum.nouveau-topic.vue.php?categorie=<?= $id_categorie ?>" class="btn btn-outline-secondary btn-lg btn-block" role="button" style="margin-bottom:1rem;">Créer un Topic</a>
        </div>
        <div class="col-md-3">
          <form class="input-group" action="../vues/forum.topics.vue.php" method="get" style="margin-bottom:1rem;">
            <input class="form-control" type="search" id="recherche" name="recherche" placeholder="Rechercher un topic" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" for="recherche"><i class="fa fa-search"></i></button>
          </form>

          <!-- Activités récentes -->
          <div class="card" style="margin-bottom:1rem">
            <h6 class="card-header">Dernières publications</h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <?php

                  $dernieres_publis_sscat = get_derniers_topics_sscategorie($id_sous_categorie);

                  if($dernieres_publis_sscat->rowCount() > 0) {
                    while($dpssc = $dernieres_publis_sscat->fetch()) {
                ?>
                  <tr class="lien align-middle" onclick="location.href = './forum.topic.vue.php?titre=<?= url_custom_encode($dpssc['top_sujet']) ?>&id=<?= $dpssc['top_id'] ?>&page=1'">
                    <td class="align-middle"><b><a href="./forum.topic.vue.php?titre=<?= url_custom_encode($dpssc['top_sujet']) ?>&id=<?= $dpssc['top_id'] ?>&page=1"><?= $dpssc['top_sujet'] ?></a></b> <br/> <small class="text-muted">par <b><a href="./compte.vue.php?mem_id=<?php echo $dpssc['mem_id']; ?>"><?= get_nom_prenom_membre($dpssc['mem_id']) ?></a></b></small></td>
                  </tr>
                <?php } } else { ?>
                <tr>
                  <td class="align-middle">Aucune publication n'a été trouvée.</td>
                </tr>
                <?php } ?>
              </table>
            </div>
          </div>

          <?php
            if (isset($_SESSION['mem_id'])) {
          ?>
          <!-- Activités récentes relatives à l'utilisateur -->
          <div class="card" style="margin-bottom:1rem">
            <h6 class="card-header">Dernières réponses à vos topics</h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <?php

                  $dernieres_reponses = get_dernieres_reponses($_SESSION['mem_id']);

                  if($dernieres_reponses->rowCount() > 0) {
                    while ($dr = $dernieres_reponses->fetch()) {

                ?>
                <tr class="lien align-middle" onclick="location.href='./forum.topic.vue.php?titre=<?= url_custom_encode(get_sujet_topic($dr['top_id'])) ?>&id=<?= $dr['top_id'] ?>&page=1'">
                  <td class="align-middle"><b><a href="./forum.topic.vue.php?titre=<?= url_custom_encode(get_sujet_topic($dr['top_id'])) ?>&id=<?= $dr['top_id'] ?>&page=1"><?= get_sujet_topic($dr['top_id']) ?></a></b>
                  <br/><small class="text-muted">par <b><a href="./compte.vue.php?mem_id=<?= $dr['mem_id'] ?>"><?= get_nom_prenom_membre($dr['mem_id']) ?></a></b></small></td>
                </tr>
                <?php } } else { ?>
                <tr>
                  <td class="align-middle">Aucune réponse n'a été trouvée.</td>
                </tr>
                <?php } ?>
              </table>
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
