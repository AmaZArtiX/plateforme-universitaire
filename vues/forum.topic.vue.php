<?php
  require("../modeles-controleurs/forum.topic.php");
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
        <li class="breadcrumb-item"><a href="./forum.vue.php">Accueil</a></li>
        <li class="breadcrumb-item"><a href="./forum.categories.vue.php?categorie=<?= $categorie_topic ?>"><?= $categorie_topic ?></a></li>
        <li class="breadcrumb-item"><a href="./forum.ss-categories.vue.php?categorie=<?= $categorie_topic ?>&ss-categorie=<?= $sscategorie_topic ?>&page=1"><?= $sscategorie_topic ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $topic['top_sujet'] ?></a></li>
      </ol>
    </nav>
    <!-- Fin Breadcrumb -->

    <!-- Principal -->
    <div class="container">
      <div class="row">
        <div class="col-md-9">

          <div class="card" style="margin-bottom:25px;">
            <h6 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">
              <b>• <?= $topic['top_sujet'] ?> - <?= date_format(date_create($topic['top_date_creation']), 'd/m/Y H:i') ?></b>
            </h6>
            <div class="table-responsive">
              <table class="table table-striped mb-0">
                <?php if($pageCourante == 1) { ?>
                  <tr class="align-middle">
                    <div class="card-group">
                      <div class="card border-secondary" style="max-width:25% !important; border-top:0; border-right:0; border-left:0;">
                        <div class="card-body">
                          <h6 class="card-title"><a href=""><?= get_nom_prenom_membre($topic['mem_id']) ?></a></h6>
                          <p class="text-muted font-weight-light">@Informations<br/><br/>@Licence Informatique</p>
                        </div>
                        <div class="card-footer">&nbsp </div>
                      </div>
                      <div class="card border-secondary" style="border-top:0; border-right:0; border-left:0;">
                        <div class="card-body">
                          <p class="text-muted font-weight-light"><?= $topic['top_contenu'] ?></p>
                        </div>
                        <div class="card-footer text-muted font-weight-light text-right">
                          <?= date_format(date_create($topic['top_date_creation']), 'd/m/Y H:i') ?>
                        </div>
                      </div>
                    </div>
                  </tr>
                <?php } ?>
                <?php while($reponse = $reponses->fetch()) { ?>
                  <tr class="align-middle">

                    <div class="card-group">

                      <div class="card border-secondary" style="max-width:25% !important; border-top:0; border-right:0; border-left:0;">
                        <div class="card-body">
                          <h6 class="card-title"><a href=""><?= get_nom_prenom_membre($reponse['mem_id']) ?></a></h6>
                          <p class="text-muted font-weight-light">@Informations<br/><br/>@Licence Informatique</p>
                        </div>
                        <div class="card-footer">&nbsp </div>
                      </div>

                      <div class="card border-secondary" style="border-top:0; border-right:0; border-left:0;">
                        <div class="card-body">
                          <p class="text-muted font-weight-light"><?= $reponse['mess_contenu'] ?></p>
                        </div>
                        <div class="card-footer text-muted font-weight-light text-right">
                          <?= date_format(date_create($reponse['mess_date_post']), 'd/m/Y H:i') ?>
                        </div>
                      </div>
                    </div>
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
                              <a class=\"page-link\" href=\"forum.topic.vue.php?titre=".$get_titre."&id=".$get_id."&page=".($pageCourante-1)."\" aria-label=\"Previous\">
                                <span aria-hidden=\"true\">&laquo;</span>
                                <span class=\"sr-only\">Previous</span>
                              </a>
                            </li>";
            }

            for ($i=1; $i <= $pagesTotales; $i++) {

              if ($i == $pageCourante) {
                $pagination .= "<li class=\"page-item active\">
                                  <a class=\"page-link\" href=\"forum.topic.vue.php?titre=".$get_titre."&id=".$get_id."&page=".$i."\">".$i."<span class=\"sr-only\">(current)</span></a>
                                </li>";
              }
              else {
                $pagination .= "<li class=\"page-item\">
                                  <a class=\"page-link\" href=\"forum.topic.vue.php?titre=".$get_titre."&id=".$get_id."&page=".$i."\">".$i."</a>
                                </li>";
              }
            }

            if($pageCourante < $pagesTotales){

              $pagination .= "<li class=\"page-item\">
                                <a class=\"page-link\" href=\"forum.topic.vue.php?titre=".$get_titre."&id=".$get_id."&page=".($pageCourante+1)."\" aria-label=\"Next\">
                                  <span aria-hidden=\"true\">&raquo;</span>
                                  <span class=\"sr-only\">Next</span>
                                </a>
                              </li>";
          }

            $pagination .= "</ul>
                          </nav>";

            echo $pagination;
          ?>

          <button type="button" class="btn btn-secondary btn-lg btn-block" style="margin-bottom:25px; background-color:#8CB75B; border-color:#8CB75B;">Poster une réponse</button>
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
