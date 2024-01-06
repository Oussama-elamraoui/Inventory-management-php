-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 08 juin 2021 à 00:45
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_de_stockage`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email_client` text NOT NULL,
  `mobile_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `email_client`, `mobile_client`) VALUES
(1, '', '', '', 0),
(1, 'jkjkhl', 'jvv', 'bhvvj,,b,cvc', 54),
(1, 'kjjghgh', 'bjb', 'bnbnbn', 544242424);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `date_commande` datetime NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commander`
--

CREATE TABLE `commander` (
  `id_prd` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `comptable`
--

CREATE TABLE `comptable` (
  `id_comptable` int(255) NOT NULL,
  `nom_comp` varchar(255) NOT NULL,
  `prenom_comp` varchar(255) NOT NULL,
  `email_comp` text NOT NULL,
  `password_comp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comptable`
--

INSERT INTO `comptable` (`id_comptable`, `nom_comp`, `prenom_comp`, `email_comp`, `password_comp`) VALUES
(1, 'lyazidi', 'ayoub', '', ''),
(0, 'lyazidi', 'ayoub', 'lyazidiayoub@gmail.com', 'nccnjscnjscnjscn'),
(0, 'blabla', 'skafkaf', 'jnjcbsjcb@njsqbjqs.com', 'jnjnjnj'),
(0, '', '', '', ''),
(0, '', '', '', ''),
(0, '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `id_emp` int(255) NOT NULL,
  `nom_emp` varchar(255) NOT NULL,
  `prenom_emp` varchar(255) NOT NULL,
  `email_emp` text NOT NULL,
  `password_emp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id_emp`, `nom_emp`, `prenom_emp`, `email_emp`, `password_emp`) VALUES
(0, '$nom', '$prenom', '$email', '$pass');

-- --------------------------------------------------------

--
-- Structure de la table `enregistre`
--

CREATE TABLE `enregistre` (
  `id_emp` int(11) NOT NULL,
  `id_prd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `entre_stock`
--

CREATE TABLE `entre_stock` (
  `ref_entre` int(11) NOT NULL,
  `date_entre` datetime NOT NULL,
  `id_prd` int(11) NOT NULL,
  `num_lot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id_facture` int(11) NOT NULL,
  `date_facture` int(11) NOT NULL,
  `prix_totale` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `num_fournisseur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fournir`
--

CREATE TABLE `fournir` (
  `num_fournisseur` int(11) NOT NULL,
  `id_prd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `num_fournisseur` int(11) NOT NULL,
  `nom_f` varchar(255) NOT NULL,
  `mobile_f` int(15) NOT NULL,
  `adresse_f` text NOT NULL,
  `email_f` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

CREATE TABLE `gestionnaire` (
  `id_gestionnaire` int(255) NOT NULL,
  `nom_gest` varchar(255) NOT NULL,
  `prenom_gest` varchar(20) NOT NULL,
  `email_gest` text NOT NULL,
  `password_gest` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `gestionnaire`
--

INSERT INTO `gestionnaire` (`id_gestionnaire`, `nom_gest`, `prenom_gest`, `email_gest`, `password_gest`) VALUES
(545464, 'lyazidi', 'ayoub', 'lyazidiayoub@gmail.com', 'jfhqjdfhjqfj'),
(545466, 'lyazidi', 'ayoub', 'lyazidiayoub@gmail.com', 'jfhqjdfhjqfj'),
(545467, '', '', '', ''),
(545468, 'lyazidi', 'ayoub', 'lyazidiayoub@gmail.com', 'huhuhuhuhuhuhuh'),
(545469, 'lyazidi', 'ayoub', 'lyazidiayoub@gmail.com', 'dgergfgfgg'),
(545470, 'lyazidi', 'ayoub', 'lyazidiayoub@gmail.com', 'kjjnjnjn'),
(545471, 'lyazidi', 'ayoub', 'lyazidiayoub@gmail.com', 'kjjnjnjn'),
(545472, '', '', '', ''),
(545473, '', '', '', ''),
(545474, 'lyazidi', 'ayoub', 'lyazidiayoub@gmail.com', 'hfkdhvdkvhkdvh'),
(545475, '', '', '', ''),
(545476, '', '', '', ''),
(545477, '', '', '', ''),
(545478, '', '', '', ''),
(545479, '', '', '', ''),
(545480, '', '', '', ''),
(545481, '', '', '', ''),
(545482, 'blabla', 'skafkaf', 'jnjcbsjcb@njsqbjqs.com', ''),
(545483, 'blabla', 'skafkaf', 'jnjcbsjcb@njsqbjqs.com', ''),
(545484, 'blabla', 'skafkaf', 'jnjcbsjcb@njsqbjqs.com', ''),
(545485, 'blabla', 'skafkaf', 'jnjcbsjcb@njsqbjqs.com', '');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_prd` int(255) NOT NULL,
  `nom_prd` text NOT NULL,
  `date_exp` date NOT NULL,
  `prix_prd` float NOT NULL,
  `quantite_prd` int(11) NOT NULL,
  `code_barre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_prd`, `nom_prd`, `date_exp`, `prix_prd`, `quantite_prd`, `code_barre`) VALUES
(1, 'doliprane', '2021-06-06', 20, 10, 56466564),
(58, 'renomicine', '2024-06-07', 38, 50, 444545);

-- --------------------------------------------------------

--
-- Structure de la table `sortie_stock`
--

CREATE TABLE `sortie_stock` (
  `ref_sortie` int(11) NOT NULL,
  `date_sortie` datetime NOT NULL,
  `quantite_sort` int(11) NOT NULL,
  `id_prd` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `commander`
--
ALTER TABLE `commander`
  ADD PRIMARY KEY (`id_prd`,`id_client`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id_emp`);

--
-- Index pour la table `enregistre`
--
ALTER TABLE `enregistre`
  ADD PRIMARY KEY (`id_emp`,`id_prd`),
  ADD KEY `id_prd` (`id_prd`);

--
-- Index pour la table `entre_stock`
--
ALTER TABLE `entre_stock`
  ADD PRIMARY KEY (`ref_entre`),
  ADD KEY `id_prd` (`id_prd`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD KEY `id_client` (`id_client`),
  ADD KEY `num_fournisseur` (`num_fournisseur`),
  ADD KEY `id_facture` (`id_facture`);

--
-- Index pour la table `fournir`
--
ALTER TABLE `fournir`
  ADD PRIMARY KEY (`num_fournisseur`),
  ADD KEY `id_prd` (`id_prd`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD KEY `num_fournisseur` (`num_fournisseur`);

--
-- Index pour la table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  ADD PRIMARY KEY (`id_gestionnaire`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_prd`);

--
-- Index pour la table `sortie_stock`
--
ALTER TABLE `sortie_stock`
  ADD PRIMARY KEY (`ref_sortie`),
  ADD KEY `id_prd` (`id_prd`),
  ADD KEY `id_facture` (`id_facture`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entre_stock`
--
ALTER TABLE `entre_stock`
  MODIFY `ref_entre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournir`
--
ALTER TABLE `fournir`
  MODIFY `num_fournisseur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  MODIFY `id_gestionnaire` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=545486;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_prd` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `sortie_stock`
--
ALTER TABLE `sortie_stock`
  MODIFY `ref_sortie` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commander`
--
ALTER TABLE `commander`
  ADD CONSTRAINT `commander_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commander_ibfk_2` FOREIGN KEY (`id_prd`) REFERENCES `produit` (`id_prd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `enregistre`
--
ALTER TABLE `enregistre`
  ADD CONSTRAINT `enregistre_ibfk_1` FOREIGN KEY (`id_prd`) REFERENCES `produit` (`id_prd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enregistre_ibfk_2` FOREIGN KEY (`id_emp`) REFERENCES `employe` (`id_emp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entre_stock`
--
ALTER TABLE `entre_stock`
  ADD CONSTRAINT `entre_stock_ibfk_1` FOREIGN KEY (`id_prd`) REFERENCES `produit` (`id_prd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facture_ibfk_2` FOREIGN KEY (`num_fournisseur`) REFERENCES `fournisseur` (`num_fournisseur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `fournir`
--
ALTER TABLE `fournir`
  ADD CONSTRAINT `fournir_ibfk_1` FOREIGN KEY (`id_prd`) REFERENCES `produit` (`id_prd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fournir_ibfk_2` FOREIGN KEY (`num_fournisseur`) REFERENCES `fournisseur` (`num_fournisseur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sortie_stock`
--
ALTER TABLE `sortie_stock`
  ADD CONSTRAINT `sortie_stock_ibfk_1` FOREIGN KEY (`id_prd`) REFERENCES `produit` (`id_prd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sortie_stock_ibfk_2` FOREIGN KEY (`id_facture`) REFERENCES `facture` (`id_facture`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
