<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");
  require("../fonctions/fonctions.pdf.php");

  if(isset($_GET['matiere'], $_GET['niveau']) && !empty($_GET['matiere']) && !empty($_GET['niveau'])){

    $matiere = intval($_GET['matiere']);
    $niveau = intval($_GET['niveau']);

    if(existe_matiere($matiere) && existe_formation($niveau)){

      if(!isset($_SESSION['questionEnCours'])){

        $_SESSION['questions'] = array();

        $_SESSION['reponses'] = array();

        $requete = $bdd->prepare("SELECT * FROM t_question_quest WHERE mat_id = ? AND form_id = ? ORDER BY RAND() LIMIT 10");

        if($requete->execute(array($matiere, $niveau))){

          while ($data = $requete->fetch()){

            array_push($_SESSION['questions'], array(

              "id" => $data['quest_id'],
              "intitule" => $data['quest_intitule'],
              "reponse1" => $data['quest_reponse1'],
              "reponse2" => $data['quest_reponse2'],
              "reponse3" => $data['quest_reponse3'],
              "reponse4" => $data['quest_reponse4'],
              "reponse5" => $data['quest_reponse5'],
              "bonne_reponse1" => $data['quest_bonne_reponse1'],
              "bonne_reponse2" => $data['quest_bonne_reponse2'],
              "bonne_reponse3" => $data['quest_bonne_reponse3'],
              "bonne_reponse4" => $data['quest_bonne_reponse4'],
              "bonne_reponse5" => $data['quest_bonne_reponse5'],
              "type" => $data['quest_type']
            ));
          }
        }

        $_SESSION['nbQuestions'] = count($_SESSION['questions']);

        $_SESSION['questionEnCours'] = 0;

        $_SESSION['nbBonnesReponses'] = 0;

        $_SESSION['termine'] = false;
      }

      if(isset($_POST['btn_suivant']) || isset($_POST['btn_precedent']) || isset($_POST['btn_terminer'])){

        if(isset($_POST['btn_suivant'])) {
          $idQuestion = intval($_POST['btn_suivant']);
        }

        if(isset($_POST['btn_precedent'])) {
          $idQuestion = intval($_POST['btn_precedent']);
        }

        if(isset($_POST['btn_terminer'])) {
          $idQuestion = intval($_POST['btn_terminer']);
        }

        $typeQuestion = getTypeQuestion($idQuestion);

        if($typeQuestion == "QCU"){

          if(isset($_POST['reponse']) && !empty($_POST['reponse'])){

            $reponse = intval($_POST['reponse']);

          } else {

            $reponse = 0;
          }

          $bonneReponse = getBonneReponseQCU($idQuestion);

          if($reponse == $bonneReponse){
            $score = 1;
            $_SESSION['nbBonnesReponses']++;
          }
          else
            $score = 0;

          $_SESSION['reponses'][$_SESSION['questionEnCours']] = getReponsesRadio($reponse);

        } else if ($typeQuestion == "QCM") {

          if(isset($_POST['reponses']) && !empty($_POST['reponses'])){

            $reponses = $_POST['reponses'];

            $bonnesReponses = getBonnesReponsesQCM($idQuestion);

            if($reponses == $bonnesReponses){
              $score = 1;
              $_SESSION['nbBonnesReponses']++;
            }
            else
              $score = 0;

            $_SESSION['reponses'][$_SESSION['questionEnCours']] = getReponsesCheckboxes($reponses);

          } else {

            $score = 0;
          }
        }

        if(existeReponse($_SESSION['mem_id'], $idQuestion)){

          updateScoreQuestion($_SESSION['mem_id'], $idQuestion, $score);
        } else {

          setScoreQuestion($_SESSION['mem_id'], $idQuestion, $score);
        }

        if(isset($_POST['btn_suivant'])) {

          $_SESSION['questionEnCours']++;
        }

        if(isset($_POST['btn_precedent'])){

          $_SESSION['questionEnCours']--;
        }

        if(isset($_POST['btn_terminer'])){

          $resultat = intval(($_SESSION['nbBonnesReponses']/$_SESSION['nbQuestions']) * 100);

          $requete  = $bdd->prepare("INSERT INTO tj_evaluation_eval (mat_id, form_id, mem_id, eval_resultat, eval_date) VALUES (?, ?, ?, ?, NOW())");
          $requete->execute(array($matiere, $niveau, $_SESSION['mem_id'], $resultat));

          setPDFResultats($_SESSION['mem_id'], $matiere, $niveau, $_SESSION['questions'], $_SESSION['reponses']);

          $_SESSION['termine'] = true;

          // unset($_SESSION['questionEnCours']);
          // unset($_SESSION['questions']);
          // unset($_SESSION['reponses']);
          // unset($_SESSION['nbQuestions']);
          // unset($_SESSION['termine']);
        }
      }
    } else {

      header("Location: ../vues/erreur.vue.php");
    }
  } else {

    header("Location: ../vues/erreur.vue.php");
  }









 ?>
