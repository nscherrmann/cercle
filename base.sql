-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 16 Janvier 2014 à 20:41
-- Version du serveur: 5.5.33
-- Version de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `cotisant`
--

-- --------------------------------------------------------

--
-- Structure de la table `cotisants`
--

CREATE TABLE `cotisants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `date_cotiz` varchar(10) COLLATE utf8_bin NOT NULL,
  `login` varchar(20) COLLATE utf8_bin NOT NULL,
  `carte` varchar(5) COLLATE utf8_bin NOT NULL,
  `type` varchar(20) COLLATE utf8_bin NOT NULL,
  `annee` varchar(10) COLLATE utf8_bin NOT NULL,
  `mail` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

--
-- Contenu de la table `cotisants`
--

INSERT INTO `cotisants` (`id`, `nom`, `prenom`, `date_cotiz`, `login`, `carte`, `type`, `annee`, `mail`) VALUES
(1, 'Scherrmann', 'Nicolas', '10/10/2013', 'scherrma1u', 'oui', 'etudiant', '5A', 'scherrma1u@etu.univ-lorraine.fr'),
(2, 'Morel-Damy', 'Thibaud', '10/10/2013', 'morel1u', '1', 'Etu', '4A', ''),
(3, 'Dupond', 'Jean', '10/10/2013', 'dupond1u', '1', 'Etu', '1A', ''),
(5, 'Joffin', 'Clement', '10/10/2013', 'joffin1u', '1', 'Etu', '3A', ''),
(6, 'Petitjean', 'Arnaud', '10/10/2013', 'petitj18u', '1', 'Etu', 'Erasmus', ''),
(7, 'Gayet', 'Antonin', '20/10/2013', 'gayet1u', '1', 'etudiant', '5A', 'gayet1u@etu.univ-lorraine.fr'),
(8, 'Ludemann', 'Quentin', '22/12/2013', 'ludema1u', 'oui', 'etudiant', '3A', ''),
(9, 'Dupond', 'Pierre', '07/01/2014', 'dupond38u', 'oui', 'etudiant', '1A', ''),
(10, 'Durand', 'Mathieu', '07/01/2014', 'durand2u', 'oui', 'etudiant', '2A', ''),
(11, 'Mercy', 'Romain', '13/01/2014', '', 'oui', 'exterieur', 'Ext', 'romain.mercy@gmail.com'),
(16, 'Calendrier', 'Thomas', '13/01/2014', 'calendri1u', 'oui', 'etudiant', '5A', 'calendri1u@etu.univ-lorraine.fr'),
(17, 'Lecomte', 'Anne-Flore', '13/01/2014', 'lecomte23u', 'oui', 'etudiant', '5A', 'lecomte23u@etu.univ-lorraine.fr');

