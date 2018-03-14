<?php
  require("../modeles-controleurs/connexion.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Connection</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/connexion.css">
  </head>
  <body>
    <!-- Header -->
    <?php
      require("header.vue.php");
    ?>
    <!-- Fin header -->

    <center>
      <!-- Formulaire de connexion -->
      <form class="form-signin" method="post" action="" style="margin-top: 100px; margin-bottom: 100px;">
        <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>
        <label for="email" class="sr-only">Adresse e-mail</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Adresse e-mail" required autofocus>
        <label for="mot_de_passe" class="sr-only">Password</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control" placeholder="Mot de passe" required>
        <label>
          <a href="#">Mot de passe oublié ?</a>
        </label>
        <div class="row">
          <div class="col-xs-12 col-md-6">
            <input type="submit" name="btn_connexion" value="Se connecter" class="btn btn-primary btn-block btn-lg">
          </div>
          <div class="col-xs-12 col-md-6">
            <a href="inscription.vue.php" class="btn btn-success btn-block btn-lg">S'inscrire</a>
          </div>
        </div>
      </form>
      <!-- Fin Formulaire -->
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <?php

              if(isset($erreur)){

                afficherAlerte("", $erreur, "danger");

              }

            ?>
          </div>
        </div>
      </div>
    </center>

    <!-- Footer -->
    <?php
      require("footer.vue.php");
    ?>
    <!-- Fin Footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
