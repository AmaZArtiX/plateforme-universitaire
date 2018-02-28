-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 28, 2018 at 10:42 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bd_platuniv`
--

-- --------------------------------------------------------

--
-- Table structure for table `tj_topictheme_topth`
--

CREATE TABLE `tj_topictheme_topth` (
  `topth_id` int(11) NOT NULL,
  `top_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sscat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_categorie_cat`
--

CREATE TABLE `t_categorie_cat` (
  `cat_id` int(11) NOT NULL,
  `for_id` int(11) NOT NULL,
  `cat_nom` varchar(32) NOT NULL,
  `cat_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_categorie_cat`
--

INSERT INTO `t_categorie_cat` (`cat_id`, `for_id`, `cat_nom`, `cat_description`) VALUES
(1, 1, 'ENSIAME', 'École d\'ingénieur'),
(2, 1, 'FFLASH', 'description'),
(3, 1, 'FDEG', 'description'),
(4, 1, 'FSMS', 'description'),
(5, 1, 'IAE', 'Description'),
(6, 1, 'IPAG', 'Description'),
(7, 1, 'ISTV', 'Description'),
(8, 1, 'IUT', 'Description'),
(9, 1, 'Bibliothèques', 'Description');

-- --------------------------------------------------------

--
-- Table structure for table `t_forum_for`
--

CREATE TABLE `t_forum_for` (
  `for_id` int(11) NOT NULL,
  `for_nom` varchar(32) NOT NULL,
  `for_priorite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_forum_for`
--

INSERT INTO `t_forum_for` (`for_id`, `for_nom`, `for_priorite`) VALUES
(1, 'Composantes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_membre_mem`
--

CREATE TABLE `t_membre_mem` (
  `mem_id` int(11) NOT NULL,
  `mem_nom` varchar(36) NOT NULL,
  `mem_prenom` varchar(32) NOT NULL,
  `mem_mail` varchar(320) NOT NULL,
  `mem_pwd` char(40) NOT NULL,
  `mem_administrateur` int(1) NOT NULL,
  `mem_date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_message_mess`
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
-- Table structure for table `t_souscategorie_sscat`
--

CREATE TABLE `t_souscategorie_sscat` (
  `sscat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sscat_nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_topic_top`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `tj_topictheme_topth`
--
ALTER TABLE `tj_topictheme_topth`
  ADD PRIMARY KEY (`topth_id`),
  ADD KEY `fk_topictheme_top_id` (`top_id`),
  ADD KEY `fk_topictheme_cat_id` (`cat_id`),
  ADD KEY `fk_topictheme_sscat_id` (`sscat`);

--
-- Indexes for table `t_categorie_cat`
--
ALTER TABLE `t_categorie_cat`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `fk_categorie_for_id` (`for_id`);

--
-- Indexes for table `t_forum_for`
--
ALTER TABLE `t_forum_for`
  ADD PRIMARY KEY (`for_id`);

--
-- Indexes for table `t_membre_mem`
--
ALTER TABLE `t_membre_mem`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `t_message_mess`
--
ALTER TABLE `t_message_mess`
  ADD PRIMARY KEY (`mess_id`),
  ADD KEY `fk_message_top_id` (`top_id`),
  ADD KEY `fk_message_mem_id` (`mem_id`);

--
-- Indexes for table `t_souscategorie_sscat`
--
ALTER TABLE `t_souscategorie_sscat`
  ADD PRIMARY KEY (`sscat_id`),
  ADD KEY `fk_souscategorie_cat_id` (`cat_id`);

--
-- Indexes for table `t_topic_top`
--
ALTER TABLE `t_topic_top`
  ADD PRIMARY KEY (`top_id`),
  ADD KEY `fk_topic_mem_id` (`mem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tj_topictheme_topth`
--
ALTER TABLE `tj_topictheme_topth`
  MODIFY `topth_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_categorie_cat`
--
ALTER TABLE `t_categorie_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_forum_for`
--
ALTER TABLE `t_forum_for`
  MODIFY `for_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_membre_mem`
--
ALTER TABLE `t_membre_mem`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_message_mess`
--
ALTER TABLE `t_message_mess`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_topic_top`
--
ALTER TABLE `t_topic_top`
  MODIFY `top_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tj_topictheme_topth`
--
ALTER TABLE `tj_topictheme_topth`
  ADD CONSTRAINT `fk_topictheme_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `t_categorie_cat` (`cat_id`),
  ADD CONSTRAINT `fk_topictheme_sscat_id` FOREIGN KEY (`sscat`) REFERENCES `t_souscategorie_sscat` (`sscat_id`),
  ADD CONSTRAINT `fk_topictheme_top_id` FOREIGN KEY (`top_id`) REFERENCES `t_topic_top` (`top_id`);

--
-- Constraints for table `t_categorie_cat`
--
ALTER TABLE `t_categorie_cat`
  ADD CONSTRAINT `fk_categorie_for_id` FOREIGN KEY (`for_id`) REFERENCES `t_forum_for` (`for_id`);

--
-- Constraints for table `t_message_mess`
--
ALTER TABLE `t_message_mess`
  ADD CONSTRAINT `fk_message_mem_id` FOREIGN KEY (`mem_id`) REFERENCES `t_membre_mem` (`mem_id`),
  ADD CONSTRAINT `fk_message_top_id` FOREIGN KEY (`top_id`) REFERENCES `t_topic_top` (`top_id`);

--
-- Constraints for table `t_souscategorie_sscat`
--
ALTER TABLE `t_souscategorie_sscat`
  ADD CONSTRAINT `fk_souscategorie_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `t_categorie_cat` (`cat_id`);

--
-- Constraints for table `t_topic_top`
--
ALTER TABLE `t_topic_top`
  ADD CONSTRAINT `fk_topic_mem_id` FOREIGN KEY (`mem_id`) REFERENCES `t_membre_mem` (`mem_id`);
