<?php
  require("../modeles-controleurs/forum.nouveau-topic.php");

  require("../jbbcode/parser.php");

  $parser = new JBBCode\Parser();
  $parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());
  $parser->addBBCode("quote", '<blockquote>{param}</blockquote>');
  $parser->addBBCode("list", '<ul>{param}</ul>');
  $parser->addBBCode("*", '<li>{param}</li>');
  $parser->addBBCode("codec", "<div><pre><code class=\"language-c\">{param}</code></pre></div>");
  $parser->addBBCode("codecpp", '<div><pre><code class="language-cpp">{param}</code></pre></div>');
  $parser->addBBCode("codejava", '<div><pre><code class="language-java">{param}</code></pre></div>');
  $parser->addBBCode("codephp", '<div><pre><code class="language-php">{param}</code></pre></div>');
  $parser->addBBCode("codepython", '<div><pre><code class="language-python">{param}</code></pre></div>');
  $parser->addBBCode("codesql", '<div><pre><code class="language-sql">{param}</code></pre></div>');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Forum étudiant - Nouveau Topic</title>
    <!-- <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/forum.css">
    <link rel="stylesheet" href="../css/wbbtheme.css"/>
    <link rel="stylesheet" href="../css/prism.css"/>
  </head>
  <body>
    <!-- Header -->
    <?php
      $header = "forum";
      require("header.vue.php");
    ?>
    <!-- Fin header -->

    <!-- Formulaire -->
    <div class="container" style="margin-top:5rem; margin-bottom:50px;">
      <div class="row justify-content-center">
        <div class="col-md-9">
          <form role="form" method="post" action="" style="margin-bottom:25px">
            <h2>Créez un nouveau topic !</h2>
            <hr/>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputSujet">Sujet :</label>
                <input type="text" class="form-control" placeholder="Exemple: Les livres de programmation">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Sous-catégorie :</label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@Catégorie</div>
                  </div>
                  <select class="form-control">
                    <option value="@Sous-catégorie 1" selected>@Sous-catégorie 1</option>
                    <option value="@Sous-catégorie 2">@Sous-catégorie 2</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Message :</label>
                <textarea id="editor" name="reponse" rows="8"></textarea>
              </div>
            </div>
            <div class="form-inline">
              <div class="custom-control custom-checkbox mr-sm-2">
                <input type="checkbox" class="custom-control-input" id="notif-mail">
                <label class="custom-control-label" for="notif-mail">Me notifier par email</label>
              </div>
              <button type="submit" class="btn btn-secondary mr-sm-2" style="background-color:#8CB75B; border-color:#8CB75B;">Poster le nouveau topic</button>
              <button type="reset" class="btn btn-secondary">Annuler</button>
            </div>
          </form>
        </div>

        <div class="col-md-3">
          <!-- Activités récentes -->
          <div class="card" style="margin-bottom:25px">
            <h6 class="card-header">Dernières publications</h6>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <?php
                  $dernieres_publis_categorie = get_derniers_topics_categorie($id_categorie);

                  while($dpc = $dernieres_publis_categorie->fetch()) {
                ?>
                  <tr class="lien align-middle" onclick="location.href = './forum.topic.vue.php?titre=<?= url_custom_encode($dpc['top_sujet']) ?>&id=<?= $dpc['top_id'] ?>&page=1'">
                    <td class="align-middle"><b>Re: <a href="./forum.topic.vue.php?titre=<?= url_custom_encode($dpc['top_sujet']) ?>&id=<?= $dpc['top_id'] ?>&page=1"><?= $dpc['top_sujet'] ?></a></b> <br/> <small class="text-muted">par <b><a href=""><?= get_nom_prenom_membre($dpc['mem_id']) ?></a></b></small></td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>

          <?php
            if (isset($_SESSION['mem_id'])) {
          ?>
          <!-- Activités récentes relatives à l'utilisateur -->
          <div class="card" style="margin-bottom:25px">
            <h6 class="card-header">Réponses à vos publications</h6>
            <div class="card-body">
              <p class="card-text text-muted">@Aucune réponse à afficher.</p>
            </div>
            <div class="card-footer text-muted text-center">
              Dernière activité : @Jamais.
            </div>
          </div>
          <!-- Fin -->
          <?php
            }
          ?>
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

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="../js/jquery.wysibb.min.js"></script>
    <script src="../js/fr.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/wysibb-options.js"></script>
    <script src="../js/prism.js"></script>
  </body>
</html>
