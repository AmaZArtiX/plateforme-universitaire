<?php

  require("../configuration/config.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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
  </head>
  <body>
    <form action="../modeles-controleurs/test.php" method="post">
            <div>
                <select name="domaine" id="domaine">
                    <option value="">Sélectionnez un domaine</option>
                    <?php

                    $requete = $bdd->query("SELECT * FROM t_domaine_dom");
                    while ($data = $requete->fetch()) {

                      echo "<option value='$data[dom_id]''>$data[dom_nom]</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                <select class="" name="matiere" id="matiere">
                  <option value="">Sélectionnez une matière</option>
                </select>
            </div>
            <div>
                <select class="" name="niveau">
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
            <input type="submit" name="envoyer" value="Envoyer">
        </form>
  </body>
</html>
