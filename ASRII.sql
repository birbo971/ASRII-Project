-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 01 Juin 2018 à 07:42
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
-- Structure de la table `ajout_projet`
--

CREATE TABLE IF NOT EXISTS `ajout_projet` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` text,
  `titre` varchar(255) DEFAULT NULL,
  `description` text,
  `etat` enum('en attente','refuse','valide','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `emploi_du_temps`
--

CREATE TABLE IF NOT EXISTS `emploi_du_temps` (
  `id_user` int(11) NOT NULL,
`id_horaires` int(11) NOT NULL,
  `horaires` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE IF NOT EXISTS `enseignant` (
`id_ens` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `matiere` varchar(255) NOT NULL,
  `mdp` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
`id_entr` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `notes` varchar(255) NOT NULL,
  `matieres` varchar(255) NOT NULL,
`id_notes` int(11) NOT NULL,
  `id_enseignant` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `notes`
--

INSERT INTO `notes` (`notes`, `matieres`, `id_notes`, `id_enseignant`, `id_etudiant`) VALUES
('15/20', 'PHP', 1, 3, 1),
('16/20', 'SQL', 2, 4, 1),
('11/20', 'JAVA', 3, 5, 1),
('11/20', 'SHELL', 4, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `personnel miaw`
--

CREATE TABLE IF NOT EXISTS `personnel miaw` (
`id_pers` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `mdp` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
`id_users` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` int(50) NOT NULL,
  `etat` enum('enseignant','entreprise','etudiant','personnel miaw') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_users`, `nom`, `prenom`, `email`, `mdp`, `etat`) VALUES
(1, 'Vignal', 'Brice', 'vignal.brice@gmail.com', 200597, 'etudiant'),
(2, 'Khalifa', 'Djemal', 'khalifa.djemal@gmail.com', 123456, 'enseignant'),
(3, 'Renard', 'Vincent', 'vincent.renard@ac-versailles.fr ', 6789, 'enseignant'),
(4, 'DELPLACE ', 'Benoit', 'benoit.delplace@edf.fr ', 789123, 'enseignant'),
(5, 'Mollica', 'Alain', 'alain.mollica@gmail.com ', 123, 'enseignant');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ajout_projet`
--
ALTER TABLE `ajout_projet`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
 ADD PRIMARY KEY (`id_horaires`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
 ADD PRIMARY KEY (`id_ens`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
 ADD PRIMARY KEY (`id_entr`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
 ADD PRIMARY KEY (`id_notes`);

--
-- Index pour la table `personnel miaw`
--
ALTER TABLE `personnel miaw`
 ADD PRIMARY KEY (`id_pers`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
 ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
MODIFY `id_horaires` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
MODIFY `id_ens` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
MODIFY `id_entr` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
MODIFY `id_notes` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `personnel miaw`
--
ALTER TABLE `personnel miaw`
MODIFY `id_pers` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
