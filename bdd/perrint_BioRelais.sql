-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 14 Décembre 2017 à 13:28
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `perrint_BioRelais`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `mail` varchar(32) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `nom` char(32) DEFAULT NULL,
  `prenom` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `adherent`
--

INSERT INTO `adherent` (`mail`, `mdp`, `nom`, `prenom`) VALUES
('root', 'root', 'root', 'root');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_produit`
--

CREATE TABLE `categorie_produit` (
  `codecateg` varchar(3) NOT NULL,
  `libellecateg` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `mail` varchar(32) NOT NULL,
  `numcommande` varchar(3) NOT NULL,
  `annee` char(4) NOT NULL,
  `numerosemaine` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `mail` varchar(32) NOT NULL,
  `numcommande` varchar(3) NOT NULL,
  `codeproduit` char(4) NOT NULL,
  `quantite` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `producteur`
--

CREATE TABLE `producteur` (
  `mail` varchar(32) NOT NULL,
  `adresse` varchar(128) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `mdp` varchar(20) NOT NULL,
  `nom` char(32) DEFAULT NULL,
  `prenom` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `codeproduit` char(4) NOT NULL,
  `codecateg` varchar(3) NOT NULL,
  `mail` varchar(32) NOT NULL,
  `nomproduit` varchar(128) DEFAULT NULL,
  `descriptif` varchar(128) DEFAULT NULL,
  `unite` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `proposer`
--

CREATE TABLE `proposer` (
  `codeproduit` char(4) NOT NULL,
  `annee` char(4) NOT NULL,
  `numerosemaine` char(32) NOT NULL,
  `quantite` int(3) NOT NULL,
  `prix` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `semaine`
--

CREATE TABLE `semaine` (
  `annee` char(4) NOT NULL,
  `numerosemaine` char(32) NOT NULL,
  `datedebutcommande` date DEFAULT NULL,
  `datefincommande` date DEFAULT NULL,
  `datedebutsaisieproduits` char(32) DEFAULT NULL,
  `datefinsaisieproduits` char(32) DEFAULT NULL,
  `datevente` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`mail`);

--
-- Index pour la table `categorie_produit`
--
ALTER TABLE `categorie_produit`
  ADD PRIMARY KEY (`codecateg`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`mail`,`numcommande`),
  ADD KEY `fk_commande_semaine` (`annee`,`numerosemaine`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`mail`,`numcommande`,`codeproduit`),
  ADD KEY `fk_contenir_produit` (`codeproduit`);

--
-- Index pour la table `producteur`
--
ALTER TABLE `producteur`
  ADD PRIMARY KEY (`mail`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`codeproduit`),
  ADD KEY `fk_produit_categorie_produit` (`codecateg`),
  ADD KEY `fk_produit_producteur` (`mail`);

--
-- Index pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD PRIMARY KEY (`codeproduit`,`annee`,`numerosemaine`),
  ADD KEY `fk_proposer_semaine` (`annee`,`numerosemaine`);

--
-- Index pour la table `semaine`
--
ALTER TABLE `semaine`
  ADD PRIMARY KEY (`annee`,`numerosemaine`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_adherent` FOREIGN KEY (`mail`) REFERENCES `adherent` (`mail`),
  ADD CONSTRAINT `fk_commande_semaine` FOREIGN KEY (`annee`,`numerosemaine`) REFERENCES `semaine` (`annee`, `numerosemaine`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `fk_contenir_commande` FOREIGN KEY (`mail`,`numcommande`) REFERENCES `commande` (`mail`, `numcommande`),
  ADD CONSTRAINT `fk_contenir_produit` FOREIGN KEY (`codeproduit`) REFERENCES `produit` (`codeproduit`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_categorie_produit` FOREIGN KEY (`codecateg`) REFERENCES `categorie_produit` (`codecateg`),
  ADD CONSTRAINT `fk_produit_producteur` FOREIGN KEY (`mail`) REFERENCES `producteur` (`mail`);

--
-- Contraintes pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD CONSTRAINT `fk_proposer_produit` FOREIGN KEY (`codeproduit`) REFERENCES `produit` (`codeproduit`),
  ADD CONSTRAINT `fk_proposer_semaine` FOREIGN KEY (`annee`,`numerosemaine`) REFERENCES `semaine` (`annee`, `numerosemaine`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
