-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 10 nov. 2022 à 11:22
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `users`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) UNSIGNED NOT NULL,
  `matricule` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `roles` varchar(50) NOT NULL,
  `mot_de_passe` varchar(250) NOT NULL,
  `photo` longblob DEFAULT NULL,
  `archive` int(11) NOT NULL DEFAULT 0,
  `dateInscription` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dateModif` timestamp NULL DEFAULT NULL,
  `dateArchive` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `matricule`, `prenom`, `nom`, `email`, `roles`, `mot_de_passe`, `photo`, `archive`, `dateInscription`, `dateModif`, `dateArchive`) VALUES
(19, '2022-19-USR', 'Idy', 'Camara', 'sen.elecplomb2019@gmail.com', 'User', '$2y$10$bdAWT8kiorwLrJ8h8XEJ1u8yFVo/b2sD2P16OvB50gbhcifcGSU66', NULL, 0, '2022-11-10 10:08:27', '2022-11-10 00:00:00', '2022-11-02 00:00:00'),
(20, '2022-20-USR', 'gonzé', 'hann', 'gonar90@gmail.com', 'User', '$2y$10$ut4lRdD7OGTNVi9MH35hEOkkh1LR7r/c./HAgjAOFNyJcR.FFv9Je', NULL, 0, '2022-11-10 09:54:50', '2022-11-10 00:00:00', '2022-11-02 00:00:00'),
(21, '2022-21-USR', 'oumy', 'touré', 'toureoumy12@gmail.com', 'Admin', '$2y$10$.LJ2LeB5SDHS43wQbsJ9I.qirWa4iweTk4tHfKBMC8sAYpdid4l6u', NULL, 0, '2022-11-06 18:18:55', '2022-11-02 00:00:00', '2022-11-03 00:00:00'),
(22, '2022-22-USR', 'Mohamadou', 'Fall', 'fallphilo910@gmail.com', 'Admin', '$2y$10$zOGB406SGajud4eAqu1b0u4NgmKhaLkAI3UvqiugUWtn1ndUNdG4G', NULL, 0, '2022-11-06 23:24:54', '2022-11-07 00:00:00', '2022-11-03 00:00:00'),
(23, '2022-23-USR', 'Cheikh', 'Ngom', 'cheikhsall12@gmail.com', 'Admin', '$2y$10$um/MMwHlbyUujf.k0hB4uOXBWxEb.sUfWnQ0OVMDYI6NNBCgrsSe6', NULL, 0, '2022-11-06 18:21:41', '2022-11-02 00:00:00', '2022-11-03 00:00:00'),
(24, '2022-24-USR', 'samba', 'Samb', 'sambaka@gmail.com', 'User', '$2y$10$b07vvV9eDg9Jy2SU7TQ3tuoSOfgIiWV6d8LQe4zBy6hy0YdWf.zBa', NULL, 0, '2022-11-07 13:38:35', '2022-11-02 00:00:00', '2022-11-06 00:00:00'),
(25, '2022-25-USR', 'Aliou', 'Samb', 'itiosow@gmail.com', 'User', '$2y$10$BX.P6u3w7IzDspqWnp2vjObaSWbH/kiw7SQe3lsee41Gy5YwnZHdO', NULL, 0, '2022-11-03 19:57:17', '2022-11-03 00:00:00', NULL),
(26, '2022-26-USR', 'Khadim', 'Fall', 'khadimfall@gmail.com', 'User', '$2y$10$v8UD3HzHR64KYc43MWdtmOD9J0oNkaODldch6v3wLzEt1GqUG270G', NULL, 0, '2022-10-31 14:00:40', NULL, '2022-10-31 00:00:00'),
(27, '2022-27-USR', 'Baye', 'Fall', 'baye@gmail.com', 'User', '$2y$10$dApTtvEV6TaNRiYNGYshT.LsQ8bqmZV9NtUJNewcnQ4XBD.6kPlI6', NULL, 0, '2022-11-07 13:38:42', '2022-11-05 00:00:00', '2022-11-06 00:00:00'),
(28, '2022-28-USR', 'Adama', 'Ngom', 'adama99@gmail.com', 'User', '$2y$10$mvFqTXWxEX4f/MBAeAQZ3upKl38x4Ff/BnzNUkCuHWC9lcPZinTVa', NULL, 0, '2022-11-07 13:38:52', '2022-11-06 00:00:00', '2022-11-06 00:00:00'),
(29, '2022-29-USR', 'Fatou', 'Fall', 'fatou@gmail.com', 'User', '$2y$10$..1fRsXeSQZuzMKsq0AB7eabOE.KYIM5GbxVf/gfE6aexwPZFNxwm', NULL, 0, '2022-11-07 13:39:12', NULL, '2022-11-06 00:00:00'),
(30, '2022-30-USR', 'Khadim', 'Fall', 'fallp.hilo91@gmail.com', 'User', '$2y$10$TRxuqrHMR5Jh2pEsqVm1Xuhg1KowwtBpOrm7fACG90/7JGr3a2GgW', NULL, 1, '2022-11-06 18:24:20', '2022-11-03 00:00:00', '2022-11-06 00:00:00'),
(31, '2022-31-USR', 'Mohamadou', 'Fall', 'fal.lph.ilo91@gmail.com', 'Admin', '$2y$10$Q7SPchHMbu1.ax5owJ/JpeIFCKI9JaWuSUTJSH48Y/qrH4jnlAIru', NULL, 1, '2022-11-06 18:23:34', NULL, '2022-11-06 00:00:00'),
(32, '2022-32-USR', 'Moustapha', 'Fall', 'fal-lph_ilo91@gmail.com', 'User', '$2y$10$/OzXsdpg1Wfo2.r0Mvh9vOciDxV7g/NsHT79wOSQ.9wprr1Z/8fP.', NULL, 1, '2022-11-06 18:23:42', '2022-11-03 00:00:00', '2022-11-06 00:00:00'),
(34, '2022-34-USR', 'Mohamadou', 'Fall', 'fallphilo911@gmail.com', 'Admin', '$2y$10$LGaJQvYMv31w/WKkVHIoRufhp3BhrwLq83H5Bd/2zrJWlUytW7goy', NULL, 0, '2022-11-06 23:42:14', '2022-11-07 00:00:00', NULL),
(35, '2022-35-USR', 'Mohamadou', 'Fall', 'fallphilo912@gmail.com', 'User', '$2y$10$S/j5eNTlfPg61S13sRwmruGr3USxj2SmgRz76twqf6UxvFMdEYiBG', NULL, 0, '2022-11-08 23:47:35', '2022-11-09 00:00:00', NULL),
(36, '2022-36-USR', 'Mohamadou', 'Fall', 'fallphilo914@gmail.com', 'Admin', '$2y$10$a2weCjuZ7GeJgCPYzPmcz.ZsUSk/6zZOKjPPLLF5oQ8R9ua73s34y', '', 0, '2022-11-07 20:29:22', NULL, NULL),


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
