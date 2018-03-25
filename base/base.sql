-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 25 mars 2018 à 22:18
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_platuniv`
--

-- --------------------------------------------------------

--
-- Structure de la table `tj_appartenance_app`
--

DROP TABLE IF EXISTS `tj_appartenance_app`;
CREATE TABLE IF NOT EXISTS `tj_appartenance_app` (
  `gr_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  PRIMARY KEY (`gr_id`,`mem_id`),
  KEY `fk_appartenance_mem_id` (`mem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tj_topictheme_topth`
--

DROP TABLE IF EXISTS `tj_topictheme_topth`;
CREATE TABLE IF NOT EXISTS `tj_topictheme_topth` (
  `topth_id` int(11) NOT NULL AUTO_INCREMENT,
  `top_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sscat_id` int(11) NOT NULL,
  PRIMARY KEY (`topth_id`),
  KEY `fk_topictheme_top_id` (`top_id`),
  KEY `fk_topictheme_cat_id` (`cat_id`),
  KEY `fk_topictheme_sscat_id` (`sscat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tj_topictheme_topth`
--

INSERT INTO `tj_topictheme_topth` (`topth_id`, `top_id`, `cat_id`, `sscat_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 1, 1),
(6, 6, 1, 1),
(7, 7, 1, 1),
(8, 8, 1, 1),
(9, 9, 1, 1),
(10, 10, 1, 1),
(11, 11, 1, 1),
(12, 12, 1, 1),
(13, 12, 1, 1),
(14, 12, 1, 1),
(15, 12, 1, 1),
(16, 12, 1, 1),
(17, 13, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie_cat`
--

DROP TABLE IF EXISTS `t_categorie_cat`;
CREATE TABLE IF NOT EXISTS `t_categorie_cat` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `for_id` int(11) NOT NULL,
  `cat_nom` varchar(32) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `fk_categorie_for_id` (`for_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_categorie_cat`
--

INSERT INTO `t_categorie_cat` (`cat_id`, `for_id`, `cat_nom`, `cat_description`) VALUES
(1, 1, 'ENSIAME', 'École d\'ingénieur'),
(2, 1, 'FLLASH', 'description'),
(3, 1, 'FDEG', 'description'),
(4, 1, 'FSMS', 'description'),
(5, 1, 'IAE', 'Description'),
(6, 1, 'IPAG', 'Description'),
(7, 1, 'ISTV', 'Description'),
(8, 1, 'IUT', 'Description'),
(9, 1, 'Bibliothèques', 'Description');

-- --------------------------------------------------------

--
-- Structure de la table `t_domaine_dom`
--

DROP TABLE IF EXISTS `t_domaine_dom`;
CREATE TABLE IF NOT EXISTS `t_domaine_dom` (
  `dom_id` int(11) NOT NULL AUTO_INCREMENT,
  `dom_nom` varchar(255) NOT NULL,
  PRIMARY KEY (`dom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_domaine_dom`
--

INSERT INTO `t_domaine_dom` (`dom_id`, `dom_nom`) VALUES
(1, 'Arts, lettres, langues (ALL)'),
(2, 'Droit, économie, gestion (DEG)'),
(3, 'Santé (S)'),
(4, 'Sciences humaines et sociales (SHS)'),
(5, 'Sciences technologies (ST)'),
(6, 'Sciences et techniques des activités physiques et sportives (STAPS)');

-- --------------------------------------------------------

--
-- Structure de la table `t_formation_form`
--

DROP TABLE IF EXISTS `t_formation_form`;
CREATE TABLE IF NOT EXISTS `t_formation_form` (
  `form_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_nom` varchar(255) NOT NULL,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_formation_form`
--

INSERT INTO `t_formation_form` (`form_id`, `form_nom`) VALUES
(1, 'Débutant'),
(2, 'DUT / DEUST'),
(3, 'Licence générale / Licence professionnelle'),
(4, 'Master'),
(5, 'Diplôme d\'ingénieur / Mastère'),
(6, 'Doctorat');

-- --------------------------------------------------------

--
-- Structure de la table `t_forum_for`
--

DROP TABLE IF EXISTS `t_forum_for`;
CREATE TABLE IF NOT EXISTS `t_forum_for` (
  `for_id` int(11) NOT NULL AUTO_INCREMENT,
  `for_nom` varchar(32) NOT NULL,
  `for_priorite` int(11) NOT NULL,
  PRIMARY KEY (`for_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_forum_for`
--

INSERT INTO `t_forum_for` (`for_id`, `for_nom`, `for_priorite`) VALUES
(1, 'Composantes', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_grossierete_gross`
--

DROP TABLE IF EXISTS `t_grossierete_gross`;
CREATE TABLE IF NOT EXISTS `t_grossierete_gross` (
  `gross_id` int(11) NOT NULL AUTO_INCREMENT,
  `gross_mot` text NOT NULL,
  PRIMARY KEY (`gross_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_grossierete_gross`
--

INSERT INTO `t_grossierete_gross` (`gross_id`, `gross_mot`) VALUES
(1, 'connard'),
(2, 'pute');

-- --------------------------------------------------------

--
-- Structure de la table `t_groupe_gr`
--

DROP TABLE IF EXISTS `t_groupe_gr`;
CREATE TABLE IF NOT EXISTS `t_groupe_gr` (
  `gr_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_id` int(11) NOT NULL,
  `mat_id` int(11) NOT NULL,
  PRIMARY KEY (`gr_id`),
  KEY `fk_groupe_form_id` (`form_id`),
  KEY `fk_groupe_mat_id` (`mat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_matiere_mat`
--

DROP TABLE IF EXISTS `t_matiere_mat`;
CREATE TABLE IF NOT EXISTS `t_matiere_mat` (
  `mat_id` int(11) NOT NULL AUTO_INCREMENT,
  `mat_nom` varchar(255) NOT NULL,
  `dom_id` int(11) NOT NULL,
  PRIMARY KEY (`mat_id`),
  KEY `fk_matiere_dom_id` (`dom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_membre_mem`
--

DROP TABLE IF EXISTS `t_membre_mem`;
CREATE TABLE IF NOT EXISTS `t_membre_mem` (
  `mem_id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_nom` varchar(36) NOT NULL,
  `mem_prenom` varchar(32) NOT NULL,
  `mem_mail` varchar(320) NOT NULL,
  `mem_pwd` char(40) NOT NULL,
  `mem_administrateur` int(1) NOT NULL,
  `mem_date_inscription` date NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_membre_mem`
--

INSERT INTO `t_membre_mem` (`mem_id`, `mem_nom`, `mem_prenom`, `mem_mail`, `mem_pwd`, `mem_administrateur`, `mem_date_inscription`) VALUES
(1, 'pute', 'salope', 'salope@pute.com', '28ea55d6c22578e7a26e3a7769dcc3a74a1e34f1', 0, '2018-03-13'),
(2, 'Bacquet', 'Simon', 'simon.bacquet@mail.fr', '28ea55d6c22578e7a26e3a7769dcc3a74a1e34f1', 0, '2018-03-18'),
(3, 'Test', 'Test', 'test@test.fr', '51abb9636078defbf888d8457a7c76f85c8f114c', 0, '2018-03-24'),
(4, 'Lampe', 'Ronan', 'lampe.ronan@outlook.fr', '57698a857060b48a65ed5eee25bca82cc3d3e586', 1, '2018-03-25');

-- --------------------------------------------------------

--
-- Structure de la table `t_message_mess`
--

DROP TABLE IF EXISTS `t_message_mess`;
CREATE TABLE IF NOT EXISTS `t_message_mess` (
  `mess_id` int(11) NOT NULL AUTO_INCREMENT,
  `top_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `mess_contenu` text NOT NULL,
  `mess_date_post` datetime NOT NULL,
  `mess_date_edition` datetime DEFAULT NULL,
  PRIMARY KEY (`mess_id`),
  KEY `fk_message_top_id` (`top_id`),
  KEY `fk_message_mem_id` (`mem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_message_mess`
--

INSERT INTO `t_message_mess` (`mess_id`, `top_id`, `mem_id`, `mess_contenu`, `mess_date_post`, `mess_date_edition`) VALUES
(1, 1, 1, 'kdjddj', '2018-03-13 00:00:00', '2018-03-19 00:00:00'),
(2, 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-20 00:00:00', '2018-03-13 00:00:00'),
(3, 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-21 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-06 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 2, 'ohlhhhlhlhllhlhl', '2018-03-14 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 2, 'coucou', '2018-03-22 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 2, 'var_dump($depart);', '2018-03-21 00:00:00', '2018-03-21 00:00:00'),
(8, 1, 1, 'hgcccjckcvkvkgvv', '2018-03-14 00:00:00', '2018-03-29 00:00:00'),
(9, 1, 2, 'hello', '2018-03-20 00:00:00', '2018-03-30 00:00:00'),
(10, 1, 2, 'test', '2018-03-21 00:00:00', '2018-03-21 00:00:00'),
(11, 1, 1, 'mnmnmnmmnm', '2018-03-21 00:00:00', '2018-03-27 00:00:00'),
(12, 2, 2, 'test', '2018-03-12 00:00:00', '2018-03-26 00:00:00'),
(13, 2, 1, 'test', '2018-03-21 00:00:00', '2018-03-21 00:00:00'),
(14, 6, 2, 'hello', '2018-03-19 20:37:53', '0000-00-00 00:00:00'),
(15, 6, 2, 'ah désolé gros lourd', '2018-03-19 20:38:09', '0000-00-00 00:00:00'),
(16, 6, 2, 'ah désolé gros lourd', '2018-03-19 20:40:33', '0000-00-00 00:00:00'),
(17, 6, 2, 'ah désolé gros lourd', '2018-03-19 20:40:48', '0000-00-00 00:00:00'),
(18, 6, 2, '[b]ojgpjgmjgjg[/b] jjgjgjgjg', '2018-03-19 20:48:05', '0000-00-00 00:00:00'),
(19, 6, 2, '[b]tmkjyjmjmyjyjyjyjyyy[/b] [i]yyjyjyjyjyy[/i] [s]ylyjyjyjyjyjy ylkylkjyjyklyjy [/s]y:yj[url=http://google.com]yjyjyjyjyjy[/url]', '2018-03-19 20:49:42', '0000-00-00 00:00:00'),
(20, 6, 2, '[b]tmkjyjmjmyjyjyjyjyyy[/b] [i]yyjyjyjyjyy[/i] [s]ylyjyjyjyjyjy ylkylkjyjyklyjy [/s]y:yj[url=http://google.com]yjyjyjyjyjy[/url]', '2018-03-19 20:51:35', '0000-00-00 00:00:00'),
(21, 6, 2, '[b]tmkjyjmjmyjyjyjyjyyy[/b] [i]yyjyjyjyjyy[/i] [s]ylyjyjyjyjyjy ylkylkjyjyklyjy [/s]y:yj[url=http://google.com]yjyjyjyjyjy[/url]', '2018-03-19 20:51:52', '0000-00-00 00:00:00'),
(22, 6, 2, '[moncode]funciton myFunction($toto) {\r\n   ﻿\r\n   ﻿return $toto;\r\n}[/moncode]', '2018-03-19 20:55:48', '0000-00-00 00:00:00'),
(23, 5, 2, '[b]Lourd gros t\'as essayé de mettre du beurre ?[/b] [u][i]ou d\'utiliser cette fonction ?[/i][/u]\r\n\r\n[moncode]function sortirLesCouillesDuGrillePain($couilles){\r\n\r\n   ﻿return $couilles;\r\n}[/moncode]', '2018-03-19 21:02:12', '0000-00-00 00:00:00'),
(24, 5, 2, '[img]http://www.noelshack.com/2018-12-1-1521484739-df.png[/img]ah ouais sympa \r\n', '2018-03-19 21:12:34', '0000-00-00 00:00:00'),
(25, 5, 2, '[img]http://www.noelshack.com/2018-12-1-1521484739-df.png[/img]ah ouais sympa \r\n', '2018-03-19 21:15:56', '0000-00-00 00:00:00'),
(26, 5, 2, 'heloo\r\n\r\n[img]http://www.noelshack.com/2018-12-1-1521484739-df.png[/img]', '2018-03-19 21:16:16', '0000-00-00 00:00:00'),
(27, 5, 2, 'coucou\r\n\r\n[img]http://www.noelshack.com/2018-12-1-1521489600-51ho57jkdgl-sx401-bo1-204-203-200.jpg[/img]', '2018-03-19 21:17:20', '0000-00-00 00:00:00'),
(28, 5, 2, '[url=https://www.youtube.com/watch?v=LPTlvQ1Zet0]coucou[/url]', '2018-03-19 21:19:12', '0000-00-00 00:00:00'),
(29, 6, 2, '[code-c]void fonction() {\r\n\r\n   ﻿int titi = 0;\r\n   return toto;   \r\n}[/code-c]', '2018-03-19 23:22:10', '0000-00-00 00:00:00'),
(30, 6, 2, '[code-php]function myFunction (){\r\n\r\n   ﻿$toto = 0;\r\n\r\n}[/code-php]', '2018-03-19 23:23:06', '0000-00-00 00:00:00'),
(31, 6, 2, '[code-php]function myFunction (){\r\n\r\n   ﻿$toto = 0;\r\n\r\n}[/code-php]', '2018-03-19 23:25:09', '0000-00-00 00:00:00'),
(32, 6, 2, '[code-php]function myFunction (){\r\n\r\n   ﻿$toto = 0;\r\n\r\n}[/code-php]', '2018-03-19 23:25:39', '0000-00-00 00:00:00'),
(33, 6, 2, '[code-php]﻿int main(){   int meilleurScore[5];       //Déclare un tableau de 5 int    double anglesTriangle[3];   //Déclare un tableau de 3 double   return 0;}[/code-php]', '2018-03-19 23:26:13', '0000-00-00 00:00:00'),
(34, 6, 2, 'int main() {\r\n   [code-cpp]int main() {\r\n   ﻿int meilleurScore[5];\r\n   ﻿//Déclare un tableau de 5 int \r\n\r\n   double anglesTriangle[3];\r\n   //Déclare un tableau de 3 double\r\n\r\n   return 0;\r\n}[/code-cpp]', '2018-03-19 23:27:08', '0000-00-00 00:00:00'),
(35, 6, 2, 'int main() {\r\n   [code-cpp]int main() {\r\n   ﻿int meilleurScore[5];\r\n   ﻿//Déclare un tableau de 5 int \r\n\r\n   double anglesTriangle[3];\r\n   //Déclare un tableau de 3 double\r\n\r\n   return 0;\r\n}[/code-cpp]', '2018-03-19 23:30:13', '0000-00-00 00:00:00'),
(36, 6, 2, 'int main() {\r\n   [code-cpp]int main() {\r\n   ﻿int meilleurScore[5];\r\n   ﻿//Déclare un tableau de 5 int \r\n\r\n   double anglesTriangle[3];\r\n   //Déclare un tableau de 3 double\r\n\r\n   return 0;\r\n}[/code-cpp]', '2018-03-19 23:30:33', '0000-00-00 00:00:00'),
(37, 6, 2, '[codejava]int nbre = (int)(Math.random()*336529);[/codejava]', '2018-03-19 23:32:50', '0000-00-00 00:00:00'),
(38, 6, 2, '[codephp]&lt;?php echo &quot;Cette ligne a été écrite \\&quot;uniquement\\&quot; en PHP.&quot;; ?&gt;[/codephp]', '2018-03-19 23:36:19', '0000-00-00 00:00:00'),
(39, 6, 2, '[codec]﻿double resultat = 0;    resultat = 5.0 / 2.0;printf (&quot;5 / 2 = %f&quot;, resultat);[/codec]', '2018-03-19 23:40:43', '0000-00-00 00:00:00'),
(40, 6, 2, '[codec]void main (){\r\n\r\n   ﻿int toto;\r\n}[/codec]', '2018-03-19 23:41:19', '0000-00-00 00:00:00'),
(41, 6, 2, '[codec]void main (){\r\n\r\n   ﻿int toto;\r\n}[/codec]', '2018-03-19 23:42:33', '0000-00-00 00:00:00'),
(42, 6, 2, '[codec]void main (){\r\n\r\n   ﻿int toto;\r\n}[/codec]', '2018-03-19 23:42:43', '0000-00-00 00:00:00'),
(43, 6, 2, '[codec]void main (){\r\n\r\n   ﻿int toto;\r\n}[/codec]', '2018-03-19 23:42:55', '0000-00-00 00:00:00'),
(44, 6, 2, '[codec]void main (){\r\n\r\n   ﻿int toto;\r\n}[/codec]', '2018-03-19 23:43:19', '0000-00-00 00:00:00'),
(45, 6, 2, '[codec]void main (){\r\n\r\n   ﻿int toto;\r\n}[/codec]', '2018-03-19 23:53:58', '0000-00-00 00:00:00'),
(46, 6, 2, '[codepython]def table(nb, max=10):\r\n    &quot;&quot;&quot;Fonction affichant la table de multiplication par nb de\r\n    1 * nb jusqu\'à max * nb&quot;&quot;&quot;\r\n    i = 0\r\n    while i &lt; max:\r\n        print(i + 1, &quot;*&quot;, nb, &quot;=&quot;, (i + 1) * nb)\r\n        i += 1[/codepython]', '2018-03-20 00:05:24', '0000-00-00 00:00:00'),
(47, 6, 2, '[codepython]def table(nb, max=10):\r\n    &quot;&quot;&quot;Fonction affichant la table de multiplication par nb de\r\n    1 * nb jusqu\'à max * nb&quot;&quot;&quot;\r\n    i = 0\r\n    while i &lt; max:\r\n        print(i + 1, &quot;*&quot;, nb, &quot;=&quot;, (i + 1) * nb)\r\n        i += 1[/codepython]', '2018-03-20 00:06:04', '0000-00-00 00:00:00'),
(48, 6, 2, '[codepython]def table(nb, max=10):\r\n    &quot;&quot;&quot;Fonction affichant la table de multiplication par nb de\r\n    1 * nb jusqu\'à max * nb&quot;&quot;&quot;\r\n    i = 0\r\n    while i &lt; max:\r\n        print(i + 1, &quot;*&quot;, nb, &quot;=&quot;, (i + 1) * nb)\r\n        i += 1[/codepython]', '2018-03-20 00:06:50', '0000-00-00 00:00:00'),
(49, 6, 2, '[codepython]def table(nb, max=10):\r\n    &quot;&quot;&quot;Fonction affichant la table de multiplication par nb de\r\n    1 * nb jusqu\'à max * nb&quot;&quot;&quot;\r\n    i = 0\r\n    while i &lt; max:\r\n        print(i + 1, &quot;*&quot;, nb, &quot;=&quot;, (i + 1) * nb)\r\n        i += 1[/codepython]', '2018-03-20 00:18:34', '0000-00-00 00:00:00'),
(50, 6, 2, '[codesql]SELECT ITM.ITM_ID, PRG.PRG_ID, PRG_TEXTE, TPG_LIBELLE,       CASE          WHEN TPG.TPG_ID = 1               THEN \' \' +COALESCE(CAST(PRG_ORDRE AS VARCHAR(32)),\'\')          ELSE \'\'       END AS TEXTE,       PRG_ORDRE\r\n       \r\nFROM   T_ITEM_ITM ITM       LEFT OUTER JOIN T_PARAGRAPHE_PRG PRG            ON ITM.ITM_ID = PRG.ITM_ID            LEFT OUTER JOIN TR_TYPE_PARAGRAPHE_TPG TPG                 ON PRG.TPG_ID = TPG.TPG_ID       LEFT OUTER JOIN TR_STYLE_ITEM_STI STI            ON ITM.STI_ID = STI.STI_IDORDER  BY ITM_BG, PRG_ORDRE[/codesql]', '2018-03-20 00:19:12', '0000-00-00 00:00:00'),
(51, 6, 2, 'hello', '2018-03-20 20:27:54', '0000-00-00 00:00:00'),
(52, 6, 2, 'hello', '2018-03-20 20:28:54', '0000-00-00 00:00:00'),
(53, 6, 2, 'hello', '2018-03-20 20:28:59', '0000-00-00 00:00:00'),
(54, 6, 2, 'hello', '2018-03-20 20:29:24', '0000-00-00 00:00:00'),
(55, 6, 2, 'hello', '2018-03-20 20:29:33', '0000-00-00 00:00:00'),
(56, 5, 2, 'hello\r\n', '2018-03-21 14:36:31', '0000-00-00 00:00:00'),
(57, 5, 2, 'tuto', '2018-03-21 14:36:37', '0000-00-00 00:00:00'),
(58, 6, 2, 'coucou', '2018-03-21 18:47:33', '0000-00-00 00:00:00'),
(59, 3, 2, 'rhrpr', '2018-03-21 18:48:07', '0000-00-00 00:00:00'),
(60, 6, 2, '[b]hello [/b][u]je suis la \r\n\r\n\r\n[/u][codec]void main(){\r\n\r\n}[/codec]', '2018-03-24 10:40:08', '0000-00-00 00:00:00'),
(61, 2, 2, 'hello je suis un con\r\n[b]tu m\'entends[/b]', '2018-03-24 10:51:11', '0000-00-00 00:00:00'),
(62, 2, 2, '**** de merde', '2018-03-24 10:51:27', '0000-00-00 00:00:00'),
(63, 2, 2, 'ok viens *******', '2018-03-24 10:51:37', '0000-00-00 00:00:00'),
(64, 2, 2, '[codec]void main {\r\n\r\n}[/codec]', '2018-03-24 10:52:27', '0000-00-00 00:00:00'),
(65, 6, 3, 'sorry bro', '2018-03-24 12:44:51', '0000-00-00 00:00:00'),
(66, 6, 3, '[codec]void main(){\r\n\r\n}[/codec]', '2018-03-24 12:59:22', '0000-00-00 00:00:00'),
(67, 9, 2, 'toto', '2018-03-24 14:05:42', '0000-00-00 00:00:00'),
(68, 9, 2, '[u]php[/u]', '2018-03-24 14:05:55', '0000-00-00 00:00:00'),
(69, 9, 2, '[u]php[/u]', '2018-03-24 14:08:02', '0000-00-00 00:00:00'),
(70, 13, 4, 'Ceci est une réponse !', '2018-03-25 20:17:13', NULL),
(71, 13, 3, 'Ceci est une autre réponse ! :D', '2018-03-25 20:55:03', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `t_questionreponse_qr`
--

DROP TABLE IF EXISTS `t_questionreponse_qr`;
CREATE TABLE IF NOT EXISTS `t_questionreponse_qr` (
  `qr_id` int(11) NOT NULL AUTO_INCREMENT,
  `qr_question` text NOT NULL,
  `qr_reponse` text NOT NULL,
  PRIMARY KEY (`qr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_questionreponse_qr`
--

INSERT INTO `t_questionreponse_qr` (`qr_id`, `qr_question`, `qr_reponse`) VALUES
(1, 'Bite de sang ou de chair ?', 'Sang !'),
(2, 'Est-ce que le projet se terminera un jour ?', 'Bien sûr (que non).');

-- --------------------------------------------------------

--
-- Structure de la table `t_question_quest`
--

DROP TABLE IF EXISTS `t_question_quest`;
CREATE TABLE IF NOT EXISTS `t_question_quest` (
  `quest_id` int(11) NOT NULL AUTO_INCREMENT,
  `mat_id` int(11) NOT NULL,
  `quest_intitule` text NOT NULL,
  `quest_reponse1` text NOT NULL,
  `quest_reponse2` text NOT NULL,
  `quest_reponse3` text NOT NULL,
  `quest_reponse4` text NOT NULL,
  `quest_reponse5` text NOT NULL,
  `quest_score1` int(3) NOT NULL,
  `quest_score2` int(3) NOT NULL,
  `quest_score3` int(3) NOT NULL,
  `quest_score4` int(3) NOT NULL,
  `quest_score5` int(3) NOT NULL,
  `quest_bonne_reponse1` text NOT NULL,
  `quest_bonne_reponse2` text NOT NULL,
  `quest_bonne_reponse3` text NOT NULL,
  `quest_bonne_reponse4` text NOT NULL,
  `quest_bonne_reponse5` text NOT NULL,
  `quest_type` varchar(8) NOT NULL,
  `form_id` int(11) NOT NULL,
  PRIMARY KEY (`quest_id`),
  KEY `fk_question_mat_id` (`mat_id`),
  KEY `fk_question_form_id` (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_reponse_rep`
--

DROP TABLE IF EXISTS `t_reponse_rep`;
CREATE TABLE IF NOT EXISTS `t_reponse_rep` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `quest_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `rep_resultat` int(11) NOT NULL,
  PRIMARY KEY (`rep_id`),
  KEY `fk_reponse_quest_id` (`quest_id`),
  KEY `fk_reponse_mem_id` (`mem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_souscategorie_sscat`
--

DROP TABLE IF EXISTS `t_souscategorie_sscat`;
CREATE TABLE IF NOT EXISTS `t_souscategorie_sscat` (
  `sscat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sscat_nom` varchar(255) NOT NULL,
  PRIMARY KEY (`sscat_id`),
  KEY `fk_souscategorie_cat_id` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_souscategorie_sscat`
--

INSERT INTO `t_souscategorie_sscat` (`sscat_id`, `cat_id`, `sscat_nom`) VALUES
(1, 1, 'toto');

-- --------------------------------------------------------

--
-- Structure de la table `t_topic_top`
--

DROP TABLE IF EXISTS `t_topic_top`;
CREATE TABLE IF NOT EXISTS `t_topic_top` (
  `top_id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_id` int(11) NOT NULL,
  `top_sujet` text NOT NULL,
  `top_contenu` text NOT NULL,
  `top_date_creation` datetime NOT NULL,
  `top_resolu` tinyint(1) NOT NULL DEFAULT '0',
  `top_notification` tinyint(1) NOT NULL,
  PRIMARY KEY (`top_id`),
  KEY `fk_topic_mem_id` (`mem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_topic_top`
--

INSERT INTO `t_topic_top` (`top_id`, `mem_id`, `top_sujet`, `top_contenu`, `top_date_creation`, `top_resolu`, `top_notification`) VALUES
(1, 1, 'toto', 'toto', '2018-03-14 00:00:00', 0, 0),
(2, 1, 'îfjf', 'jfjf', '2018-03-06 00:00:00', 0, 0),
(3, 2, 'Je cherche une pute', 'detresse', '2018-03-20 00:00:00', 0, 0),
(4, 2, 'Je cherche un poulet à enculer', 'balek', '2018-03-20 00:00:00', 0, 0),
(5, 2, 'Couilles coincées dans un grille pain', 'eeerrrffff', '2018-03-14 00:00:00', 0, 0),
(6, 2, 'Boule d\'escalier coincée dans le cul', 'hohfhfh', '2018-03-29 00:00:00', 0, 0),
(7, 2, 'hello', 'hello', '2018-03-24 14:03:50', 0, 0),
(8, 2, 'hello', 'hello', '2018-03-24 14:04:24', 0, 0),
(9, 2, 'sujet test', '[i]ceci [/i]est un [b]test[/b]\r\n\r\n[codephp]function toto(){\r\n\r\n}[/codephp]', '2018-03-24 14:04:55', 0, 0),
(10, 2, 'test2', 'heloo', '2018-03-24 14:09:09', 0, 1),
(11, 2, 'Hello j\'ai un pb', 'grosses couilles', '2018-03-24 14:24:24', 0, 0),
(12, 2, 'totopic', 'tititatadgfmbzkjf', '2018-03-24 14:26:13', 0, 0),
(13, 4, 'Remise des diplômes', 'blablablablabla', '2018-03-25 20:13:40', 0, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tj_appartenance_app`
--
ALTER TABLE `tj_appartenance_app`
  ADD CONSTRAINT `fk_appartenance_gr_id` FOREIGN KEY (`gr_id`) REFERENCES `t_groupe_gr` (`gr_id`),
  ADD CONSTRAINT `fk_appartenance_mem_id` FOREIGN KEY (`mem_id`) REFERENCES `t_membre_mem` (`mem_id`);

--
-- Contraintes pour la table `tj_topictheme_topth`
--
ALTER TABLE `tj_topictheme_topth`
  ADD CONSTRAINT `fk_topictheme_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `t_categorie_cat` (`cat_id`),
  ADD CONSTRAINT `fk_topictheme_sscat_id` FOREIGN KEY (`sscat_id`) REFERENCES `t_souscategorie_sscat` (`sscat_id`),
  ADD CONSTRAINT `fk_topictheme_top_id` FOREIGN KEY (`top_id`) REFERENCES `t_topic_top` (`top_id`);

--
-- Contraintes pour la table `t_categorie_cat`
--
ALTER TABLE `t_categorie_cat`
  ADD CONSTRAINT `fk_categorie_for_id` FOREIGN KEY (`for_id`) REFERENCES `t_forum_for` (`for_id`);

--
-- Contraintes pour la table `t_groupe_gr`
--
ALTER TABLE `t_groupe_gr`
  ADD CONSTRAINT `fk_groupe_form_id` FOREIGN KEY (`form_id`) REFERENCES `t_formation_form` (`form_id`),
  ADD CONSTRAINT `fk_groupe_mat_id` FOREIGN KEY (`mat_id`) REFERENCES `t_matiere_mat` (`mat_id`);

--
-- Contraintes pour la table `t_matiere_mat`
--
ALTER TABLE `t_matiere_mat`
  ADD CONSTRAINT `fk_matiere_dom_id` FOREIGN KEY (`dom_id`) REFERENCES `t_domaine_dom` (`dom_id`);

--
-- Contraintes pour la table `t_message_mess`
--
ALTER TABLE `t_message_mess`
  ADD CONSTRAINT `fk_message_mem_id` FOREIGN KEY (`mem_id`) REFERENCES `t_membre_mem` (`mem_id`),
  ADD CONSTRAINT `fk_message_top_id` FOREIGN KEY (`top_id`) REFERENCES `t_topic_top` (`top_id`);

--
-- Contraintes pour la table `t_question_quest`
--
ALTER TABLE `t_question_quest`
  ADD CONSTRAINT `fk_question_form_id` FOREIGN KEY (`form_id`) REFERENCES `t_formation_form` (`form_id`),
  ADD CONSTRAINT `fk_question_mat_id` FOREIGN KEY (`mat_id`) REFERENCES `t_matiere_mat` (`mat_id`);

--
-- Contraintes pour la table `t_reponse_rep`
--
ALTER TABLE `t_reponse_rep`
  ADD CONSTRAINT `fk_reponse_mem_id` FOREIGN KEY (`mem_id`) REFERENCES `t_membre_mem` (`mem_id`),
  ADD CONSTRAINT `fk_reponse_quest_id` FOREIGN KEY (`quest_id`) REFERENCES `t_question_quest` (`quest_id`);

--
-- Contraintes pour la table `t_souscategorie_sscat`
--
ALTER TABLE `t_souscategorie_sscat`
  ADD CONSTRAINT `fk_souscategorie_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `t_categorie_cat` (`cat_id`);

--
-- Contraintes pour la table `t_topic_top`
--
ALTER TABLE `t_topic_top`
  ADD CONSTRAINT `fk_topic_mem_id` FOREIGN KEY (`mem_id`) REFERENCES `t_membre_mem` (`mem_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
