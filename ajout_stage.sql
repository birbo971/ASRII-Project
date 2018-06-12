-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 12 Juin 2018 à 10:25
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `asrii`
--

-- --------------------------------------------------------

--
-- Structure de la table `ajout_stage`
--

CREATE TABLE IF NOT EXISTS `ajout_stage` (
`id` int(11) NOT NULL,
  `id_entreprise` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `experience` float NOT NULL,
  `etat` enum('en attente','valide','refuse','') NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `ajout_stage`
--

INSERT INTO `ajout_stage` (`id`, `id_entreprise`, `nom`, `email`, `titre`, `description`, `experience`, `etat`) VALUES
(1, 1, '1', '1@1.fr', 'Développement d''Une Application de Gestion d''Images pour la Sélection Végétale H/F', 'Groupe coopératif international, créé et dirigé par des agriculteurs français, Limagrain fait progresser l''agriculture pour répondre aux enjeux alimentaires. Créateur et producteur de variétés végétales et céréalières, le Groupe commercialise des semences de grandes cultures, des semences potagères et des produits céréaliers, destinés aux agriculteurs, aux maraîchers, aux jardiniers amateurs ainsi qu''aux professionnels de l''agroalimentaire et aux consommateurs.', 1, 'valide'),
(2, 7, '1', '1@1.frttttt', '1', '1', 1, 'refuse'),
(3, 7, 'ertsdt', 'test@test.fr', 'te', 'ert', 5, 'en attente');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ajout_stage`
--
ALTER TABLE `ajout_stage`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ajout_stage`
--
ALTER TABLE `ajout_stage`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
