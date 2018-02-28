<?php

  require("../modeles-controleurs/inscription.php");

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/connexion.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/inscription.js"></script>
  </head>
  <body>
    <!-- Header -->
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark header">
        <a class="navbar-brand" href="../index.php">
          <img src="../assets/UVHC-blanc.png" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <?php
            if(!isset($_SESSION['mem_id'])) {
          ?>
              <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                <li class="nav-item">
                  <a class="nav-link" href="../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Forum</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="connexion.vue.php">Se connecter</a>
                </li>
              </ul>
          <?php
            } else {
          ?>
              <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                <li class="nav-item">
                  <a class="nav-link" href="../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Forum</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $_SESSION['mem_prenom'] ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Mon compte</a>
                    <a class="dropdown-item" href="../modeles-controleurs/deconnexion.php">Quitter</a>
                  </div>
                </li>
              </ul>

          <?php

            }

          ?>
        </div>
      </nav>
    </header>
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
        		<div class="row">
              <div class="col-xs-4 col-sm-3 col-md-3" data-toggle="buttons">
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
        			<div class="col-xs-12 col-md-6">
                <a href="connexion.vue.php" class="btn btn-success btn-block btn-lg">Se connecter</a>
              </div>
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
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2 class="logo"><a href="#"><img src="../assets/UVHC-blanc.png"/></a></h2>
                </div>
                <div class="col-sm-2">
                    <h5>Pour commencer</h5>
                    <ul>
                        <li><a href="../index.php">Accueil</a></li>
                        <li><a href="../vues/connexion.vue.php">Se connecter</a></li>
                        <li><a href="../vues/inscription.vue.php">S'inscrire</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>À propos de nous</h5>
                    <ul>
                        <li><a href="#">Informations</a></li>
                        <li><a href="#">Nous contacter</a></li>
                        <li><a href="#">Nouveautés</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Aide</a></li>
                        <li><a href="#">Forum</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <div class="social-networks">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <button type="button" class="btn btn-default">Nous contacter</button>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2018 Copyright</p>
        </div>
    </footer>
    <!-- Fin footer -->
  </body>
</html>
