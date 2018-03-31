<?php

  /**
   * Vérifie si une adresse email existe dans la bdd
   * @param  [string] $email [adresse e-mail à vérifier]
   * @return [boolean]        [existence de l'e-mail]
   */
  function existe_email($email) {

    global $bdd;
    $requete = $bdd->prepare("SELECT * FROM t_membre_mem WHERE mem_mail = ?");
		$requete->execute(array($email));
    $existe = $requete->rowCount();

    if($existe >= 1)
      return 1;
    else
      return 0;
  }

  /**
   * Insère un nouveau membre dans la bdd
   * @param  [string] $prenom [le prenom du membre]
   * @param  [string] $nom    [le nom du membre]
   * @param  [string] $email  [l'e-mail du membre]
   * @param  [string] $mdp    [le mot de passe du membre]
   */
  function inserer_membre($prenom, $nom, $email, $mdp){

    global $bdd;
    $requete = $bdd->prepare("INSERT INTO t_membre_mem(mem_nom, mem_prenom, mem_mail, mem_pwd, mem_administrateur, mem_date_inscription) VALUES (?, ?, ?, ?, ?, NOW())");
    $result = $requete->execute(array($nom, $prenom, $email, $mdp, 0));
    return $result;
  }

  /**
   * Renvoie l'existence d'un membre
   * @param  [string] $email [l'e-mail du membre]
   * @param  [string] $mdp   [le mdp du membre]
   * @return [boolean]        [l'existence du membre]
   */
  function existe_membre($email, $mdp){

    global $bdd;
    $requete = $bdd->prepare("SELECT * FROM t_membre_mem WHERE mem_mail = ? AND mem_pwd = ?");
		$requete->execute(array($email, $mdp));
		$existe = $requete->rowCount();

    if($existe >= 1){

      return 1;
    } else {

      return 0;
    }
  }

  /**
   * Renvoie les infos d'un membre selon son e-mail et son mdp
   * @param  [string] $email [l'e-mail du membre]
   * @param  [string] $mdp   [le mdp du membre]
   * @return [string]        [les infos du membre]
   */
  function getInfosMembre($email, $mdp){

    global $bdd;
    $requete = $bdd->prepare("SELECT * FROM t_membre_mem WHERE mem_mail = ? AND mem_pwd = ?");
		$requete->execute(array($email, $mdp));
    $mem_infos = $requete->fetch();

    return $mem_infos;
  }

  /**
   * Affiche une alerte Bootstrap
   * @param  [string] $titre   [titre de l'alerte]
   * @param  [string] $message [message de l'alerte]
   * @param  [tring] $type    [type de l'alerte]
   * @return [type]          [description]
   */
  function afficherAlerte($titre, $message, $type) {

    echo "<div class=\"alert alert-".$type." alert-dismissable fade show\" role=\"alert\">
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
            <strong>".$titre."</strong>".$message."
          </div>";
  }

  /**
   * [filtrerMots description]
   * @param  [type] $commentaire [description]
   * @return [type]              [description]
   */
  function filtrerMots($commentaire) {

    global $bdd;
    $requete = $bdd->query("SELECT * FROM t_grossierete_gross");

    $mots = []; //tableau de mots
    $rp = []; //tableau de remplaçants

    while($m = $requete->fetch()) {
      array_push($mots, $m['gross_mot']); //empile les valeurs dans le tableau
      $r = '';
      for($i=0;$i<strlen($m['gross_mot']);$i++){ //nombre d'* en fonction du nombre de caractères du mot filtré
        $r .= '*'; //concaténation
      }
      array_push($rp, $r);
    }

    $commentaire = str_replace($mots, $rp, $commentaire);

    return $commentaire;
  }

  /**
   * [get_nb_topics_categorie description]
   * @param  [type] $id_categorie [description]
   * @return [type]               [description]
   */
  function get_nb_topics_categorie($id_categorie){

    global $bdd;
    $nb_topics = $bdd->prepare("SELECT t_topic_top.top_id FROM t_topic_top INNER JOIN tj_topictheme_topth ON t_topic_top.top_id = tj_topictheme_topth.top_id WHERE tj_topictheme_topth.cat_id = ?");

    $nb_topics->execute(array($id_categorie));

    return $nb_topics->rowCount();
  }

  /**
   * [get_nb_posts_categorie description]
   * @param  [type] $id_categorie [description]
   * @return [type]               [description]
   */
  function get_nb_posts_categorie($id_categorie){

    global $bdd;
    $nb_posts = $bdd->prepare("SELECT t_message_mess.mess_id FROM t_message_mess INNER JOIN t_topic_top ON t_message_mess.top_id = t_topic_top.top_id INNER JOIN tj_topictheme_topth ON t_topic_top.top_id = tj_topictheme_topth.top_id WHERE tj_topictheme_topth.cat_id = ?");

    $nb_posts->execute(array($id_categorie));

    return $nb_posts->rowCount();
  }

  /**
   * [get_dernier_topic_categorie description]
   * @param  [type] $id_categorie [description]
   * @return [type]               [description]
   */
  function get_dernier_topic_categorie($id_categorie){

    global $bdd;

    $requete = $bdd->prepare("SELECT t_topic_top.top_sujet, t_topic_top.mem_id, t_topic_top.top_date_creation FROM t_topic_top INNER JOIN tj_topictheme_topth ON t_topic_top.top_id = tj_topictheme_topth.top_id WHERE tj_topictheme_topth.cat_id = ? ORDER BY t_topic_top.top_date_creation DESC LIMIT 0,1");
    $requete->execute(array($id_categorie));

    if($requete->rowCount() > 0){

      $requete = $requete->fetch();
      $dernier_topic = "".$requete['top_sujet'];
      $dernier_topic .= "<br/> par <b><a href=\"./compte.vue.php?mem_id=".$requete['mem_id']."\">".get_nom_prenom_membre($requete['mem_id'])."</a><b>";
      $dernier_topic .= " ".date_format(date_create($requete['top_date_creation']), 'd/m/Y H:i');

    } else {

      $dernier_topic = "Aucun topic";
    }

    return $dernier_topic;
  }

  /**
   * [get_nom_prenom_membre description]
   * @param  [type] $id_membre [description]
   * @return [type]            [description]
   */
  function get_nom_prenom_membre($id_membre){

    global $bdd;

    $requete = $bdd->prepare("SELECT * FROM t_membre_mem WHERE t_membre_mem.mem_id = ?");
    $requete->execute(array($id_membre));
    $requete = $requete->fetch();

    return $requete['mem_prenom']." ".$requete['mem_nom'];
  }

  /**
   * [get_admin_membre description]
   * @param  [type] $id_membre [description]
   * @return [type]            [description]
   */
  function get_admin_membre($id_membre){

    global $bdd;

    $requete = $bdd->prepare("SELECT * FROM t_membre_mem WHERE t_membre_mem.mem_id = ?");
    $requete->execute(array($id_membre));
    $requete = $requete->fetch();

    return $requete['mem_administrateur'];
  }

  /**
   * [get_dernier_topics description]
   * @return [type] [description]
   */
  function get_derniers_topics(){

    global $bdd;
    $requete = $bdd->query("SELECT * FROM t_topic_top ORDER BY t_topic_top.top_date_creation DESC LIMIT 0,3");

    return $requete;
  }

  /**
   * [get_nb_topics_sscategorie description]
   * @param  [type] $id_sscategorie [description]
   * @return [type]                 [description]
   */
  function get_nb_topics_sscategorie($id_sscategorie){

    global $bdd;
    $nb_topics = $bdd->prepare("SELECT t_topic_top.top_id FROM t_topic_top INNER JOIN tj_topictheme_topth ON t_topic_top.top_id = tj_topictheme_topth.top_id WHERE tj_topictheme_topth.sscat_id = ?");

    $nb_topics->execute(array($id_sscategorie));

    return $nb_topics->rowCount();
  }

  /**
   * [get_nb_posts_sscategorie description]
   * @param  [type] $id_sscategorie [description]
   * @return [type]                 [description]
   */
  function get_nb_posts_sscategorie($id_sscategorie){

    global $bdd;
    $nb_posts = $bdd->prepare("SELECT t_message_mess.mess_id FROM t_message_mess INNER JOIN t_topic_top ON t_message_mess.top_id = t_topic_top.top_id INNER JOIN tj_topictheme_topth ON t_topic_top.top_id = tj_topictheme_topth.top_id WHERE tj_topictheme_topth.sscat_id = ?");

    $nb_posts->execute(array($id_sscategorie));

    return $nb_posts->rowCount();
  }

  /**
   * [get_dernier_topic_sscategorie description]
   * @param  [type] $id_sscategorie [description]
   * @return [type]                 [description]
   */
  function get_dernier_topic_sscategorie($id_sscategorie){

    global $bdd;

    $requete = $bdd->prepare("SELECT t_topic_top.top_sujet, t_topic_top.mem_id, t_topic_top.top_date_creation FROM t_topic_top INNER JOIN tj_topictheme_topth ON t_topic_top.top_id = tj_topictheme_topth.top_id WHERE tj_topictheme_topth.sscat_id = ? ORDER BY t_topic_top.top_date_creation DESC LIMIT 0,1");
    $requete->execute(array($id_sscategorie));

    if($requete->rowCount() > 0){

      $requete = $requete->fetch();
      $dernier_topic = "".$requete['top_sujet'];
      $dernier_topic .= "<br/> par <b><a href=\"./compte.vue.php?mem_id=".$requete['mem_id']."\">".get_nom_prenom_membre($requete['mem_id'])."</a><b>";
      $dernier_topic .= " ".date_format(date_create($requete['top_date_creation']), 'd/m/Y H:i');

    } else {

      $dernier_topic = "Aucun topic";
    }

    return $dernier_topic;
  }

  /**
   * [get_derniere_rep_topic description]
   * @param  [type] $top_id [description]
   * @return [type]         [description]
   */
  function get_derniere_rep_topic($top_id) {

    global $bdd;

    $requete = $bdd->prepare("SELECT mem_id, mess_date_post FROM t_message_mess WHERE top_id = ? ORDER BY mess_date_post DESC LIMIT 0,1");
    $requete->execute(array($top_id));

    if($requete->rowCount() > 0){

      $requete = $requete->fetch();
      $dernier_topic = "par <b><a href=\"./compte.vue.php?mem_id=".$requete['mem_id']."\">".get_nom_prenom_membre($requete['mem_id'])."</a></b><br/>";
      $dernier_topic .= " ".date_format(date_create($requete['mess_date_post']), 'd/m/Y H:i');

    } else {

      $dernier_topic = "Aucune réponse";
    }

    return $dernier_topic;
  }

  /**
   * [get_derniers_topics_categorie description]
   * @param  [type] $id_categorie [description]
   * @return [type]               [description]
   */
  function get_derniers_topics_categorie($id_categorie){

    global $bdd;
    $requete = $bdd->prepare("SELECT * FROM t_topic_top INNER JOIN tj_topictheme_topth ON t_topic_top.top_id = tj_topictheme_topth.top_id WHERE tj_topictheme_topth.cat_id = ? ORDER BY t_topic_top.top_date_creation DESC LIMIT 0,3");
    $requete->execute(array($id_categorie));

    return $requete;
  }

  /**
   * [get_nb_messages_topic description]
   * @param  [type] $id_topic [description]
   * @return [type]           [description]
   */
  function get_nb_messages_topic($id_topic){

   global $bdd;
   $requete = $bdd->prepare("SELECT t_message_mess.mess_id FROM t_message_mess LEFT JOIN t_topic_top ON t_message_mess.top_id = t_topic_top.top_id WHERE t_topic_top.top_id = ?");
   $requete->execute(array($id_topic));

   return $requete->rowCount();
  }

  /**
   * [get_derniers_topics_sscategorie description]
   * @param  [type] $id_sscategorie [description]
   * @return [type]                 [description]
   */
  function get_derniers_topics_sscategorie($id_sscategorie){

    global $bdd;
    $requete = $bdd->prepare("SELECT * FROM t_topic_top INNER JOIN tj_topictheme_topth ON t_topic_top.top_id = tj_topictheme_topth.top_id WHERE tj_topictheme_topth.sscat_id = ? ORDER BY t_topic_top.top_date_creation DESC LIMIT 0,3");
    $requete->execute(array($id_sscategorie));

    return $requete;
  }

  /**
   * [get_derniers_topics_membre description]
   * @param  [type] $mem_id [description]
   * @return [type]                 [description]
   */
  function get_derniers_topics_membre($mem_id){

    global $bdd;
    $requete = $bdd->prepare("SELECT * FROM t_topic_top WHERE mem_id = ? ORDER BY top_date_creation DESC");
    $requete->execute(array($mem_id));

    return $requete;
  }

  /**
   * [url_custom_encode description]
   * @param  [type] $titre [description]
   * @return [type]        [description]
   */
  function url_custom_encode($titre) {
  	$titre = htmlspecialchars($titre);
  	$find = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', 'Œ', 'œ', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', 'Š', 'š', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', 'Ÿ', '?', '?', '?', '?', 'Ž', 'ž', '?', 'ƒ', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');
       $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');
       $titre = str_replace($find, $replace, $titre);
       $titre = strtolower($titre);
     	 $mots = preg_split('/[^A-Z^a-z^0-9]+/', $titre);
       $encoded = "";
       foreach($mots as $mot) {

       	if(strlen($mot) >= 3 OR str_replace(['0','1','2','3','4','5','6','7','8','9'], '', $mot) != $mot) {
           $encoded .= $mot.'-';
        }
      }

     $encoded = substr($encoded, 0, -1);

     return $encoded;
  }

  /**
   * [get_categorie_topic description]
   * @param  [type] $id_topic [description]
   * @return [type]           [description]
   */
  function get_categorie_topic($id_topic){

    global $bdd;
    $categorie = $bdd->prepare("SELECT cat_nom FROM t_categorie_cat INNER JOIN tj_topictheme_topth ON t_categorie_cat.cat_id = tj_topictheme_topth.cat_id
    INNER JOIN t_topic_top ON tj_topictheme_topth.top_id = t_topic_top.top_id WHERE t_topic_top.top_id = ?");
    $categorie->execute(array($id_topic));

    $categorie = $categorie->fetch()['cat_nom'];

    return $categorie;
  }

  /**
   * [get_sscategorie_topic description]
   * @param  [type] $id_topic [description]
   * @return [type]           [description]
   */
  function get_sscategorie_topic($id_topic){

    global $bdd;
    $sscategorie = $bdd->prepare("SELECT sscat_nom FROM t_souscategorie_sscat INNER JOIN tj_topictheme_topth ON t_souscategorie_sscat.sscat_id = tj_topictheme_topth.sscat_id
    INNER JOIN t_topic_top ON tj_topictheme_topth.top_id = t_topic_top.top_id WHERE t_topic_top.top_id = ?");
    $sscategorie->execute(array($id_topic));

    $sscategorie = $sscategorie->fetch()['sscat_nom'];

    return $sscategorie;
  }

  /**
   * [get_dernieres_reponses description]
   * @param  [type] $id_membre [description]
   * @return [type]            [description]
   */
  function get_dernieres_reponses($id_membre){

    global $bdd;

    $requete = "SELECT *
                FROM (
                      SELECT t_message_mess.top_id, t_message_mess.mem_id, t_message_mess.mess_contenu, t_message_mess.mess_date_post
                      FROM t_message_mess WHERE t_message_mess.mem_id <> ?
                      HAVING t_message_mess.mess_date_post
                      IN (SELECT MAX(t_message_mess.mess_date_post) FROM t_message_mess
                      GROUP BY t_message_mess.top_id)
                      ORDER BY t_message_mess.mess_date_post) d
                WHERE d.top_id
                IN (SELECT t_topic_top.top_id
                    FROM t_topic_top
                    WHERE t_topic_top.mem_id = ?)";

    $messages = $bdd->prepare($requete);
    $messages->execute(array($id_membre, $id_membre));

    return $messages;
  }

  /**
   * [get_sujet_topic description]
   * @param  [type] $id_topic [description]
   * @return [type]           [description]
   */
  function get_sujet_topic($id_topic){

    global $bdd;

    $sujet = $bdd->prepare("SELECT t_topic_top.top_sujet FROM t_topic_top WHERE t_topic_top.top_id = ?");
    $sujet->execute(array($id_topic));
    $sujet = $sujet->fetch()['top_sujet'];

    return $sujet;
  }

  /**
   * [get_id_sscategorie_topic description]
   * @param  [type] $id_topic [description]
   * @return [type]           [description]
   */
  function get_id_sscategorie_topic($id_topic){

    global $bdd;

    $id = $bdd->prepare("SELECT tj_topictheme_topth.sscat_id FROM tj_topictheme_topth WHERE tj_topictheme_topth.top_id = ?");
    $id->execute(array($id_topic));
    $id = $id->fetch()['sscat_id'];

    return $id;
  }

  /**
   * [existe_matiere description]
   * @return [type] [description]
   */
  function existe_matiere ($id_matiere) {

    global $bdd;

    $requete = $bdd->prepare("SELECT * FROM t_matiere_mat WHERE mat_id = ?");
    $requete->execute(array($id_matiere));

    if($requete->rowCount() > 0)
      return true;
    else
      return false;
  }

  /**
   * [existe_formation description]
   * @param  [type] $id_formation [description]
   * @return [type]               [description]
   */
  function existe_formation($id_formation){

    global $bdd;

    $requete = $bdd->prepare("SELECT * FROM t_formation_form WHERE form_id = ?");
    $requete->execute(array($id_formation));

    if($requete->rowCount() > 0)
      return true;
    else
      return false;
  }

  function getTypeQuestion($idQuestion){

    global $bdd;

    $type = $bdd->prepare("SELECT quest_type FROM t_question_quest WHERE quest_id = ?");
    $type->execute(array($idQuestion));
    $type = $type->fetch()['quest_type'];

    return $type;
  }

  function existeReponse($idMembre, $idQuestion){

    global $bdd;

    $requete = $bdd->prepare("SELECT * FROM t_reponse_rep WHERE mem_id = ? AND quest_id = ?");
    $requete->execute(array($idMembre, $idQuestion));

    if($requete->rowCount() > 0)
      return true;

    return false;
  }

  function getBonneReponseQCU($idQuestion){

    global $bdd;

    $requete = $bdd->prepare("SELECT * FROM t_question_quest WHERE quest_id = ?");
    $requete->execute(array($idQuestion));
    $data = $requete->fetch();

    if($data['quest_bonne_reponse1'] == 1)
      return 1;
    else if($data['quest_bonne_reponse2'] == 1)
      return 2;
    else if($data['quest_bonne_reponse3'] == 1)
      return 3;
    else if($data['quest_bonne_reponse4'] == 1)
      return 4;
    else if($data['quest_bonne_reponse5'] == 1)
      return 5;
  }

  /**
   * [getReponsesRadio description]
   * @param  [type] $reponse [description]
   * @return [type]          [description]
   */
  function getReponsesRadio ($reponse) {

		$reponsesRadio = array();

		switch ($reponse) {
			case 1:
				array_push($reponsesRadio, 1);
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				break;
			case 2:
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 1);
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				break;
			case 3:
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 1);
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				break;
			case 4:
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 1);
				array_push($reponsesRadio, 0);
				break;
			case 5:
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 1);
				break;
			default:
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				array_push($reponsesRadio, 0);
				break;
		}

		return $reponsesRadio;
	}

  function getBonnesReponsesQCM($idQuestion){

    global $bdd;
    $requete = $bdd->prepare("SELECT * FROM t_question_quest WHERE quest_id = ?");
    $requete->execute(array($idQuestion));
    $data = $requete->fetch();

    $bonnesReponses = array();

    if($data['quest_bonne_reponse1'] == 1)
      array_push($bonnesReponses, 1);
    if($data['quest_bonne_reponse2'] == 1)
      array_push($bonnesReponses, 2);
    if($data['quest_bonne_reponse3'] == 1)
      array_push($bonnesReponses, 3);
    if($data['quest_bonne_reponse4'] == 1)
      array_push($bonnesReponses, 4);
    if($data['quest_bonne_reponse5'] == 1)
      array_push($bonnesReponses, 5);

    return $bonnesReponses;
  }

  /**
   * [getReponsesCheckboxes description]
   * @param  [type] $reponses [description]
   * @return [type]           [description]
   */
  function getReponsesCheckboxes($reponses){

    $reponsesCheckboxes = array(0, 0, 0, 0, 0);

    foreach ($reponses as $r) {

      $reponsesCheckboxes[$r-1] = 1;
    }

    return $reponsesCheckboxes;
  }

  /**
   * [setScoreQuestion description]
   * @param [type] $idMembre   [description]
   * @param [type] $idQuestion [description]
   * @param [type] $score      [description]
   */
  function setScoreQuestion($idMembre, $idQuestion, $score){

    global $bdd;
    $requete = $bdd->prepare("INSERT INTO t_reponse_rep(quest_id, mem_id, rep_resultat) VALUES (?, ?, ?)");
    $requete->execute(array($idQuestion, $idMembre, $score));
  }

  /**
   * [updateScoreQuestion description]
   * @param  [type] $idMembre   [description]
   * @param  [type] $idQuestion [description]
   * @param  [type] $score      [description]
   * @return [type]             [description]
   */
  function updateScoreQuestion($idMembre, $idQuestion, $score){

    global $bdd;
    $requete = $bdd->prepare("UPDATE t_reponse_rep SET rep_resultat = ? WHERE mem_id = ? AND quest_id = ?");
    $requete->execute(array($score, $idMembre, $idQuestion));
  }

  function aReussiQuestion($idQuestion, $idMembre){

    global $bdd;
    $requete = $bdd->prepare("SELECT rep_resultat FROM t_reponse_rep WHERE quest_id = ? AND mem_id = ?");
    $requete->execute(array($idQuestion, $idMembre));
    $res = $requete->fetch()['rep_resultat'];

    if($res == 1)
      return true;

    return false;
  }


  /**
   * [getNomMatiere description]
   * @param  [type] $idMatiere [description]
   * @return [type]            [description]
   */
  function getNomMatiere($idMatiere){

    global $bdd;
    $nom = $bdd->prepare("SELECT mat_nom FROM t_matiere_mat WHERE mat_id = ?");
    $nom->execute(array($idMatiere));
    $nom = $nom->fetch()['mat_nom'];

    return $nom;
  }

  /**
   * [getNomFormation description]
   * @param  [type] $idFormation [description]
   * @return [type]              [description]
   */
  function getNomFormation($idFormation){

    global $bdd;
    $nom = $bdd->prepare("SELECT form_nom FROM t_formation_form WHERE form_id = ?");
    $nom->execute(array($idFormation));
    $nom = $nom->fetch()['form_nom'];

    return $nom;
  }

  function getScoreEvaluation($idMembre, $idMatiere, $idFormation){

    global $bdd;
    $score = $bdd->prepare("SELECT eval_resultat FROM tj_evaluation_eval WHERE mem_id = ? AND mat_id = ? AND form_id = ?");
    $score->execute(array($idMembre, $idMatiere, $idFormation));
    $score = $score->fetch()['eval_resultat'];

    return $score;
  }

?>
