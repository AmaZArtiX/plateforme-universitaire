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
              <li class="breadcrumb-item active" aria-current="page">Accueil</li>
            </ol>
          </nav>
          <?php
            if($forums->rowCount() > 0) {
              while ($f = $forums->fetch()) {

            $categories->execute(array($f['for_id']));

          ?>
            <div class="card" style="margin-bottom:1rem;">
              <h6 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">
                <b>▲ <a href="#" style="color:white;"><?= $f['for_nom'] ?></a></b>
              </h6>
              <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                  <?php
                    if($categories->rowCount() > 0) {
                      while ($c = $categories->fetch()) {
                  ?>
                  <tr class="lien align-middle" onclick="location.href = './forum.categories.vue.php?categorie=<?= $c['cat_nom'] ?>'">
                    <td class="align-middle">►</td>
                    <td class="align-middle"><b><?= $c['cat_nom'] ?></b> <br/> <small class="text-muted"><?= $c['cat_description'] ?></small></td>
                    <td class="text-center text-muted align-middle"><?= get_nb_topics_categorie($c['cat_id']) ?><br/> Topics</td>
                    <td class="text-center text-muted align-middle"><?= get_nb_posts_categorie($c['cat_id']) ?><br/> Posts</td>
                    <td class="align-middle" style="text-align:right;"><?= get_dernier_topic_categorie($c['cat_id']) ?></td>
                  </tr>
                  <?php } } else { ?>
                  <tr>
                    <td class="align-middle text-muted">Aucune catégorie n'a été trouvée.</td>
                  </tr>
                  <?php } ?>
                </table>
              </div>
            </div>
          <?php } } else { echo "<div class=\"alert alert-light\" role=\"alert\">Aucun forum n'a été trouvée.</div>"; } ?>
        </div>
        <div class="col-md-3">
          <form class="input-group" action="../vues/forum.topics.vue.php" method="get" style="margin-bottom:1rem;">
            <input class="form-control" type="search" id="recherche" name="recherche" onkeyup="activerRecherche(this.value);" placeholder="Rechercher un topic" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" for="recherche" id="btn_recherche" disabled><i class="fa fa-search"></i></button>
          </form>

          <!-- Activités récentes -->
          <div class="card" style="margin-bottom:1rem;">
            <h6 class="card-header">Dernières publications</h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <?php

                  $dernieres_publis = get_derniers_topics();

                  if($dernieres_publis->rowCount() > 0) {
                    while ($dp = $dernieres_publis->fetch()) {

                ?>
                  <tr class="lien align-middle" onclick="location.href='./forum.topic.vue.php?titre=<?= url_custom_encode($dp['top_sujet']) ?>&id=<?= $dp['top_id'] ?>&page=1'">
                    <td class="align-middle"><b><a href="./forum.topic.vue.php?titre=<?= url_custom_encode($dp['top_sujet']) ?>&id=<?= $dp['top_id'] ?>&page=1"><?= $dp['top_sujet'] ?></a></b> <br/> <small class="text-muted">par <b><a href="./compte.vue.php?mem_id=<?= $dp['mem_id'] ?>"><?= get_nom_prenom_membre($dp['mem_id']) ?></a></b></small></td>
                  </tr>
                <?php } } else { ?>
                <tr>
                  <td class="align-middle text-muted">Aucune publication n'a été trouvée.</td>
                </tr>
                <?php } ?>
              </table>
            </div>
          </div>

          <?php
            if (isset($_SESSION['mem_id'])) {
          ?>
          <!-- Activités récentes relatives à l'utilisateur -->
          <div class="card" style="margin-bottom:1rem;">
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
                  <td class="align-middle text-muted">Aucune réponse n'a été trouvée.</td>
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
    <script type="text/javascript">
      function activerRecherche(texte) {
          var tailleRecherche = texte.length;
          if (tailleRecherche > 3) {
            document.getElementById('btn_recherche').disabled = false;
          } else {

            document.getElementById('btn_recherche').disabled = true;
          }
      }
    </script>
  </body>
</html>
