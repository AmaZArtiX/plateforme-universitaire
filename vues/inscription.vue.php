<?php
  require("../modeles-controleurs/inscription.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/inscription.css">
  </head>
  <body>
    <!-- Header -->
    <?php
      require("header.vue.php");
    ?>
    <!-- Fin header -->

    <!-- Formulaire -->
    <div class="container" style="margin-top: 100px; margin-bottom: 50px;">
      <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <form role="form" method="post" action="">
            <h2>Inscrivez-vous <small>C'est gratos cousin.</small></h2>
            <hr/>
            <div class="row">
      				<div class="col-xs-12 col-sm-6 col-md-6">
      					<div class="form-group">
                  <input type="text" name="prenom" id="prenom" class="form-control input-lg" placeholder="Prénom" value="<?php if(isset($prenom)){ echo $prenom; }?>" tabindex="1" required>
      					</div>
              </div>
      				<div class="col-xs-12 col-sm-6 col-md-6">
      					<div class="form-group">
      						<input type="text" name="nom" id="nom" class="form-control input-lg" placeholder="Nom" value="<?php if(isset($nom)){ echo $nom; }?>" tabindex="2" required>
      					</div>
      				</div>
        		</div>
        		<div class="form-group">
        			<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Adresse e-mail" value="<?php if(isset($email)){ echo $email; }?>" tabindex="3" required>
        		</div>
        		<div class="row">
        			<div class="col-xs-12 col-sm-6 col-md-6">
        				<div class="form-group">
        					<input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control input-lg" placeholder="Mot de passe" tabindex="4" required>
        				</div>
        			</div>
        			<div class="col-xs-12 col-sm-6 col-md-6">
        				<div class="form-group">
        					<input type="password" name="mot_de_passe_confirmation" id="mot_de_passe_confirmation" class="form-control input-lg" placeholder="Confirmation" tabindex="5" required>
        				</div>
        			</div>
        		</div>
        		<div class="row center">
              <div class="col-xs-4 col-sm-3 col-md-3 clabel" data-toggle="buttons">
                <label class="btn btn-primary">
                  <input type="checkbox" name="conditions" hidden> J'accepte
                </label>
              </div>
        			<div class="col-xs-8 col-sm-9 col-md-9">
        				En cliquant <strong class="label label-primary">S'inscrire</strong>, vous acceptez les <a href="#" data-toggle="modal" data-target="#t_and_c_m">conditions d'utilisation</a> du site.
        			</div>
        		</div>
            <hr/>
        		<div class="row">
        			<div class="col-xs-12 col-md-6">
                <input type="submit" value="S'inscrire" name="btn_inscription" class="btn btn-primary btn-block btn-lg" tabindex="7">
              </div>
              <?php
                if(!isset($_SESSION['mem_id'])) {
              ?>
        			<div class="col-xs-12 col-md-6">
                <a href="connexion.vue.php" class="btn btn-success btn-block btn-lg">Se connecter</a>
              </div>
              <?php
                }
              ?>
        		</div>
        	</form>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <?php

            if(isset($erreur)){

              afficherAlerte("", $erreur, "danger");

            } else if(isset($succes)){

              afficherAlerte("Félicitations ! ", $succes, "success");
            }

          ?>
        </div>
      </div>
    </div>
    <!-- Fin Formulaire -->

    <!-- Footer -->
    <?php
      require("footer.vue.php");
    ?>
    <!-- Fin footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/inscription.js"></script>
  </body>
</html>
