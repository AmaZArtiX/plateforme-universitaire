<?php
  require("../modeles-controleurs/forum.topic.php");

  require("../jbbcode/parser.php");

  $parser = new JBBCode\Parser();
  $parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());
  $parser->addBBCode("quote", '<blockquote>{param}</blockquote>');
  $parser->addBBCode("list", '<ul>{param}</ul>');
  $parser->addBBCode("*", '<li>{param}</li>');
  $parser->addBBCode("codec", "<div><pre><code class=\"language-c\">{param}</code></pre></div>");
  $parser->addBBCode("codecpp", '<div><pre><code class="language-cpp">{param}</code></pre></div>');
  $parser->addBBCode("codejava", '<div><pre><code class="language-java">{param}</code></pre></div>');
  $parser->addBBCode("codephp", '<div><pre><code class="language-php">{param}</code></pre></div>');
  $parser->addBBCode("codepython", '<div><pre><code class="language-python">{param}</code></pre></div>');
  $parser->addBBCode("codesql", '<div><pre><code class="language-sql">{param}</code></pre></div>');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Forum étudiant</title>
    <!-- <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/forum.css">
    <link rel="stylesheet" href="../css/wbbtheme.css"/>
    <link rel="stylesheet" href="../css/prism.css"/>
  </head>
  <body>
    <!-- Header -->
    <?php
      $header = "forum";
      require("header.vue.php");
    ?>
    <!-- Fin header -->

    <!-- Breadcrumb -->
    <div class="container" style="margin-top:5rem; margin-bottom: 25px;">
      <div class="row">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./forum.vue.php">Accueil</a></li>
              <li class="breadcrumb-item"><a href="./forum.categories.vue.php?categorie=<?= $categorie_topic ?>"><?= $categorie_topic ?></a></li>
              <li class="breadcrumb-item"><a href="./forum.ss-categories.vue.php?categorie=<?= $categorie_topic ?>&ss-categorie=<?= $sscategorie_topic ?>&page=1"><?= $sscategorie_topic ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?= $topic['top_sujet'] ?></a></li>
            </ol>
          </nav>
        </div>
        <div class="input-group col-md-4">
          <form class="form-inline" action="../vues/forum.topics.vue.php" method="get">
            <input class="form-control" type="search" name="recherche" placeholder="Rechercher un topic" aria-label="Search">
            <span class="input-group-append">
              <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
            </span>
          </form>
        </div>
      </div>
    </div>


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
                <?php if($pageCourante == 1) {

                        $parser->parse($topic['top_contenu']);

                  ?>
                  <tr class="align-middle">
                    <div class="card-group">
                      <div class="card border-secondary" style="max-width:25% !important; border-top:0; border-right:0; border-left:0;">
                        <div class="card-body text-center">
                          <figure class="figure">
                            <img class="img-thumbnail" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="90" height="90" style="border-color:#8CB75B;">
                            <figcaption class="figure-caption">
                              <h6 class="card-title"><a href=""><?= get_nom_prenom_membre($topic['mem_id']) ?></a></h6>
                              <span class="badge badge-info">Utilisateur</span>
                            </figcaption>
                          </figure>
                        </div>
                        <div class="card-footer">&nbsp </div>
                      </div>
                      <div class="card border-secondary" style="border-top:0; border-right:0; border-left:0;">
                        <div class="card-body">
                          <p class="text-muted font-weight-light"><?= $parser->getAsHtml() ?></p>
                        </div>
                        <div class="card-footer text-muted font-weight-light text-right">
                          <?= date_format(date_create($topic['top_date_creation']), 'd/m/Y H:i') ?>
                        </div>
                      </div>
                    </div>
                  </tr>
                <?php }
                 while($reponse = $reponses->fetch()) {

                   $parser->parse($reponse['mess_contenu']);
                   ?>
                  <tr class="align-middle">

                    <div class="card-group">

                      <div class="card border-secondary" style="max-width:25% !important; border-top:0; border-right:0; border-left:0;">
                        <div class="card-body text-center">
                          <figure class="figure">
                            <img class="img-thumbnail" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="90" height="90" style="border-color:#8CB75B;">
                            <figcaption class="figure-caption">
                              <h6 class="card-title"><a href=""><?= get_nom_prenom_membre($reponse['mem_id']) ?></a></h6>
                              <span class="badge badge-info">Utilisateur</span>
                            </figcaption>
                          </figure>
                        </div>
                        <div class="card-footer">&nbsp </div>
                      </div>

                      <div class="card border-secondary" style="border-top:0; border-right:0; border-left:0;">
                        <div class="card-body">
                          <p class="text-muted font-weight-light"><?= $parser->getAsHtml() ?></p>
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
          <?php

            if (isset($erreur)) {

              afficherAlerte("", $erreur, "danger");
            }
          ?>
          <form method="post" action="">
            <textarea id="editor" name="reponse" rows="8"></textarea>
            <button type="submit" name="btn_envoyer" class="btn btn-secondary btn-lg btn-block" style="margin-top:25px; margin-bottom:25px; background-color:#8CB75B; border-color:#8CB75B;">Poster une réponse</button>
          </form>
        </div>
        <div class="col-md-3">

          <!-- Activités récentes -->
          <div class="card" style="margin-bottom:25px">
            <h6 class="card-header">Dernières publications</h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <?php

                  $dernieres_publis_sscat = get_derniers_topics_sscategorie($id_sscategorie_topic);

                  while($dpssc = $dernieres_publis_sscat->fetch()) {
                ?>
                  <tr class="lien align-middle" onclick="location.href = './forum.topic.vue.php?titre=<?= url_custom_encode($dpssc['top_sujet']) ?>&id=<?= $dpssc['top_id'] ?>&page=1'">
                    <td class="align-middle"><b><a href="./forum.topic.vue.php?titre=<?= url_custom_encode($dpssc['top_sujet']) ?>&id=<?= $dpssc['top_id'] ?>&page=1"><?= $dpssc['top_sujet'] ?></a></b> <br/> <small class="text-muted">par <b><a href="./compte.vue.php?mem_id=<?php echo $dpssc['mem_id']; ?>"><?= get_nom_prenom_membre($dpssc['mem_id']) ?></a></b></small></td>
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
            <h6 class="card-header">Dernières réponses à vos topics</h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <?php

                  $dernieres_reponses = get_dernieres_reponses($_SESSION['mem_id']);

                  while ($dr = $dernieres_reponses->fetch()) {

                ?>
                  <tr class="lien align-middle" onclick="location.href='./forum.topic.vue.php?titre=<?= url_custom_encode(get_sujet_topic($dr['top_id'])) ?>&id=<?= $dr['top_id'] ?>&page=1'">
                    <td class="align-middle"><b><a href="./forum.topic.vue.php?titre=<?= url_custom_encode(get_sujet_topic($dr['top_id'])) ?>&id=<?= $dr['top_id'] ?>&page=1"><?= get_sujet_topic($dr['top_id']) ?></a></b>
                    <br/><small class="text-muted">par <b><a href="./compte.vue.php?mem_id=<?= $dr['mem_id'] ?>"><?= get_nom_prenom_membre($dr['mem_id']) ?></a></b></small></td>
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="../js/jquery.wysibb.min.js"></script>
    <script src="../js/fr.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/wysibb-options.js"></script>
    <script src="../js/prism.js"></script>
  </body>
</html>
