-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 30 oct. 2020 à 18:43
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


-- --------------------------------------------------------

--
-- Structure de la table `users`
--
DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dptUser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `loginUser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `email`, `password`, `dptUser`, `loginUser`, `isAdmin`) VALUES
(1, 'vincent', '', 'vincent@lol.fr', '$2y$10$yNfNcuLHrqJ7ALurEK2SReldqRNmiSW0Pxxktt.6FbODPB1nf61Mi', '', 'VINCENT', 0),
(2, 'grande', 'Vincent', 'vincent@bg.fr', '$2y$10$AF/RLJQIVX5eGKkqW7fE2uPYCPQUm/wTKD26xf7lC3qSTKyOywfHW', '', '', 0),
(3, 'GRANDE', 'Vincent', 'vincent.grande@outlook.fr', '$2y$10$F8AZexflwV3aYKmmmlrFOuLI9t7VJIz.He.EdpOm5hBsH18PEeS/2', 'accueil', 'VGRANDE', 1),
(5, 'Haller', 'Antoine', 'antoine@bg.fr', '$2y$10$ftKaBuzaV.CPPqq5.aXIIOMksY.wnN0sCy6HKmXm/w/dcFPGOOeni', 'comptabilite', 'AHALLER', 1),
(6, 'Golder', 'Lucas', 'cdf.golder.lucas@gmail.com', '$2y$10$C3wFm8Nw/TQojXFYrP/h3.bd4E3opFolKfu4cXUIBYXdiavUl8sSO', 'accueil', 'LGOLDER', 1);

--
-- Index pour les tables déchargées
--

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
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
