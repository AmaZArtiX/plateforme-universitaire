<?php

  session_start();

  require("../configuration/config.php");
  require("../fonctions/fonctions.php");

  if (isset($_GET['titre'], $_GET['id']) && !empty($_GET['titre']) && !empty($_GET['id']) && isset($_GET['page']) && $_GET['page'] > 0) {

		$get_titre = htmlspecialchars($_GET['titre']);
		$get_id = htmlspecialchars($_GET['id']);

		$titre_original = $bdd->prepare("SELECT top_sujet FROM t_topic_top WHERE top_id = ?");
		$titre_original->execute(array($get_id));
		$titre_original = $titre_original->fetch();
		$titre_original = $titre_original['top_sujet'];

		if ($get_titre == url_custom_encode($titre_original)) {

			$topic = $bdd->prepare("SELECT * FROM t_topic_top WHERE top_id = ?");
			$topic->execute(array($get_id));
			$topic = $topic->fetch();

      $categorie_topic = get_categorie_topic($topic['top_id']);
      $sscategorie_topic = get_sscategorie_topic($topic['top_id']);
      $id_sscategorie_topic = get_id_sscategorie_topic($topic['top_id']);

      if(isset($_POST['btn_envoyer'], $_POST['reponse'])){

        if (isset($_SESSION['mem_id'])) {

          if(!empty($_POST['reponse'])){

            $reponse = htmlspecialchars(filtrerMots($_POST['reponse']));

            $requete = $bdd->prepare("INSERT INTO t_message_mess(top_id, mem_id, mess_contenu, mess_date_post) VALUES (?, ?, ?, NOW())");
            $requete->execute(array($get_id, $_SESSION['mem_id'], $reponse));
          } else {

            $erreur = "Votre message ne peut pas être vide";
          }
        } else {

          $erreur = "Vous devez être connecté pour poster un message. Cliquez <a href=\"../vues/connexion.vue.php\">ici</a> pour vous connecter.";
        }
      }

			// if (isset($_POST['fsubmit'], $_POST['freponse'])) {
      //
			// 	if (!empty($_POST['freponse'])) {
      //
			// 		$reponse = htmlspecialchars($_POST['freponse']);
      //
			// 		$requete = $bdd->prepare("INSERT INTO f_messages(id_topic, id_posteur, contenu, date_heure_post) VALUES (?, ?, ?, NOW())");
			// 		$requete->execute(array($get_id, $_SESSION['id'], $reponse));
      //
			// 		$reponse_msg = "Votre réponse a bien été postée";
      //
			// 		unset($reponse);
      //
			// 		// Envoie d'un mail au posteur si notif_createur = 1
			// 		if(($topic['notif_createur'] == 1) && ($topic['id_createur'] != $_SESSION['id'])) {
      //
			// 			$posteur = $bdd->prepare("SELECT *  FROM f_membres WHERE id = ?");
			// 			$posteur->execute(array($topic['id_createur']));
			// 			$posteur = $posteur->fetch();
      //
			// 			/********* Envoie du mail *********/
      //
			// 			$header = "MIME-Version: 1.0\r\n";
			// 			$header .= 'From: "Forum.com" <support@forum.com>'."\n";
			// 			$header .= 'Content-Type:text/html; charset="utf-8"'."\n";
			// 			$header .= 'Content-Transfer-Encoding: 8bit';
      //
			// 			$message = '
			// 			<html>
			// 				<body>
			// 					<h4 align="center">Bonjour '.get_pseudo($topic['id_createur']).'!</h4>
			// 					<p align="center">
			// 						Un membre du forum a répondu à votre topic "'.$topic['sujet'].'".<br>Pour consulter sa réponse veuillez cliquer <a href="http://localhost:8888/Forum/php/topic.php?titre='.$_GET['titre'].'&id='.$_GET['id'].'&page='.$_GET['page'].'">ici</a>.
			// 					</p>
			// 				</body>
			// 			</html>
			// 			';
      //
			// 			mail($posteur['mail'], "Il y a nouveau sur le forum", $header, $message);
			// 		}
			// 	}
			// 	else
			// 		$reponse_msg = "Votre réponse ne peut pas être vide";
			// }


			if (isset($_GET['page']) && $_GET['page'] > 1) {
				$reponsesParPage = 8;
			}
			else
				$reponsesParPage = 7;

			$requeteReponsesTotales = $bdd->prepare("SELECT * FROM t_message_mess WHERE top_id = ?");
			$requeteReponsesTotales->execute(array($get_id));
			$reponsesTotales = $requeteReponsesTotales->rowCount();
			$pagesTotales = ceil($reponsesTotales/$reponsesParPage);

			if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0) {

				$_GET['page'] = intval($_GET['page']);
				$pageCourante = $_GET['page'];
			}

			$depart = ($pageCourante-1)*$reponsesParPage;

      if($pageCourante == 2)
        $depart = $depart-1;

			$reponses = $bdd->prepare('SELECT * FROM t_message_mess WHERE top_id = ? LIMIT '.$depart.', '.$reponsesParPage.'');
			$reponses->execute(array($get_id));
		}
		else
			header("Location: ../vues/erreur.vue.php");
	}
	else
		header("Location: ../vues/erreur.vue.php");
?>
