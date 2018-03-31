<?php
  require("../modeles-controleurs/administration.forum.php");

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
    <title>Administration | Forum</title>
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
      <div class="container-fluid" style="margin-top:3.5rem; margin-bottom:1rem; background-color:#8CB75B;">
        <div class="row">
          <div class="col-md-10">
            <h1 style="color:white;"> Tableau de bord <small style="color:#C6DBAE;">Gérer le forum</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:white; color:#8CB75B;">
                Ajout de contenu
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Catégorie</a>
                <a class="dropdown-item" href="#">Sous-catégorie</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Fin Header -->

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="container" style="margin-bottom:1rem;">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="administration.vue.php">Administration</a></li>
        <li class="breadcrumb-item active" aria-current="page">Forum</li>
      </ol>
    </nav>
    <!-- Fin Breadcrumb -->

    <!-- Section -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group" style="margin-bottom:1rem">
              <a href="administration.vue.php" class="list-group-item" style="color:#8CB75B;">
                Tableau de bord
              </a>
              <a href="administration.forum.vue.php" class="list-group-item active d-flex justify-content-between align-items-center" style="background-color:#8CB75B; border-color:#8CB75B;"> Forum <span class="badge badge-secondary"><?= $nb_for ?></span></a>
              <a href="administration.utilisateur.vue.php" class="list-group-item d-flex justify-content-between align-items-center" style="color:#8CB75B;"> Utilisateurs <span class="badge badge-secondary"><?= $nb_mem ?></span></a>
              <a href="#" class="list-group-item d-flex justify-content-between align-items-center" style="color:#8CB75B;"> Autres <span class="badge badge-secondary">#</span></a>
            </div>
          </div>

          <div class="col-md-9" id="forum">

            <?php
              if($forums->rowCount() > 0) {
                while ($f = $forums->fetch()) {
                  $categories->execute(array($f['for_id']));
            ?>
            <!-- Forum -->
            <div class="card" style="margin-bottom:1rem;">
              <h5 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;"><?= $f['for_nom'] ?></h5>
              <div id="for_<?= $f['for_id'] ?>">

                <?php
                  if($categories->rowCount() > 0) {
                    while ($c = $categories->fetch()) {
                      $sscategories->execute(array($c['cat_id']));
                ?>
                <div class="card"><!-- Niveau 1 - Catégories -->
                  <div class="card-header" id="heading_cat_<?= $c['cat_id'] ?>">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse_cat_<?= $c['cat_id'] ?>" aria-expanded="false" aria-controls="collapse_cat_<?= $c['cat_id'] ?>" style="color:#8CB75B;">
                        <?= $c['cat_nom'] ?>
                      </button>
                      <button type="button" class="close del_data" aria-label="Close" data-type="e catégorie" data-id="<?= $c['cat_id'] ?>" data="<?= $c['cat_nom'] ?>">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </h5>
                  </div>

                  <div id="collapse_cat_<?= $c['cat_id'] ?>" class="collapse align-middle" aria-labelledby="heading_cat_<?= $c['cat_id'] ?>" data-parent="#for_<?= $f['for_id'] ?>">
                    <div id="cat_<?= $c['cat_id'] ?>">

                      <?php
                        if($sscategories->rowCount() > 0) {
                          while ($ssc = $sscategories->fetch()) {
                            $topics->execute(array($c['cat_id'], $ssc['sscat_id']));
                      ?>
                      <div class="card"><!-- Niveau 2 - Sous-catégories -->
                        <div class="card-header" id="heading_sscat_<?= $ssc['sscat_id'] ?>">
                          <h5 class="mb-0" style="margin-left:2.5rem;">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse_sscat_<?= $ssc['sscat_id'] ?>" aria-expanded="false" aria-controls="collapse_sscat_<?= $ssc['sscat_id'] ?>" style="color:#8CB75B;">
                              <?= $ssc['sscat_nom'] ?>
                            </button>
                            <button type="button" class="close del_data" aria-label="Close" data-type="e sous-catégorie" data-id="<?= $ssc['sscat_id'] ?>" data="<?= $ssc['sscat_nom'] ?>">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </h5>
                        </div>

                        <div id="collapse_sscat_<?= $ssc['sscat_id'] ?>" class="collapse" aria-labelledby="heading_sscat_<?= $ssc['sscat_id'] ?>" data-parent="#cat_<?= $c['cat_id'] ?>">
                          <div id="sscat_<?= $ssc['sscat_id'] ?>">

                            <?php
                              if($topics->rowCount() > 0) {
                                while ($t = $topics->fetch()) {
                                  $parser->parse($t['top_contenu']);
                            ?>
                            <div class="card"><!-- Niveau 3 - Topics -->
                              <div class="card-header" id="heading_top_<?= $t['top_id'] ?>">
                                <h5 class="mb-0" style="margin-left:5rem;">
                                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse_top_<?= $t['top_id'] ?>" aria-expanded="false" aria-controls="collapse_top_<?= $t['top_id'] ?>" style="color:#8CB75B;">
                                    <?= $t['top_sujet'] ?>
                                  </button>
                                  <button type="button" class="close del_data" aria-label="Close" data-type="e topic" data-id="<?= $t['top_id'] ?>" data="<?= $t['top_sujet'] ?>">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </h5>
                              </div>

                              <div id="collapse_top_<?= $t['top_id'] ?>" class="collapse" aria-labelledby="heading_top_<?= $t['top_id'] ?>" data-parent="#sscat_<?= $ssc['sscat_id'] ?>">
                                <div class="card-group">

                                  <div class="card border-secondary" style="max-width:25% !important; border-top:0; border-right:0; border-left:0;">
                                    <div class="card-body text-center">
                                      <figure class="figure">
                                        <img class="img-thumbnail" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="90" height="90" style="border-color:#8CB75B;">
                                        <figcaption class="figure-caption">
                                          <h6 class="card-title"><?= $t['mem_prenom']." ".$t['mem_nom'] ?></h6>
                                          <?php if($t['mem_administrateur'] == 1) {
                                          ?>
                                          <span class="badge badge-warning">Administrateur</span>
                                          <?php } ?>
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
                                      <?= date_format(date_create($t['top_date_creation']), 'd/m/Y H:i') ?>
                                    </div>
                                  </div>

                                </div>
                              </div>

                            </div>
                          <?php } } else { echo "<div class=\"alert alert-light\" style=\"margin-bottom:0 !important;\" role=\"alert\">Aucun topic n'a été trouvée.</div>"; } ?>

                          </div>
                        </div>

                      </div>
                    <?php } } else { echo "<div class=\"alert alert-light align-middle\" style=\"margin-bottom:0 !important;\" role=\"alert\">Aucune sous-catégorie n'a été trouvée.</div>"; } ?>

                    </div>
                  </div>

                </div>
              <?php } } else { echo "<div class=\"alert alert-light\" style=\"margin-bottom:0 !important;\" role=\"alert\">Aucune catégorie n'a été trouvée.</div>"; } ?>

              </div>
              <div class="card-footer text-center text-muted">
                Dernière mise à jour : <?php date_default_timezone_set("Europe/Paris"); echo date('d-m-Y H:i:s'); ?>
              </div>
            </div>
            <?php } } else { echo "<div class=\"alert alert-light\" style=\"margin-bottom:0 !important;\" role=\"alert\">Aucun forum n'a été trouvée.</div>"; } ?>

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

    <!-- Modal -->
    <div class="modal fade" id="data_del" tabindex="-1" role="dialog" aria-labelledby="data_del_titre" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="data_del_titre">Suppression d<label for="data_name" class="col-form-label" id="data_type"></label></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Etes-vous sûr de vouloir supprimer: <label for="data_name" class="col-form-label" id="data"></label></label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-primary conf_del" data-type="data_type" data-id="data_id">Confirmer</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin modal -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/administration.js"></script>
  </body>
</html>
