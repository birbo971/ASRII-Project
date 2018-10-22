-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 22 Octobre 2018 à 12:14
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `asrii`
--

-- --------------------------------------------------------

--
-- Structure de la table `ajout_projet`
--

CREATE TABLE `ajout_projet` (
  `id` int(11) NOT NULL,
  `id_entreprise` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text,
  `etat` enum('en attente','refuse','valide','') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ajout_projet`
--

INSERT INTO `ajout_projet` (`id`, `id_entreprise`, `nom`, `email`, `titre`, `description`, `etat`) VALUES
(1, 7, '5', '5@5.fr', '5', '5', 'valide');

-- --------------------------------------------------------

--
-- Structure de la table `ajout_stage`
--

CREATE TABLE `ajout_stage` (
  `id` int(11) NOT NULL,
  `id_entreprise` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `experience` float NOT NULL,
  `etat` enum('en attente','valide','refuse','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ajout_stage`
--

INSERT INTO `ajout_stage` (`id`, `id_entreprise`, `nom`, `email`, `titre`, `description`, `experience`, `etat`) VALUES
(1, 1, '1', '1@1.fr', 'Développement d\'Une Application de Gestion d\'Images pour la Sélection Végétale H/F', 'Groupe coopératif international, créé et dirigé par des agriculteurs français, Limagrain fait progresser l\'agriculture pour répondre aux enjeux alimentaires. Créateur et producteur de variétés végétales et céréalières, le Groupe commercialise des semences de grandes cultures, des semences potagères et des produits céréaliers, destinés aux agriculteurs, aux maraîchers, aux jardiniers amateurs ainsi qu\'aux professionnels de l\'agroalimentaire et aux consommateurs.', 1, 'valide'),
(2, 7, '1', '1@1.frttttt', 'Concepteur développeur Web Mobile H/F', 'Sogeti France - Pour répondre à l\'attente de nos clients grands comptes nationaux et internationaux, nous recherchons des Concepteurs Développeurs Web Mobile.  En tant que concepteur développeur Web mobile (H/F), vos principales missions consisteront à :  Appréhender les solutions techniques complexes et variées existantes ; Mener la conception de solutions techniques applicatives ; Rédiger les dossiers de conception technique ; Organiser et coordonner les ateliers de travail pour la conception et validation des solutions ; Assurer les développements, les tests unitaires et les tests d\'assemblage ; Assister les équipes de maîtrise d\'ouvrage fonctionnelle et de qualification ; Assurer le reporting auprès de la hiérarchie.', 1, 'valide'),
(3, 7, 'ertsdt', 'test@test.fr', 'te', 'ert', 5, 'refuse');

-- --------------------------------------------------------

--
-- Structure de la table `emploi_du_temps`
--

CREATE TABLE `emploi_du_temps` (
  `id_user` int(11) NOT NULL,
  `id_horaires` int(11) NOT NULL,
  `id_matieres` int(11) NOT NULL,
  `plage_horaire` enum('matin','apres-midi','','') NOT NULL,
  `date_horaire` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `entreprise` (
  `id_entr` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id_matiere` int(11) NOT NULL,
  `id_ens` int(11) NOT NULL,
  `matieres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `notes` (
  `notes` varchar(255) NOT NULL,
  `id_notes` int(11) NOT NULL,
  `id_enseignant` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notes`
--

INSERT INTO `notes` (`notes`, `id_notes`, `id_enseignant`, `id_etudiant`) VALUES
('15/20', 1, 3, 1),
('16/20', 2, 4, 1),
('11/20', 3, 5, 1),
('19/20', 4, 2, 1),
('17/20', 5, 2, 1),
('14/20', 6, 2, 1),
('16/20', 7, 2, 1),
('15/20', 8, 2, 1),
('17/20', 9, 2, 6),
('16/20', 10, 2, 6),
('14', 11, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `personnel miaw`
--

CREATE TABLE `personnel miaw` (
  `id_pers` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `mdp` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `upload`
--

CREATE TABLE `upload` (
  `fileId` int(11) NOT NULL,
  `ens_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filesize` int(10) NOT NULL,
  `filetitle` varchar(255) NOT NULL,
  `filedescription` varchar(255) NOT NULL,
  `fileUrl` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `upload`
--

INSERT INTO `upload` (`fileId`, `ens_id`, `filename`, `filesize`, `filetitle`, `filedescription`, `fileUrl`) VALUES
(1, 2, 'Mini_ProjetI_Groupware_TCD.pdf', 159887, '', '', 'uploads/Mini_ProjetI_Groupware_TCD.pdf'),
(2, 2, 'ActionCouleur.class', 1295, '', '', 'uploads/ActionCouleur.class'),
(3, 2, 'Fenetre.class', 620, '', '', 'uploads/Fenetre.class');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_users` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` int(50) NOT NULL,
  `etat` enum('enseignant','entreprise','etudiant','personnel miaw') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_users`, `nom`, `prenom`, `email`, `mdp`, `etat`) VALUES
(1, 'Vignal', 'Brice', 'vignal.brice@gmail.com', 200597, 'etudiant'),
(2, 'Khalifa', 'Djemal', 'khalifa.djemal@gmail.com', 123456, 'enseignant'),
(3, 'Renard', 'Vincent', 'vincent.renard@ac-versailles.fr ', 6789, 'enseignant'),
(4, 'DELPLACE ', 'Benoit', 'benoit.delplace@edf.fr ', 789123, 'enseignant'),
(5, 'Mollica', 'Alain', 'alain.mollica@gmail.com ', 123, 'enseignant'),
(6, 'Puaud', 'Corentin', 'corentin.puaud@gmail.com', 150597, 'etudiant'),
(7, 'paul ', 'con', 'con@def.fr', 123456, 'entreprise'),
(8, 'test', 'olivier', 'oli@oli.fr', 123456, 'personnel miaw');

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
-- Index pour la table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`fileId`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ajout_projet`
--
ALTER TABLE `ajout_projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `ajout_stage`
--
ALTER TABLE `ajout_stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `emploi_du_temps`
--
ALTER TABLE `emploi_du_temps`
  MODIFY `id_horaires` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entr` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id_matiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id_notes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `personnel miaw`
--
ALTER TABLE `personnel miaw`
  MODIFY `id_pers` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `upload`
--
ALTER TABLE `upload`
  MODIFY `fileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
