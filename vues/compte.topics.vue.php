<?php
  require("../modeles-controleurs/compte.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Compte | Topics</title>
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
                  <a class="nav-link active" href="./compte.topics.vue.php" style="background-color:#8CB75B; border-color:#8CB75B;">Topics Postés</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-muted" href="./compte.res.vue.php">Résultats des Tests</a>
                </li>
              </ul>
            </div>
            <div class="card-body">

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
