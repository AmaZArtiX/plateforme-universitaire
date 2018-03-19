<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark header">
    <a class="navbar-brand" href="index.vue.php">
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
            <li class="nav-item <?php if($header == "accueil") {echo 'active';} ?>">
              <a class="nav-link" href="index.vue.php">Accueil</a>
            </li>
            <li class="nav-item <?php if($header == "forum") {echo 'active';} ?>">
              <a class="nav-link" href="forum.vue.php">Forum</a>
            </li>
            <li class="nav-item <?php if($header == "utilisateur") {echo 'active';} ?>">
              <a class="nav-link" href="connexion.vue.php">Se connecter</a>
            </li>
          </ul>
      <?php
        } else {
      ?>
          <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item <?php if($header == "accueil") {echo 'active';} ?>">
              <a class="nav-link" href="index.vue.php">Accueil</a>
            </li>
            <li class="nav-item <?php if($header == "forum") {echo 'active';} ?>">
              <a class="nav-link" href="forum.vue.php">Forum</a>
            </li>
            <li class="nav-item dropdown <?php if($header == "utilisateur") {echo 'active';} ?>">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= $_SESSION['mem_prenom'] ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="compte.vue.php">Mon compte</a>
                <?php
                  if($_SESSION['mem_administrateur'] == 1) {
                ?>
                <a class="dropdown-item" href="administration.vue.php">Administration</a>
                <?php
                  }
                ?>
                <a class="dropdown-item" href="../modeles-controleurs/deconnexion.php">Deconnexion</a>
              </div>
            </li>
          </ul>
      <?php
        }
      ?>
    </div>
  </nav>
</header>
