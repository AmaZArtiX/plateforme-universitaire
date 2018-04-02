<?php
  require("../modeles-controleurs/administration.utilisateurs.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administration | Utilisateurs</title>
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
            <h1 style="color:white;"> Tableau de bord <small style="color:#C6DBAE;">Gérer les utilisateurs</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:white; color:#8CB75B;">
                Modifier les droits
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item mod_data" href="#" data-type="'utilisateur">Administrateur</a>
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
        <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
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
              <a href="administration.forum.vue.php" class="list-group-item d-flex justify-content-between align-items-center" style="color:#8CB75B;"> Forum <span class="badge badge-secondary"><?= $nb_for ?></span></a>
              <a href="administration.utilisateur.vue.php" class="list-group-item active d-flex justify-content-between align-items-center" style="background-color:#8CB75B; border-color:#8CB75B;"> Utilisateurs <span class="badge badge-secondary"><?= $nb_mem ?></span></a>
              <a href="#" class="list-group-item d-flex justify-content-between align-items-center" style="color:#8CB75B;"> Autres <span class="badge badge-secondary">#</span></a>
            </div>
          </div>

          <div class="col-md-9">

            <!-- Utilisateurs -->
            <div class="card">
              <h5 class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">Utilisateurs</h5>

                <div id="utilisateurs">

                  <?php
                    $membres = $bdd->query("SELECT mem_id, mem_nom, mem_prenom, mem_mail, mem_administrateur, mem_date_inscription FROM t_membre_mem ORDER BY t_membre_mem.mem_date_inscription DESC");
                    $nb_mem = $membres->rowCount();
                    if($nb_mem > 0) {
                      while ($m = $membres->fetch()) {
                  ?>
                  <div class="card">
                    <div class="card-header" id="heading_<?= $m['mem_id'] ?>">
                      <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_<?= $m['mem_id'] ?>" aria-expanded="true" aria-controls="collapse_<?= $m['mem_id'] ?>" style="color:#8CB75B;">
                          <?= $m['mem_id'] ?> - <?= $m['mem_prenom'] ?> - <?= $m['mem_nom'] ?>
                        </button>
                        <button type="button" class="close del_data" aria-label="Close" data-type="'utilisateur" data-id="<?= $m['mem_id'] ?>" data="<?= $m['mem_prenom'] ?> <?= $m['mem_nom'] ?>" data-container="utilisateurs">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </h5>
                    </div>
                    <div id="collapse_<?= $m['mem_id'] ?>" class="collapse" aria-labelledby="heading_<?= $m['mem_id'] ?>" data-parent="#utilisateurs">
                      <div class="card-group">
                        <div class="card border-secondary" style="max-width:25% !important; border-top:0; border-right:0; border-left:0;">
                          <div class="card-body text-center">
                            <figure class="figure">
                              <img class="img-thumbnail" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="90" height="90" style="border-color:#8CB75B;">
                              <figcaption class="figure-caption"><br/>
                                <?php if($m['mem_administrateur'] == 1) { ?>
                                <span class="badge badge-warning">Administrateur</span>
                                <?php } ?>
                                <span class="badge badge-info">Utilisateur</span>
                              </figcaption>
                            </figure>
                          </div>
                        </div>
                        <div class="card border-secondary" style="border-top:0; border-right:0; border-left:0;">
                          <div class="card-body table-responsive">
                            <table class="table table-striped mb-0 font-weight-light">
                              <tr class="text-left">
                                <td class="align-middle">Prénom</td>
                                <td class="align-middle">
                                  <?= $m['mem_prenom'] ?>
                                </td>
                              </tr>
                              <tr class="text-left">
                                <td class="align-middle">Nom</td>
                                <td class="align-middle">
                                  <?= $m['mem_nom'] ?>
                                </td>
                              </tr>
                              <tr class="text-left">
                                <td class="align-middle">E-mail</td>
                                <td class="align-middle">
                                  <?= $m['mem_mail'] ?>
                                </td>
                              </tr>
                              <tr class="text-left">
                                <td class="align-middle">Date d'inscription</td>
                                <td class="align-middle">
                                  <?= date_format(date_create($m['mem_date_inscription']), 'd/m/Y H:i') ?>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } } else { echo "<div class=\"alert alert-light\" style=\"margin-bottom:0 !important;\" role=\"alert\">Aucun utilisateur n'a été trouvée.</div>"; } ?>
                </div>

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

    <!-- Modal suppression -->
    <div class="modal fade" id="data_del" tabindex="-1" role="dialog" aria-labelledby="data_del_titre" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="data_del_titre">Suppression d<label for="data_name" class="col-form-label" id="data_del_type"></label></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Etes-vous sûr de vouloir supprimer: <label for="data_name" class="col-form-label" id="data_del_data"></label></label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-primary conf_del" data-type="data_type" data-id="data_id" data-container="data_container">Confirmer</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin modal -->

    <!-- Modal modification -->
    <div class="modal fade" id="data_mod" tabindex="-1" role="dialog" aria-labelledby="data_mod_titre" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="data_mod_titre">Modification d<label for="data_name" class="col-form-label" id="data_mod_type"></label></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group" id="data_mod_data"></div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-primary conf_mod" data-type="data_type" data-id="data_id">Confirmer</button>
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
