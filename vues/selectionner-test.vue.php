<?php

  require("../modeles-controleurs/selectionner-test.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Positionnement</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/forum.css">
  </head>
  <body>
    <!-- Header -->
    <?php
      $header = "positionnement";
      require("header.vue.php");
    ?>
    <!-- Fin header -->
    <div class="container" style="margin-top: 125px;">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <?php if(isset($erreur)){ afficherAlerte("", $erreur, "danger"); } ?>
            </div>
            <div class="col-md-6 offset-md-3">
              <div class="card card-outline-secondary">
                <div class="card-header">
                  <h3 class="mb-0">Sélectionnez la matière à évaluer</h3>
                </div>
                <div class="card-body">
                  <form class="form" action="<?=($_SERVER['PHP_SELF'])?>" method="post">
                    <div class="form-group">
                      <select name="domaine" id="domaine" class="form-control">
                        <option value="" >Sélectionnez un domaine</option>
                        <?php

                        $requete = $bdd->query("SELECT * FROM t_domaine_dom");
                        while ($data = $requete->fetch()) {

                          echo "<option value='$data[dom_id]''>$data[dom_nom]</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <select class="form-control" name="matiere" id="matiere">
                        <option value="">Sélectionnez une matière</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <select class="form-control" name="niveau">
                        <option value="">Sélectionnez un niveau de formation</option>
                        <?php

                        $requete = $bdd->query("SELECT * FROM t_formation_form");
                        while ($data = $requete->fetch()) {
                          //$selected = (isset($_POST['list']) && $_POST['list'] ==  $data['dom_id']) ? 'selected' : '';
                          echo "<option value='$data[form_id]''>$data[form_nom]</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-success form-control" name="envoyer" value="Envoyer">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php
      require("footer.vue.php");
    ?>
    <!-- Fin footer -->
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#domaine').on('change', function(){

        var idDomaine = $(this).val();
        if(idDomaine){

          $.get(
            "ajax.php",
            {domaine: idDomaine},
            function(data){
              $('#matiere').html(data);
            }
          );
        } else {
          $('#matiere').html('<option>Sélectionnez un domaine en premier</option>')
        }
      });
    });

  </script>
</html>
