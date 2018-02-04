-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Dim 04 Février 2018 à 13:45
-- Version du serveur :  5.6.34
-- Version de PHP :  7.1.0

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
-- Index pour les tables exportées
--

--
-- Index pour la table `tj_topic_theme_topt`
--
ALTER TABLE `tj_topic_theme_topt`
  ADD PRIMARY KEY (`topt_id`);

--
-- Index pour la table `t_categorie_cat`
--
ALTER TABLE `t_categorie_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `t_composante_comp`
--
ALTER TABLE `t_composante_comp`
  ADD PRIMARY KEY (`comp_id`);

--
-- Index pour la table `t_formation_form`
--
ALTER TABLE `t_formation_form`
  ADD PRIMARY KEY (`form_id`);

--
-- Index pour la table `t_membre_mem`
--
ALTER TABLE `t_membre_mem`
  ADD PRIMARY KEY (`mem_id`);

--
-- Index pour la table `t_message_mess`
--
ALTER TABLE `t_message_mess`
  ADD PRIMARY KEY (`mess_id`);

--
-- Index pour la table `t_topic_top`
--
ALTER TABLE `t_topic_top`
  ADD PRIMARY KEY (`top_id`);

--
-- AUTO_INCREMENT pour les tables exportées
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
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_formation_form`
--
ALTER TABLE `t_formation_form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_membre_mem`
--
ALTER TABLE `t_membre_mem`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT;
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
