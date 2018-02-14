<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Connectez-vous</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/connexion.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
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

    <center>
      <!-- Formulaire de connexion -->
      <form class="form-signin" style="margin-top: 100px; margin-bottom: 100px;">
        <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Adresse e-mail" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
        <label>
          <a href="#">Mot de passe oublié ?</a>
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
      </form>
      <!-- Fin Formulaire -->
    </center>

    <!-- Footer -->
    <?php require("footer.vue.php"); ?>
  </body>
</html>
