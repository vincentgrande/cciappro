-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 27 nov. 2020 à 14:20
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
  `quantite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateCommande` date NOT NULL,
  `idProduit` bigint UNSIGNED NOT NULL,
  `idEtat` bigint UNSIGNED NOT NULL,
  `idUser` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `idCommande`, `quantite`, `dateCommande`, `idProduit`, `idEtat`, `idUser`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '2020-11-09', 1, 1, 1, NULL, NULL),
(2, 1, '2', '2020-11-09', 2, 1, 1, NULL, NULL),
(3, 1, '3', '2020-11-09', 1, 3, 2, NULL, NULL),
(4, 2, '1', '2020-11-11', 1, 1, 1, '2020-11-11 15:02:47', '2020-11-11 15:02:47'),
(5, 2, '1', '2020-11-11', 2, 1, 1, '2020-11-11 15:02:47', '2020-11-11 15:02:47'),
(6, 2, '1', '2020-11-11', 3, 1, 1, '2020-11-11 15:02:48', '2020-11-11 15:02:48'),
(7, 2, '1', '2020-11-11', 4, 1, 1, '2020-11-11 15:02:48', '2020-11-11 15:02:48'),
(8, 2, '1', '2020-11-11', 5, 1, 1, '2020-11-11 15:02:49', '2020-11-11 15:02:49'),
(9, 2, '1', '2020-11-11', 6, 1, 1, '2020-11-11 15:02:49', '2020-11-11 15:02:49'),
(10, 2, '1', '2020-11-11', 7, 1, 1, '2020-11-11 15:02:49', '2020-11-11 15:02:49'),
(11, 3, '1', '2020-11-11', 2, 1, 2, '2020-11-11 15:05:48', '2020-11-11 15:05:48'),
(12, 3, '1', '2020-11-11', 3, 1, 2, '2020-11-11 15:05:48', '2020-11-11 15:05:48'),
(13, 4, '1', '2020-11-11', 4, 1, 1, '2020-11-11 15:55:44', '2020-11-11 15:55:44'),
(14, 4, '1', '2020-11-11', 7, 1, 1, '2020-11-11 15:55:44', '2020-11-11 15:55:44'),
(15, 5, '1', '2020-11-11', 4, 1, 1, '2020-11-11 15:56:42', '2020-11-11 15:56:42'),
(16, 5, '1', '2020-11-11', 7, 1, 1, '2020-11-11 15:56:42', '2020-11-11 15:56:42'),
(17, 6, '1', '2020-11-11', 4, 1, 1, '2020-11-11 15:57:02', '2020-11-11 15:57:02'),
(18, 6, '1', '2020-11-11', 7, 1, 1, '2020-11-11 15:57:03', '2020-11-11 15:57:03'),
(19, 7, '1', '2020-11-11', 4, 1, 1, '2020-11-11 15:58:10', '2020-11-11 15:58:10'),
(20, 7, '1', '2020-11-11', 7, 1, 1, '2020-11-11 15:58:11', '2020-11-11 15:58:11'),
(21, 8, '1', '2020-11-11', 4, 1, 1, '2020-11-11 15:59:15', '2020-11-11 15:59:15'),
(22, 8, '1', '2020-11-11', 7, 1, 1, '2020-11-11 15:59:15', '2020-11-11 15:59:15'),
(23, 9, '1', '2020-11-11', 2, 1, 1, '2020-11-11 16:04:36', '2020-11-11 16:04:36'),
(24, 10, '1', '2020-11-11', 1, 1, 1, '2020-11-11 16:05:45', '2020-11-11 16:05:45'),
(25, 11, '1', '2020-11-11', 3, 1, 1, '2020-11-11 16:07:07', '2020-11-11 16:07:07'),
(26, 12, '1', '2020-11-11', 5, 1, 1, '2020-11-11 16:08:17', '2020-11-11 16:08:17'),
(27, 13, '1', '2020-11-11', 1, 1, 1, '2020-11-11 16:15:20', '2020-11-11 16:15:20'),
(28, 13, '1', '2020-11-11', 2, 1, 1, '2020-11-11 16:15:20', '2020-11-11 16:15:20'),
(29, 13, '1', '2020-11-11', 3, 1, 1, '2020-11-11 16:15:21', '2020-11-11 16:15:21'),
(30, 13, '2', '2020-11-11', 4, 1, 1, '2020-11-11 16:15:21', '2020-11-11 16:15:21'),
(31, 13, '1', '2020-11-11', 5, 1, 1, '2020-11-11 16:15:22', '2020-11-11 16:15:22'),
(32, 13, '1', '2020-11-11', 6, 1, 1, '2020-11-11 16:15:22', '2020-11-11 16:15:22'),
(33, 13, '5', '2020-11-11', 7, 1, 1, '2020-11-11 16:15:22', '2020-11-11 16:15:22'),
(34, 14, '1', '2020-11-11', 3, 1, 3, '2020-11-11 16:18:03', '2020-11-11 16:18:03'),
(35, 14, '1', '2020-11-11', 2, 1, 3, '2020-11-11 16:18:04', '2020-11-11 16:18:04'),
(36, 14, '1', '2020-11-11', 5, 1, 3, '2020-11-11 16:18:04', '2020-11-11 16:18:04'),
(37, 15, '1', '2020-11-11', 7, 1, 2, '2020-11-11 16:19:22', '2020-11-11 16:19:22'),
(38, 15, '1', '2020-11-11', 4, 1, 2, '2020-11-11 16:19:22', '2020-11-11 16:19:22'),
(39, 16, '1', '2020-11-11', 2, 1, 1, '2020-11-11 17:50:46', '2020-11-11 17:50:46'),
(40, 16, '1', '2020-11-11', 3, 1, 1, '2020-11-11 17:50:46', '2020-11-11 17:50:46'),
(41, 17, '3', '2020-11-27', 2, 1, 1, '2020-11-27 09:50:26', '2020-11-27 09:50:26'),
(42, 17, '2', '2020-11-27', 1, 1, 1, '2020-11-27 09:50:27', '2020-11-27 09:50:27'),
(43, 18, '1', '2020-11-27', 2, 1, 7, '2020-11-27 12:09:19', '2020-11-27 12:09:19'),
(44, 18, '1', '2020-11-27', 1, 1, 7, '2020-11-27 12:09:20', '2020-11-27 12:09:20'),
(45, 19, '1', '2020-11-27', 6, 1, 7, '2020-11-27 12:09:29', '2020-11-27 12:09:29'),
(46, 19, '1', '2020-11-27', 7, 1, 7, '2020-11-27 12:09:30', '2020-11-27 12:09:30'),
(47, 20, '1', '2020-11-27', 5, 1, 7, '2020-11-27 12:24:11', '2020-11-27 12:24:11'),
(48, 20, '1', '2020-11-27', 2, 1, 7, '2020-11-27 12:24:12', '2020-11-27 12:24:12'),
(49, 20, '1', '2020-11-27', 3, 3, 7, '2020-11-27 12:24:12', '2020-11-27 12:24:12'),
(50, 21, '1', '2020-11-27', 1, 4, 7, '2020-11-27 12:38:56', '2020-11-27 12:38:56'),
(51, 21, '1', '2020-11-27', 2, 1, 7, '2020-11-27 12:38:56', '2020-11-27 12:38:56'),
(52, 21, '1', '2020-11-27', 3, 1, 7, '2020-11-27 12:38:56', '2020-11-27 12:38:56'),
(53, 21, '1', '2020-11-27', 4, 1, 7, '2020-11-27 12:38:56', '2020-11-27 12:38:56'),
(54, 21, '1', '2020-11-27', 5, 1, 7, '2020-11-27 12:38:57', '2020-11-27 12:38:57'),
(55, 21, '1', '2020-11-27', 6, 1, 7, '2020-11-27 12:38:58', '2020-11-27 12:38:58'),
(56, 21, '2', '2020-11-27', 7, 1, 7, '2020-11-27 12:38:58', '2020-11-27 12:38:58');

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

CREATE TABLE `etats` (
  `idEtat` bigint UNSIGNED NOT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marque_produits`
--

CREATE TABLE `marque_produits` (
  `idMarqueProduit` bigint UNSIGNED NOT NULL,
  `marqueProduit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(6, 'OXFORD', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(9, '2020_11_09_134415_create_commandes_table', 5);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `idProduit` bigint UNSIGNED NOT NULL,
  `nomProduit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descProduit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stockProduit` int NOT NULL,
  `imgProduit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idMarqueProduit` bigint UNSIGNED NOT NULL,
  `idTypeProduit` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idProduit`, `nomProduit`, `descProduit`, `stockProduit`, `imgProduit`, `idMarqueProduit`, `idTypeProduit`, `created_at`, `updated_at`) VALUES
(1, 'Baton de colle', 'Baton de colle pour papier', 10, './img/colle.png', 1, 1, NULL, NULL),
(2, 'Ciseaux', 'Ciseaux pour découpe papier', 10, './img/ciseaux.png', 2, 2, NULL, NULL),
(3, 'Ruban adhésif', 'Ruban ashésif fixation forte', 10, './img/scotch.png', 5, 5, NULL, NULL),
(4, 'Colle liquide', 'Colle liquide fixation forte', 10, './img/colle2.png', 5, 1, NULL, NULL),
(5, 'Règle', 'Règle de 30cm', 10, './img/regle.png', 2, 3, NULL, NULL),
(6, 'Surligneurs', 'Surligneurs de couleur', 10, './img/fluo.png', 4, 4, NULL, NULL),
(7, 'Cahier', 'Cahiers grands carreaux', 10, './img/cahier.png', 6, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_produits`
--

CREATE TABLE `type_produits` (
  `idTypeProduit` bigint UNSIGNED NOT NULL,
  `typeProduit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(6, 'cahier', NULL, NULL);

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
  `isAdmin` tinyint(1) DEFAULT NULL,
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
(7, 'Test', 'Test', 'test@test.fr', '$2y$10$sRkQNRNHanrUC.xMCXKcdO13aXBZ6Qby0F.S6MS9IntmSjG0o2fOW', 'accueil', 'TTEST', NULL, '2020-11-27 12:09:03', '2020-11-27 12:09:03'),
(8, 'Grande', 'Vincent', 'vincent.grande@free.fr', '$2y$10$2Ig4D8sp9M1nQ.iKhuE86uoevOD0Ifql3K9DCusBIu1aVQtdIAE5W', 'comptabilite', 'VGRANDE2', NULL, '2020-11-27 13:38:14', '2020-11-27 13:38:14');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
  MODIFY `idMarqueProduit` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `idProduit` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `type_produits`
--
ALTER TABLE `type_produits`
  MODIFY `idTypeProduit` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
