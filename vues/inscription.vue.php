<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/connexion.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/inscription.js"></script>
  </head>
  <body>
    <!-- Header -->
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">
          <img src="../assets/UVHC-blanc.png" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Lien</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="connexion.vue.php">Se connecter</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Lien
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Lien</a>
                <a class="dropdown-item" href="#">Lien</a>
                <a class="dropdown-item" href="#">Lien</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Fin header -->
    <div class="container" style="margin-top: 100px; margin-bottom: 50px;">
      <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <form role="form">
            <h2>Inscrivez-vous <small>C'est gratos cousin.</small></h2>
            <hr/>
            <div class="row">
      				<div class="col-xs-12 col-sm-6 col-md-6">
      					<div class="form-group">
                  <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="Prénom" tabindex="1">
      					</div>
              </div>
      				<div class="col-xs-12 col-sm-6 col-md-6">
      					<div class="form-group">
      						<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Nom" tabindex="2">
      					</div>
      				</div>
        		</div>
            <div class="form-group">
        			<input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Nom d'utilisateur" tabindex="3">
        		</div>
        		<div class="form-group">
        			<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Adresse e-mail" tabindex="4">
        		</div>
        		<div class="row">
        			<div class="col-xs-12 col-sm-6 col-md-6">
        				<div class="form-group">
        					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe" tabindex="5">
        				</div>
        			</div>
        			<div class="col-xs-12 col-sm-6 col-md-6">
        				<div class="form-group">
        					<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirmation" tabindex="6">
        				</div>
        			</div>
        		</div>
        		<div class="row">
              <div class="col-xs-4 col-sm-3 col-md-3" data-toggle="buttons">
                <label class="btn btn-primary">
                  <input type="checkbox" autocomplete="off" hidden> J'accepte
                </label>
              </div>
        			<div class="col-xs-8 col-sm-9 col-md-9">
        				En cliquant <strong class="label label-primary">M'inscire</strong>, vous acceptez les <a href="#" data-toggle="modal" data-target="#t_and_c_m">conditions d'utilisation</a> du site.
        			</div>
        		</div>
            <hr/>
        		<div class="row">
        			<div class="col-xs-12 col-md-6">
                <input type="submit" value="S'inscrire" class="btn btn-primary btn-block btn-lg" tabindex="7">
              </div>
        			<div class="col-xs-12 col-md-6">
                <a href="connexion.vue.php" class="btn btn-success btn-block btn-lg">Se connecter</a>
              </div>
        		</div>


        	</form>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <?php require("footer.vue.php"); ?>
  </body>
</html>
