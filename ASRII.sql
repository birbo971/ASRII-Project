-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 01 Juin 2018 à 09:26
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
  `id_entreprise` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` text,
  `titre` varchar(255) DEFAULT NULL,
  `description` text,
  `etat` enum('en attente','refuse','valide','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `ajout_stage`
--

INSERT INTO `ajout_stage` (`id`, `id_entreprise`, `nom`, `email`, `titre`, `description`, `experience`, `etat`) VALUES
(1, 1, '1', '1@1.fr', '1', '1', 1, 'en attente');

-- --------------------------------------------------------

--
-- Structure de la table `emploi_du_temps`
--

CREATE TABLE IF NOT EXISTS `emploi_du_temps` (
  `id_user` int(11) NOT NULL,
`id_horaires` int(11) NOT NULL,
  `id_matieres` int(11) NOT NULL,
  `plage_horaire` enum('matin','apres-midi','','') NOT NULL,
  `date_horaire` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `emploi_du_temps`
--

INSERT INTO `emploi_du_temps` (`id_user`, `id_horaires`, `id_matieres`, `plage_horaire`, `date_horaire`) VALUES
(1, 1, 2, 'matin', '2018-06-18'),
(1, 2, 2, 'apres-midi', '2018-06-18'),
(1, 3, 5, 'matin', '2018-06-19'),
(1, 4, 5, 'apres-midi', '2018-06-19'),
(1, 5, 4, 'matin', '2018-06-20'),
(1, 6, 4, 'apres-midi', '2018-06-20'),
(1, 7, 3, 'matin', '2018-06-21'),
(1, 8, 3, 'apres-midi', '2018-06-21'),
(1, 9, 2, 'matin', '2018-06-22'),
(1, 10, 3, 'apres-midi', '2018-06-22');

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
-- Structure de la table `matieres`
--

CREATE TABLE IF NOT EXISTS `matieres` (
`id_matiere` int(11) NOT NULL,
  `id_ens` int(11) NOT NULL,
  `matieres` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `matieres`
--

INSERT INTO `matieres` (`id_matiere`, `id_ens`, `matieres`) VALUES
(1, 2, 'SHELL'),
(2, 3, 'PHP'),
(3, 4, 'SQL'),
(4, 5, 'JAVA');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `notes` varchar(255) NOT NULL,
`id_notes` int(11) NOT NULL,
  `id_enseignant` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `notes`
--

INSERT INTO `notes` (`notes`, `id_notes`, `id_enseignant`, `id_etudiant`) VALUES
('15/20', 1, 3, 1),
('16/20', 2, 4, 1),
('11/20', 3, 5, 1),
('11/20', 4, 2, 1);

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
-- Index pour la table `ajout_stage`
--
ALTER TABLE `ajout_stage`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
 ADD PRIMARY KEY (`id_horaires`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
 ADD PRIMARY KEY (`id_entr`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
 ADD PRIMARY KEY (`id_matiere`);

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
-- AUTO_INCREMENT pour la table `ajout_stage`
--
ALTER TABLE `ajout_stage`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
MODIFY `id_horaires` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
MODIFY `id_entr` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
MODIFY `id_matiere` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
