<?php
  require("../modeles-controleurs/faq.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Compte</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/forum.css">
  </head>
  <body>
    <!-- Header -->
    <?php
      require("header.vue.php");
    ?>
    <!-- Fin header -->

    <!-- Principal -->
    <div class="container" style="margin-top:5rem; margin-bottom:1rem;">
      <div class="card">
        <div class="card-header" style="color:white; background-color:#8CB75B; border-color:#8CB75B;">
          Questions Fréquemment Posées
        </div>
        <div id="accordion">
          <?php
            if($requete->rowCount() > 0) {
              while ($qr = $requete->fetch()) {
          ?>
          <div class="card">
            <div class="card-header" id="heading<?= $qr['qr_id'] ?>">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?= $qr['qr_id'] ?>" aria-expanded="false" aria-controls="collapse<?= $qr['qr_id'] ?>" style="color:#8CB75B;">
                  <?= $qr['qr_question'] ?>
                </button>
              </h5>
            </div>
            <div id="collapse<?= $qr['qr_id'] ?>" class="collapse" aria-labelledby="heading<?= $qr['qr_id'] ?>" data-parent="#accordion">
              <div class="card-body">
                <?= $qr['qr_reponse'] ?>
              </div>
            </div>
          </div>
          <?php } } else { echo "<div class=\"alert alert-light\" role=\"alert\">Aucune question/réponse n'a été trouvée.</div>"; } ?>
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
  </body>
</html>
