-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 22 fév. 2018 à 22:20
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `bd_platuniv`
--

-- --------------------------------------------------------

--
-- Structure de la table `tj_topic_theme_topt`
--

CREATE TABLE `tj_topic_theme_topt` (
  `topt_id` int(11) NOT NULL,
  `top_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie_cat`
--

CREATE TABLE `t_categorie_cat` (
  `cat_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `cat_nom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_composante_comp`
--

CREATE TABLE `t_composante_comp` (
  `comp_id` int(11) NOT NULL,
  `comp_nom` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `t_composante_comp`
--

INSERT INTO `t_composante_comp` (`comp_id`, `comp_nom`) VALUES
(1, 'ENSIAME'),
(2, 'FFLASH'),
(3, 'FDEG'),
(4, 'FSMS'),
(5, 'IAE'),
(7, 'IPAG'),
(8, 'ISTV'),
(9, 'IUT'),
(10, 'Bibliothèques'),
(11, 'Divers');

-- --------------------------------------------------------

--
-- Structure de la table `t_formation_form`
--

CREATE TABLE `t_formation_form` (
  `form_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `form_nom` varchar(32) NOT NULL,
  `form_annee` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_membre_mem`
--

CREATE TABLE `t_membre_mem` (
  `mem_id` int(11) NOT NULL,
  `mem_nom` varchar(36) NOT NULL,
  `mem_prenom` varchar(32) NOT NULL,
  `mem_mail` varchar(320) NOT NULL,
  `mem_pwd` char(40) NOT NULL,
  `mem_administrateur` tinyint(1) NOT NULL,
  `mem_date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `t_membre_mem`
--

INSERT INTO `t_membre_mem` (`mem_id`, `mem_nom`, `mem_prenom`, `mem_mail`, `mem_pwd`, `mem_administrateur`, `mem_date_inscription`) VALUES
(1, 'Bacquet', 'Simon', 'bacquet.simon@outlook.fr', '28ea55d6c22578e7a26e3a7769dcc3a74a1e34f1', 0, '2018-02-18');

-- --------------------------------------------------------

--
-- Structure de la table `t_message_mess`
--

CREATE TABLE `t_message_mess` (
  `mess_id` int(11) NOT NULL,
  `top_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `mess_contenu` text NOT NULL,
  `mess_date_post` datetime NOT NULL,
  `mess_date_edition` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_topic_top`
--

CREATE TABLE `t_topic_top` (
  `top_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `top_sujet` text NOT NULL,
  `top_contenu` text NOT NULL,
  `top_date_creation` datetime NOT NULL,
  `top_resolu` tinyint(1) NOT NULL,
  `top_notification` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tj_topic_theme_topt`
--
ALTER TABLE `tj_topic_theme_topt`
  ADD PRIMARY KEY (`topt_id`),
  ADD KEY `FOREIGN` (`top_id`) USING BTREE,
  ADD KEY `FOREIGN_5` (`cat_id`),
  ADD KEY `FOREIGN_6` (`comp_id`);

--
-- Index pour la table `t_categorie_cat`
--
ALTER TABLE `t_categorie_cat`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `FOREIGN_4` (`comp_id`);

--
-- Index pour la table `t_composante_comp`
--
ALTER TABLE `t_composante_comp`
  ADD PRIMARY KEY (`comp_id`);

--
-- Index pour la table `t_formation_form`
--
ALTER TABLE `t_formation_form`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `FOREIGN_3` (`comp_id`);

--
-- Index pour la table `t_membre_mem`
--
ALTER TABLE `t_membre_mem`
  ADD PRIMARY KEY (`mem_id`);

--
-- Index pour la table `t_message_mess`
--
ALTER TABLE `t_message_mess`
  ADD PRIMARY KEY (`mess_id`),
  ADD KEY `FOREIGN_1` (`mem_id`),
  ADD KEY `FOREIGN_2` (`top_id`);

--
-- Index pour la table `t_topic_top`
--
ALTER TABLE `t_topic_top`
  ADD PRIMARY KEY (`top_id`),
  ADD KEY `FOREIGN` (`mem_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tj_topic_theme_topt`
--
ALTER TABLE `tj_topic_theme_topt`
  MODIFY `topt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_categorie_cat`
--
ALTER TABLE `t_categorie_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_composante_comp`
--
ALTER TABLE `t_composante_comp`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `t_formation_form`
--
ALTER TABLE `t_formation_form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_membre_mem`
--
ALTER TABLE `t_membre_mem`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_message_mess`
--
ALTER TABLE `t_message_mess`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_topic_top`
--
ALTER TABLE `t_topic_top`
  MODIFY `top_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tj_topic_theme_topt`
--
ALTER TABLE `tj_topic_theme_topt`
  ADD CONSTRAINT `FOREIGN_5` FOREIGN KEY (`cat_id`) REFERENCES `t_categorie_cat` (`cat_id`),
  ADD CONSTRAINT `FOREIGN_6` FOREIGN KEY (`comp_id`) REFERENCES `t_composante_comp` (`comp_id`),
  ADD CONSTRAINT `test` FOREIGN KEY (`top_id`) REFERENCES `t_topic_top` (`top_id`);

--
-- Contraintes pour la table `t_categorie_cat`
--
ALTER TABLE `t_categorie_cat`
  ADD CONSTRAINT `FOREIGN_4` FOREIGN KEY (`comp_id`) REFERENCES `t_composante_comp` (`comp_id`);

--
-- Contraintes pour la table `t_formation_form`
--
ALTER TABLE `t_formation_form`
  ADD CONSTRAINT `FOREIGN_3` FOREIGN KEY (`comp_id`) REFERENCES `t_composante_comp` (`comp_id`);

--
-- Contraintes pour la table `t_message_mess`
--
ALTER TABLE `t_message_mess`
  ADD CONSTRAINT `FOREIGN_1` FOREIGN KEY (`mem_id`) REFERENCES `t_membre_mem` (`mem_id`),
  ADD CONSTRAINT `FOREIGN_2` FOREIGN KEY (`top_id`) REFERENCES `t_topic_top` (`top_id`);

--
-- Contraintes pour la table `t_topic_top`
--
ALTER TABLE `t_topic_top`
  ADD CONSTRAINT `FOREIGN` FOREIGN KEY (`mem_id`) REFERENCES `t_membre_mem` (`mem_id`);
