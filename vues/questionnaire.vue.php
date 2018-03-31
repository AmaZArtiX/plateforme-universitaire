<?php

  require("../modeles-controleurs/questionnaire.php");

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <?php if ($_SESSION['nbQuestions'] > 0 && $_SESSION['questionEnCours'] <= $_SESSION['nbQuestions'] && $_SESSION['termine'] == false) { ?>
        <form action="questionnaire.vue.php?matiere=<?= $matiere ?>&niveau=<?= $niveau ?>" method="post">
         <!-- intitule de la question -->
         <?= $_SESSION['questions'][$_SESSION['questionEnCours']]['intitule'] ?>

         <!-- bouton radio ou checkbox 1 -->
         <?php if($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCM") { ?>
           <input id="question1" type="checkbox" name="reponses[]" value="1" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][0]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][0] == 1) { ?> checked <?php } ?>/>
         <?php } else if ($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCU") { ?>
           <input id="question1" type="radio" name="reponse" value="1" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][0]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][0] == 1) { ?> checked <?php } ?>/>
         <?php } ?>
         <label for="question1"><?= $_SESSION['questions'][$_SESSION['questionEnCours']]['reponse1'] ?></label>

         <!-- bouton radio ou checkbox 2 -->
         <?php if($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCM") { ?>
           <input id="question2" type="checkbox" name="reponses[]" value="2" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][1]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][1] == 1) { ?> checked <?php } ?>/>
         <?php } else if ($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCU") { ?>
           <input id="question2" type="radio" name="reponse" value="2" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][1]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][1] == 1) { ?> checked <?php } ?>/>
         <?php } ?>
         <label for="question2"><?= $_SESSION['questions'][$_SESSION['questionEnCours']]['reponse2'] ?></label>

         <!-- bouton radio ou checkbox 3 -->
         <?php if($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCM") { ?>
           <input id="question3" type="checkbox" name="reponses[]" value="3" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][2]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][2] == 1) { ?> checked <?php } ?>/>
         <?php } else if ($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCU") { ?>
           <input id="question3" type="radio" name="reponse" value="3" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][2]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][2] == 1) { ?> checked <?php } ?>/>
         <?php } ?>
         <label for="question3"><?= $_SESSION['questions'][$_SESSION['questionEnCours']]['reponse3'] ?></label>

         <!-- bouton radio ou checkbox 4 -->
         <?php if($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCM") { ?>
           <input id="question4" type="checkbox" name="reponses[]" value="4" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][3]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][3] == 1) { ?> checked <?php } ?>/>
         <?php } else if ($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCU") { ?>
           <input id="question4" type="radio" name="reponse" value="4" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][3]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][3] == 1) { ?> checked <?php } ?>/>
         <?php } ?>
         <label for="question4"><?= $_SESSION['questions'][$_SESSION['questionEnCours']]['reponse4'] ?></label>

         <!-- bouton radio ou checkbox 5 -->
         <?php if($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCM") { ?>
           <input id="question5" type="checkbox" name="reponses[]" value="5" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][4]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][4] == 1) { ?> checked <?php } ?>/>
         <?php } else if ($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCU") { ?>
           <input id="question5" type="radio" name="reponse" value="5" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][4]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][4] == 1) { ?> checked <?php } ?>/>
         <?php } ?>
         <label for="question5"><?= $_SESSION['questions'][$_SESSION['questionEnCours']]['reponse5'] ?></label>

         <!-- bouton precedent  -->
         <?php if ($_SESSION['questionEnCours'] > 0) { ?>
            <button type="submit" name="btn_precedent" value="<?= $_SESSION['questions'][$_SESSION['questionEnCours']]['id']?>">Précédent</button>
         <?php	} ?>

         <!-- bouton suivant & terminer -->
         <?php if ($_SESSION['questionEnCours'] != $_SESSION['nbQuestions']-1) { ?>
          <button type="submit" name="btn_suivant" value="<?= $_SESSION['questions'][$_SESSION['questionEnCours']]['id']?>">Suivant</button>
        <?php } else if ($_SESSION['questionEnCours'] == $_SESSION['nbQuestions']-1) { ?>
          <button type="submit" name="btn_terminer" value="<?= $_SESSION['questions'][$_SESSION['questionEnCours']]['id']?>">Terminer</button>
        <?php } ?>

       </form>
     <?php } else if($_SESSION['termine'] == true) { ?>
        <div>Le questionnaire est fini ! Prenez connaissance de vos réultats <a href="../resultats/resultats-<?= $_SESSION['mem_id'] ?>-<?= $matiere ?>-<?= $niveau ?>.pdf">ici</a></div>
     <?php } ?>
   </body>
 </html>
