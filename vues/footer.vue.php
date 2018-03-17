<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h2 class="logo"><img src="../assets/UVHC-blanc.png"/></h2>
            </div>
            <div class="col-sm-2">
                <h5>Pour commencer</h5>
                <ul>
                    <li><a href="index.vue.php">Accueil</a></li>
                    <?php
                      if(!isset($_SESSION['mem_id'])) {
                    ?>
                    <li><a href="connexion.vue.php">Se connecter</a></li>
                    <?php
                      }
                    ?>
                    <li><a href="inscription.vue.php">S'inscrire</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5>À propos de nous</h5>
                <ul>
                    <li><a href="#">Informations</a></li>
                    <li><a href="contact.vue.php">Nous contacter</a></li>
                    <li><a href="#">Nouveautés</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5>Support</h5>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Aide</a></li>
                    <li><a href="forum.vue.php">Forum</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <div class="social-networks">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                </div>
                <a href="contact.vue.php" class="btn btn-default">Nous contacter</a>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>© 2018 Copyright</p>
    </div>
</footer>
