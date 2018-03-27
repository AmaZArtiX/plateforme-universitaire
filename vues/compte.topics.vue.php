<?php
  require("../modeles-controleurs/compte.topics.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Compte - Topics</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/compte.css">
  </head>
  <body>
    <!-- Header -->
    <?php
      $header = "utilisateur";
      require("header.vue.php");
    ?>
    <!-- Fin header -->

    <!-- Principal -->
    <div class="container" style="margin-top:5rem; margin-bottom:25px;">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="card text-center">
            <form action="" method="post">
              <div class="card-header">
                <ul class="nav nav-pills card-header-pills">
                  <li class="nav-item">
                    <a class="nav-link text-muted" href="./compte.vue.php<?php if(isset($_GET['mem_id']) && !empty($_GET['mem_id'])) { echo '?mem_id=' . $_GET['mem_id']; } ?>">Résumé</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="./compte.topics.vue.php<?php if(isset($_GET['mem_id']) && !empty($_GET['mem_id'])) { echo '?mem_id=' . $_GET['mem_id']; } ?>" style="background-color:#8CB75B; border-color:#8CB75B;">Topics Postés</a>
                  </li>
                  <?php if(!isset($_GET['mem_id'])) { ?>
                  <li class="nav-item">
                    <a class="nav-link text-muted" href="./compte.res.vue.php">Résultats des Tests</a>
                  </li>
                  <?php } ?>
                </ul>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                  <thead>
                    <tr style="background-color:#8CB75B; color:white;">
                      <th class="align-middle" scope="col">Sujet</th>
                      <th class="align-middle" scope="col">Date de création</th>
                      <th class="align-middle" scope="col">Dernier message</th>
                      <?php if(!isset($_GET['mem_id'])) { ?>
                        <th class="align-middle" scope="col">Marqué comme résolu</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if(isset($_GET['mem_id']) && !empty($_GET['mem_id'])) {
                        $dernieres_publis_membre = get_derniers_topics_membre($_GET['mem_id']);
                      } else {
                        $dernieres_publis_membre = get_derniers_topics_membre($_SESSION['mem_id']);
                      }

                      if($dernieres_publis_membre->rowCount() > 0) {
                        while($dpm = $dernieres_publis_membre->fetch()) {
                    ?>
                    <tr class="lien align-middle">

                      <td class="align-middle text-left">
                        <b><a href="./forum.topic.vue.php?titre=<?= url_custom_encode($dpm['top_sujet']) ?>&id=<?= $dpm['top_id'] ?>&page=1"><?= $dpm['top_sujet'] ?></a></b>
                      </td>
                      <td class="align-middle">
                        <?= date_format(date_create($dpm['top_date_creation']), 'd/m/Y H:i') ?>
                      </td>
                      <td class="align-middle">
                        <?= get_derniere_rep_topic($dpm['top_id']); ?>
                      </td>
                      <?php
                        if(!isset($_GET['mem_id'])){

                          if ($dpm['top_resolu'] != 1) {
                      ?>
                            <td class="align-middle"><input type="checkbox" name="resolu[]" value="<?= $dpm['top_id'] ?>"/></td>
                      <?php } else { ?>
                              <td class="align-middle">Topic déjà résolu.</td>
                      <?php
                          }
                        }
                       ?>
                    </tr>
                    <?php } } else { ?>
                    <tr>
                      <td class="align-middle text-muted" colspan="4">Aucune publication n'a été trouvée.</td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <input class="btn btn-light btn-lg btn-block" style="background-color:#8CB75B; border-color:#8CB75B; color:white;" type="submit" name="envoyer" value="Sauvegarder"/>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-2"></div>
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
