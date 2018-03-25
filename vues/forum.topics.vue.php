<?php

  require("../modeles-controleurs/forum.topics.php");

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
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/forum.css">
    <link rel="stylesheet" href="../css/prism.css"/>
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
              <li class="breadcrumb-item"><a href="../vues/forum.vue.php">Accueil</a></li>
              <li class="breadcrumb-item">Recherche</li>
              <li class="breadcrumb-item active" aria-current="page"><?= $recherche ?></li>
            </ol>
          </nav>

          <?php
            if($topics->rowCount() > 0) {
              while ($t = $topics->fetch()) {

                $parser->parse($t['top_contenu']);
          ?>
          <div class="card" style="margin-bottom:1rem;">
            <h6 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">
              <b>¤ <a href="./forum.topic.vue.php?titre=<?= url_custom_encode($t['top_sujet'])?>&id=<?= $t['top_id'] ?>&page=1" style="color:white;"><?= $t['top_sujet']?> - <?= get_nom_prenom_membre($t['mem_id']) ?></a></b>
            </h6>
            <div class="card-body">
              <?=  $parser->getAsHtml(); ?>
            </div>
            <div class="card-footer text-muted text-center">
              <?= date_format(date_create($t['top_date_creation']), 'd/m/Y H:i') ?>
            </div>
          </div>
          <?php } } else {
            echo "<div class=\"alert alert-light\" role=\"alert\">Aucun résultat à afficher pour votre recherche.</div>";
        } ?>
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
                  $dernieres_publis = get_derniers_topics();
                  while($dp = $dernieres_publis->fetch()){
                ?>
                  <tr class="lien align-middle" onclick="location.href='./forum.topic.vue.php?titre=<?= url_custom_encode($dp['top_sujet']) ?>&id=<?= $dp['top_id'] ?>&page=1'">
                    <td class="align-middle"><b><a href="./forum.topic.vue.php?titre=<?= url_custom_encode($dp['top_sujet']) ?>&id=<?= $dp['top_id'] ?>&page=1"><?= $dp['top_sujet'] ?></a></b> <br/> <small class="text-muted">par <b><a href="./compte.vue.php?mem_id=<?= $dp['mem_id'] ?>"><?= get_nom_prenom_membre($dp['mem_id']) ?></a></b></small></td>
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
    <script src="../js/prism.js"></script>
  </body>
</html>
