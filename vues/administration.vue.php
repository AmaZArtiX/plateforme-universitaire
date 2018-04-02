<?php
  require("../modeles-controleurs/administration.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administration</title>
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
    <!-- Fin Header -->

    <!-- Header Management-->
    <header>
      <div class="container-fluid" style="margin-top:3.5rem; margin-bottom:1rem; background-color:#8CB75B;">
        <div class="row">
          <div class="col-md-10">
            <h1 style="color:white;"> Tableau de bord <small style="color:#C6DBAE;">Gérer le site</small></h1>
          </div>
          <div class="col-md-2">
            <!--<div class="dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:white; color:#8CB75B;">
                Créer du contenu
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Ajouter page</a>
                <a class="dropdown-item" href="#">Ajouter topic</a>
                <a class="dropdown-item" href="#">Ajouter utilisateur</a>
              </div>
            </div>-->
          </div>
        </div>
      </div>
    </header>
    <!-- Fin Header -->

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="container" style="margin-bottom:1rem;">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Administration</li>
      </ol>
    </nav>
    <!-- Fin Breadcrumb -->

    <!-- Section -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group" style="margin-bottom:1rem">
              <a href="administration.vue.php" class="list-group-item active" style="background-color:#8CB75B; border-color:#8CB75B;">
                Tableau de bord
              </a>
              <a href="administration.forum.vue.php" class="list-group-item d-flex justify-content-between align-items-center" style="color:#8CB75B;"> Forum <span class="badge badge-secondary"><?= $nb_for ?></span></a>
              <a href="administration.utilisateur.vue.php" class="list-group-item d-flex justify-content-between align-items-center" style="color:#8CB75B;"> Utilisateurs <span class="badge badge-secondary"><?= $nb_mem ?></span></a>
              <a href="#" class="list-group-item d-flex justify-content-between align-items-center" style="color:#8CB75B;"> Autres <span class="badge badge-secondary">#</span></a>
            </div>
          </div>

          <div class="col-md-9">
            <div class="card" style="margin-bottom:1rem">
              <h5 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">Vue d'ensemble</h5>
              <div class="card-body">

                <div class="row" style="margin-bottom:1rem">
                  <div class="col-md-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <h4 class="card-title"><span class="badge badge-secondary"><?= $nb_mem ?></span></h4>
                        <p class="card-text"><small>Utilisateur(s)</small></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <h4 class="card-title"><span class="badge badge-secondary"><?= $nb_eval ?></span></h4>
                        <p class="card-text"><small>Evaluation(s)</small></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <h4 class="card-title"><span class="badge badge-secondary"><?= $nb_quest ?></span></h4>
                        <p class="card-text"><small>Question(s)</small></p>
                      </div>
                    </div>
                  </div>
                    <div class="col-md-3">
                      <div class="card text-center">
                        <div class="card-body">
                          <h4 class="card-title"><span class="badge badge-secondary"><?= $nb_rep ?></span></h4>
                          <p class="card-text"><small>Réponse(s)</small></p>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="row" style="margin-bottom:1rem">
                  <div class="col-md-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <h4 class="card-title"><span class="badge badge-secondary"><?= $nb_dom ?></span></h4>
                        <p class="card-text"><small>Domaine(s)</small></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <h4 class="card-title"><span class="badge badge-secondary"><?= $nb_form ?></span></h4>
                        <p class="card-text"><small>Formation(s)</small></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <h4 class="card-title"><span class="badge badge-secondary"><?= $nb_mat ?></span></h4>
                        <p class="card-text"><small>Matière(s)</small></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <h4 class="card-title"><span class="badge badge-secondary"><?= $nb_gr ?></span></h4>
                        <p class="card-text"><small>Groupe(s)</small></p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <h4 class="card-title"><span class="badge badge-secondary"><?= $nb_for ?></span></h4>
                        <p class="card-text"><small>Forum(s)</small></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <h4 class="card-title"><span class="badge badge-secondary"><?= $nb_cat ?></span></h4>
                        <p class="card-text"><small>Catégorie(s)</small></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card text-center">
                      <div class="card-body">
                        <h4 class="card-title"><span class="badge badge-secondary"><?= $nb_sscat ?></span></h4>
                        <p class="card-text"><small>Sous-catégorie(s)</small></p>
                      </div>
                    </div>
                  </div>
                    <div class="col-md-3">
                      <div class="card text-center">
                        <div class="card-body">
                          <h4 class="card-title"><span class="badge badge-secondary"><?= $nb_top ?></span></h4>
                          <p class="card-text"><small>Topic(s)</small></p>
                        </div>
                      </div>
                    </div>
                </div>

              </div>
            </div>

            <!-- Dernières Publications -->
            <div class="card" style="margin-bottom:1rem">
              <h5 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">Derniers topics</h5>
              <table class="table table-striped table-hover mb-0">
                <tr>
                  <th>Id</th>
                  <th>Sujet</th>
                  <th>Créateur</th>
                  <th>Date de création</th>
                </tr>
                <?php

                  $dernieres_publis = get_derniers_topics();

                  if($dernieres_publis->rowCount() > 0) {
                    while ($dp = $dernieres_publis->fetch()) {

                ?>
                <tr>
                  <td><?= $dp['top_id'] ?></td>
                  <td><?= $dp['top_sujet'] ?></td>
                  <td><b><a href="./compte.vue.php?mem_id=<?= $dp['mem_id'] ?>"><?= get_nom_prenom_membre($dp['mem_id']) ?></a></b></td>
                  <td><?= date_format(date_create($dp['top_date_creation']), 'd/m/Y H:i') ?></td>
                </tr>
                <?php } } else { ?>
                <tr>
                  <td class="align-middle text-muted">Aucune publication n'a été trouvée.</td>
                </tr>
                <?php } ?>
              </table>
              <h5 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">Derniers utilisateurs</h5>
              <table class="table table-striped table-hover mb-0">
                <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Mail</th>
                  <th>Date d'inscription</th>
                </tr>
                <?php

                  $derniers_utils = get_derniers_utilisateurs();

                  if($derniers_utils->rowCount() > 0) {
                    while ($du = $derniers_utils->fetch()) {

                ?>
                <tr <?php if($du['mem_administrateur'] == 1) { echo 'class="alert-warning" style="color:black;"'; } ?>>
                  <td><?= $du['mem_id'] ?></td>
                  <td><?= $du['mem_nom'] ?></td>
                  <td><?= $du['mem_prenom'] ?></td>
                  <td><?= $du['mem_mail'] ?></td>
                  <td><?= date_format(date_create($du['mem_date_inscription']), 'd/m/Y H:i') ?></td>
                </tr>
                <?php } } else { ?>
                <tr>
                  <td class="align-middle text-muted">Aucun utilisateur n'a été trouvée.</td>
                </tr>
                <?php } ?>
              </table>
              <div class="card-footer text-center text-muted">
                Dernière mise à jour : <?php date_default_timezone_set("Europe/Paris"); echo date('d-m-Y H:i:s'); ?>
              </div>
            </div>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
