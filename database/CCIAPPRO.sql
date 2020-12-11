-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 11 déc. 2020 à 10:53
-- Version du serveur :  8.0.22-0ubuntu0.20.10.2
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `CCIAPPRO`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint UNSIGNED NOT NULL,
  `idCommande` int NOT NULL,
  `quantite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateCommande` date NOT NULL,
  `idProduit` bigint UNSIGNED NOT NULL,
  `idEtat` bigint UNSIGNED NOT NULL,
  `idUser` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `idCommande`, `quantite`, `dateCommande`, `idProduit`, `idEtat`, `idUser`, `created_at`, `updated_at`) VALUES
(57, 1, '1', '2020-12-06', 1, 3, 1, '2020-12-06 14:22:53', '2020-12-06 15:24:52'),
(58, 1, '1', '2020-12-06', 7, 3, 1, '2020-12-06 14:22:54', '2020-12-06 15:24:52'),
(59, 2, '1', '2020-12-06', 2, 3, 1, '2020-12-06 15:06:50', '2020-12-06 15:25:46'),
(60, 2, '1', '2020-12-06', 3, 3, 1, '2020-12-06 15:06:50', '2020-12-06 15:26:06'),
(61, 3, '1', '2020-12-06', 5, 3, 1, '2020-12-06 15:07:02', '2020-12-06 15:26:17'),
(62, 3, '1', '2020-12-06', 6, 3, 1, '2020-12-06 15:07:03', '2020-12-07 21:06:46'),
(63, 4, '1', '2020-12-06', 4, 3, 1, '2020-12-06 15:08:42', '2020-12-06 15:26:12'),
(64, 4, '1', '2020-12-06', 1, 2, 1, '2020-12-06 15:08:42', '2020-12-06 15:09:02'),
(65, 5, '1', '2020-12-06', 2, 4, 1, '2020-12-06 15:26:27', '2020-12-06 15:28:27'),
(66, 6, '1', '2020-12-07', 1, 2, 1, '2020-12-07 13:17:51', '2020-12-07 13:22:15'),
(67, 7, '1', '2020-12-07', 3, 2, 1, '2020-12-07 13:23:27', '2020-12-07 13:24:30'),
(68, 8, '1', '2020-12-07', 5, 2, 1, '2020-12-07 13:25:04', '2020-12-07 13:25:08'),
(69, 9, '1', '2020-12-07', 4, 2, 1, '2020-12-07 13:26:51', '2020-12-07 13:28:17'),
(70, 10, '1', '2020-12-07', 2, 2, 1, '2020-12-07 13:29:26', '2020-12-07 13:31:50'),
(71, 11, '1', '2020-12-07', 7, 4, 1, '2020-12-07 13:41:02', '2020-12-07 13:41:13'),
(72, 11, '1', '2020-12-07', 4, 4, 1, '2020-12-07 13:41:02', '2020-12-07 13:41:13');

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

CREATE TABLE `etats` (
  `idEtat` bigint UNSIGNED NOT NULL,
  `etat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`idEtat`, `etat`, `created_at`, `updated_at`) VALUES
(1, 'En attente de validation', NULL, NULL),
(2, 'En cours livraison', NULL, NULL),
(3, 'Livré', NULL, NULL),
(4, 'Refusé', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marque_produits`
--

CREATE TABLE `marque_produits` (
  `idMarqueProduit` bigint UNSIGNED NOT NULL,
  `marqueProduit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marque_produits`
--

INSERT INTO `marque_produits` (`idMarqueProduit`, `marqueProduit`, `created_at`, `updated_at`) VALUES
(1, 'UHU', NULL, NULL),
(2, 'MAPED', NULL, NULL),
(3, 'BIC', NULL, NULL),
(4, 'STABILO', NULL, NULL),
(5, 'SCOTCH', NULL, NULL),
(6, 'OXFORD', NULL, NULL),
(7, 'Commande spécifique', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Bonjour et bienvenue sur CCIAPPRO !', 1, '2020-12-11 10:51:22', '2020-12-11 10:51:22');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_07_131835_add_timestamps', 2),
(5, '2020_11_07_191846_create_marque_produits_table', 3),
(6, '2020_11_07_191911_create_type_produits_table', 3),
(7, '2020_11_07_192020_create_produits_table', 4),
(8, '2020_11_09_133709_create_etats_table', 5),
(9, '2020_11_09_134415_create_commandes_table', 5),
(10, '2020_12_07_211043_add_is_activ_produit', 6),
(11, '2020_12_11_090128_create_messages_table', 7);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `idProduit` bigint UNSIGNED NOT NULL,
  `nomProduit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descProduit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stockProduit` int NOT NULL,
  `imgProduit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idMarqueProduit` bigint UNSIGNED NOT NULL,
  `idTypeProduit` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idProduit`, `nomProduit`, `descProduit`, `stockProduit`, `imgProduit`, `idMarqueProduit`, `idTypeProduit`, `created_at`, `updated_at`, `isActive`) VALUES
(1, 'Baton de colle', 'Baton de colle pour papier', 10, './storage/shopimg/EdUWgDUbhCXWcJxSyJ7B3YivyyYKMXQwAbfsVYJn.png', 1, 1, NULL, '2020-12-11 07:59:20', 1),
(2, 'Ciseaux', 'Ciseaux pour découpe papier', 10, './img/ciseaux.png', 2, 2, NULL, '2020-12-07 21:25:15', 1),
(3, 'Ruban adhésif', 'Ruban ashésif fixation forte', 10, './img/scotch.png', 5, 5, NULL, '2020-12-06 16:17:35', 1),
(4, 'Colle liquide', 'Colle liquide fixation forte', 10, './img/colle2.png', 5, 1, NULL, '2020-12-06 16:17:37', 1),
(5, 'Règle', 'Règle de 30cm', 10, './img/regle.png', 2, 3, NULL, '2020-12-06 16:17:40', 1),
(6, 'Surligneurs', 'Surligneurs de couleur', 9, './img/fluo.png', 4, 4, NULL, '2020-12-07 21:06:46', 1),
(7, 'Cahier', 'Cahiers grands carreaux', 10, './img/cahier.png', 6, 6, NULL, NULL, 1),
(8, 'Commande spécifique', 'Pour commander un ou plusieurs articles non disponibles sur CCIAPPRO, veuillez contacter l\'administrateur depuis l\'interface de contact.', 1, './img/special.png', 7, 7, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_produits`
--

CREATE TABLE `type_produits` (
  `idTypeProduit` bigint UNSIGNED NOT NULL,
  `typeProduit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_produits`
--

INSERT INTO `type_produits` (`idTypeProduit`, `typeProduit`, `created_at`, `updated_at`) VALUES
(1, 'colle', NULL, NULL),
(2, 'ciseaux', NULL, NULL),
(3, 'regle', NULL, NULL),
(4, 'surligneur', NULL, NULL),
(5, 'ruban adhesif', NULL, NULL),
(6, 'cahier', NULL, NULL),
(7, 'Commande spécifique', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dptUser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `loginUser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `email`, `password`, `dptUser`, `loginUser`, `isAdmin`, `created_at`, `updated_at`) VALUES
(1, 'Grande', 'Vincent', 'vincent.grande@outlook.fr', '$2y$10$XAo9wgpsCinivOW2eoRSDOZ6cd9ldxtuuVH8wuAJ/sIpAhDf/Tj3q', 'comptabilite', 'VGRANDE', 1, '2020-11-07 19:38:17', '2020-11-26 21:00:17'),
(2, 'Haller', 'Antoine', 'antoine-haller@outlook.fr', '$2y$10$VQG01znDx6t0ud2lgQXzDuulEiuQVLgxPNVstNarZRyGLRS./T9bC', 'accueil', 'AHALLER', 0, '2020-11-07 19:44:20', '2020-11-27 08:21:30'),
(3, 'Golder', 'Lucas', 'cdf.golder.lucas@gmail.com', '$2y$10$Ed7tqIba8LHEsGpI1BLkOuttUG5xTgC1miI4/jLYHnNP0QkScweBS', 'comptabilite', 'LGOLDER', 0, '2020-11-11 16:17:33', '2020-11-11 16:17:33'),
(7, 'Test', 'Test', 'test@test.fr', '$2y$10$sRkQNRNHanrUC.xMCXKcdO13aXBZ6Qby0F.S6MS9IntmSjG0o2fOW', 'accueil', 'TTEST', 0, '2020-11-27 12:09:03', '2020-11-27 12:09:03'),
(8, 'Grande', 'Vincent', 'vincent.grande@free.fr', '$2y$10$2Ig4D8sp9M1nQ.iKhuE86uoevOD0Ifql3K9DCusBIu1aVQtdIAE5W', 'comptabilite', 'VGRANDE2', 0, '2020-11-27 13:38:14', '2020-11-27 13:38:14');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commandes_idproduit_foreign` (`idProduit`),
  ADD KEY `commandes_idetat_foreign` (`idEtat`),
  ADD KEY `commandes_iduser_foreign` (`idUser`);

--
-- Index pour la table `etats`
--
ALTER TABLE `etats`
  ADD PRIMARY KEY (`idEtat`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marque_produits`
--
ALTER TABLE `marque_produits`
  ADD PRIMARY KEY (`idMarqueProduit`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `produits_idmarqueproduit_foreign` (`idMarqueProduit`),
  ADD KEY `produits_idtypeproduit_foreign` (`idTypeProduit`);

--
-- Index pour la table `type_produits`
--
ALTER TABLE `type_produits`
  ADD PRIMARY KEY (`idTypeProduit`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `etats`
--
ALTER TABLE `etats`
  MODIFY `idEtat` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `marque_produits`
--
ALTER TABLE `marque_produits`
  MODIFY `idMarqueProduit` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `idProduit` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `type_produits`
--
ALTER TABLE `type_produits`
  MODIFY `idTypeProduit` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_idetat_foreign` FOREIGN KEY (`idEtat`) REFERENCES `etats` (`idEtat`),
  ADD CONSTRAINT `commandes_idproduit_foreign` FOREIGN KEY (`idProduit`) REFERENCES `produits` (`idProduit`),
  ADD CONSTRAINT `commandes_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_idmarqueproduit_foreign` FOREIGN KEY (`idMarqueProduit`) REFERENCES `marque_produits` (`idMarqueProduit`),
  ADD CONSTRAINT `produits_idtypeproduit_foreign` FOREIGN KEY (`idTypeProduit`) REFERENCES `type_produits` (`idTypeProduit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
