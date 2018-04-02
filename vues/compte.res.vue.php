<?php
  require("../modeles-controleurs/compte.res.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Compte - Résultats</title>
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
            <div class="card-header">
              <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                  <a class="nav-link text-muted" href="./compte.vue.php">Résumé</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-muted" href="./compte.topics.vue.php">Topics Postés</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="./compte.res.vue.php" style="background-color:#8CB75B; border-color:#8CB75B;">Résultats des Tests</a>
                </li>
              </ul>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <thead>
                  <tr style="background-color:#8CB75B; color:white;">
                    <th class="align-middle" scope="col">Matière</th>
                    <th class="align-middle" scope="col">Niveau</th>
                    <th class="align-middle" scope="col">Date</th>
                    <th class="align-middle" scope="col">Visualiser</th>
                  </tr>
                </thead>
                <tbody>
            <?php if($requete->rowCount() > 0) {

                    while ($data = $requete->fetch()) {
             ?>
                      <tr class="lien align-middle">
                        <td class="align-middle">
                          <?= getNomMatiere($data['mat_id']) ?>
                        </td>
                        <td class="align-middle">
                          <?= getNomFormation($data['form_id']) ?>
                        </td>
                        <td class="align-middle">
                          <?= date_format(date_create($data['eval_date']), 'd/m/Y') ?>
                        </td>
                        <td class="align-middle">
                          <a href="../resultats/resultats-<?= $data['mem_id'] ?><?= $data['mat_id'] ?><?= $data['form_id'] ?>.pdf" target="_blank"><li class="fa fa-file-pdf-o"></li></a>
                        </td>
                      </tr>
              <?php
                    }
                  } else { ?>
                      <tr>
                        <td class="align-middle text-muted" colspan="4">Aucun test de positionnement a été réalisé</td>
                      </tr>
            <?php } ?>
                </tbody>
              </table>
            </div>
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
