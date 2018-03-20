<?php
  require("../modeles-controleurs/compte.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Compte | Résumé</title>
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
                  <a class="nav-link active" href="./compte.vue.php" style="background-color:#8CB75B; border-color:#8CB75B;">Résumé</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-muted" href="./compte.topics.vue.php">Topics Postés</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-muted" href="./compte.res.vue.php">Résultats des Tests</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <figure class="figure">
                    <img class="img-thumbnail" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="90" height="90" style="border-color:#8CB75B;">
                    <figcaption class="figure-caption"><br/>
                      <?php if($_SESSION['mem_administrateur'] == 1) { ?><span class="badge badge-warning">Administrateur</span><?php } ?>
                      <span class="badge badge-info">Utilisateur</span>
                    </figcaption>
                  </figure>
                </div>
                <div class="col-md-9">
                  <div class="card table-responsive">
                    <table class="table table-striped mb-0 font-weight-light">
                      <tr class="text-left">
                        <td class="align-middle">Prénom</td>
                        <td class="align-middle"><?php echo $_SESSION['mem_prenom']; ?></td>
                      </tr>
                      <tr class="text-left">
                        <td class="align-middle">Nom</td>
                        <td class="align-middle"><?php echo $_SESSION['mem_nom']; ?></td>
                      </tr>
                      <tr class="text-left">
                        <td class="align-middle">E-mail</td>
                        <td class="align-middle"><?php echo $_SESSION['mem_mail']; ?></td>
                      </tr>
                      <tr class="text-left">
                        <td class="align-middle">Date d'inscription</td>
                        <td class="align-middle"><?php echo $_SESSION['mem_date_inscription']; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="./compte.edit.vue.php" class="btn btn-light btn-lg btn-block" style="background-color:#8CB75B; border-color:#8CB75B; color:white;">Modifier le profil</a>
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
