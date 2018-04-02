<?php

  require("../modeles-controleurs/questionnaire.php");

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
     <?php

     if(isset($_SESSION['questionEnCours'])) {

       if ($_SESSION['nbQuestions'] > 0 && $_SESSION['questionEnCours'] <= $_SESSION['nbQuestions'] && $_SESSION['termine'] == false) {

     ?>
         <div class="container" style="margin-top:125px">
           <div class="row">
             <div class="col-md-12">
               <div class="row">
                 <div class="col-md-10 offset-md-1">
                   <div class="progress">
                     <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?= ($_SESSION['questionEnCours']/$_SESSION['nbQuestions'])*100 ?>%;"></div>
                  </div>
                 </div>
                  <div class="col-md-10 offset-md-1">
                    &nbsp;
                 </div>
                 <div class="col-md-10 offset-md-1">
                   <div class="card card-outline-secondary">
                     <div class="card-header">
                       <h4 class="mb-0"><?= $_SESSION['questions'][$_SESSION['questionEnCours']]['intitule'] ?></h4>
                     </div>
                     <div class="card-body">
                       <form class="form" action="questionnaire.vue.php?matiere=<?= $matiere ?>&niveau=<?= $niveau ?>" method="post">
                         <!-- bouton radio ou checkbox 1 -->
                         <div class="form-group">
                           <?php if($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCM") { ?>
                             <input id="question1" type="checkbox" name="reponses[]" value="1" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][0]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][0] == 1) { ?> checked <?php } ?>/>
                           <?php } else if ($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCU") { ?>
                             <input id="question1" type="radio" name="reponse" value="1" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][0]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][0] == 1) { ?> checked <?php } ?>/>
                           <?php } ?>
                           <label for="question1"><?= $_SESSION['questions'][$_SESSION['questionEnCours']]['reponse1'] ?></label>
                         </div>

                         <!-- bouton radio ou checkbox 2 -->
                         <div class="form-group">
                           <?php if($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCM") { ?>
                             <input id="question2" type="checkbox" name="reponses[]" value="2" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][1]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][1] == 1) { ?> checked <?php } ?>/>
                           <?php } else if ($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCU") { ?>
                             <input id="question2" type="radio" name="reponse" value="2" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][1]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][1] == 1) { ?> checked <?php } ?>/>
                           <?php } ?>
                           <label for="question2"><?= $_SESSION['questions'][$_SESSION['questionEnCours']]['reponse2'] ?></label>
                         </div>

                         <!-- bouton radio ou checkbox 3 -->
                         <div class="form-group">
                           <?php if($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCM") { ?>
                             <input id="question3" type="checkbox" name="reponses[]" value="3" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][2]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][2] == 1) { ?> checked <?php } ?>/>
                           <?php } else if ($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCU") { ?>
                             <input id="question3" type="radio" name="reponse" value="3" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][2]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][2] == 1) { ?> checked <?php } ?>/>
                           <?php } ?>
                           <label for="question3"><?= $_SESSION['questions'][$_SESSION['questionEnCours']]['reponse3'] ?></label>
                         </div>

                         <!-- bouton radio ou checkbox 4 -->
                         <div class="form-group">
                           <?php if($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCM") { ?>
                             <input id="question4" type="checkbox" name="reponses[]" value="4" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][3]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][3] == 1) { ?> checked <?php } ?>/>
                           <?php } else if ($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCU") { ?>
                             <input id="question4" type="radio" name="reponse" value="4" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][3]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][3] == 1) { ?> checked <?php } ?>/>
                           <?php } ?>
                           <label for="question4"><?= $_SESSION['questions'][$_SESSION['questionEnCours']]['reponse4'] ?></label>
                         </div>

                         <!-- bouton radio ou checkbox 5 -->
                         <div class="form-group">
                           <?php if($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCM") { ?>
                             <input id="question5" type="checkbox" name="reponses[]" value="5" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][4]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][4] == 1) { ?> checked <?php } ?>/>
                           <?php } else if ($_SESSION['questions'][$_SESSION['questionEnCours']]['type'] == "QCU") { ?>
                             <input id="question5" type="radio" name="reponse" value="5" <?php if (isset($_SESSION['reponses'][$_SESSION['questionEnCours']][4]) && $_SESSION['reponses'][$_SESSION['questionEnCours']][4] == 1) { ?> checked <?php } ?>/>
                           <?php } ?>
                           <label for="question5"><?= $_SESSION['questions'][$_SESSION['questionEnCours']]['reponse5'] ?></label>
                         </div>
                         <div class="form-group">
                           <!-- bouton precedent  -->
                           <?php if ($_SESSION['questionEnCours'] > 0) { ?>
                              <button class="btn btn-success" type="submit" name="btn_precedent" value="<?= $_SESSION['questions'][$_SESSION['questionEnCours']]['id']?>">Précédent</button>
                           <?php	} ?>

                           <!-- bouton suivant & terminer -->
                           <?php if ($_SESSION['questionEnCours'] != $_SESSION['nbQuestions']-1) { ?>
                            <button class="btn btn-success float-right" type="submit" name="btn_suivant" value="<?= $_SESSION['questions'][$_SESSION['questionEnCours']]['id']?>">Suivant</button>
                            <?php } else if ($_SESSION['questionEnCours'] == $_SESSION['nbQuestions']-1) { ?>
                              <button class="btn btn-success float-right" type="submit" name="btn_terminer" value="<?= $_SESSION['questions'][$_SESSION['questionEnCours']]['id']?>">Terminer</button>
                            <?php } ?>
                          </div>
                       </form>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
     <?php
          }
        }

        if(isset($_SESSION['termine'])) {

          if($_SESSION['termine'] == true) {

      ?>
            <div class="jumbotron jumbotron-fluid">
              <div class="container">
                <h3>Vos réponses ont été enregistrées!</h3>
                <p>Vos résultats ont été analysés pour nous permettre de vous positionner dans le groupe de soutien idéal. Vous pouvez consulter la correction depuis le fichier PDF et ainsi prendre connaissance de votre numéro de groupe.</p>
                <p><a class="btn btn-primary btn-lg" href="../resultats/resultats-<?= $_SESSION['mem_id'] ?><?= $matiere ?><?= $niveau ?>.pdf" target="_blank" role="button">Visualiser</a></p>
              </div>
            </div>
      <?php
            unset($_SESSION['termine']);
          }
        }
     ?>

     <!-- Footer -->
     <?php
       require("footer.vue.php");
     ?>
     <!-- Fin footer -->
   </body>
 </html>
