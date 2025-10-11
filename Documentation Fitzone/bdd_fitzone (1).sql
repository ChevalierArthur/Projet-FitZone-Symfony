-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2025 at 01:00 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdd_fitzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_avis_id` int NOT NULL,
  `messageavis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8F91ABF06375870D` (`utilisateur_avis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`id`, `utilisateur_avis_id`, `messageavis`) VALUES
(1, 1, 'avis très constructif ici'),
(2, 2, 'avis peu constructif et pas amusant');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_contact_id` int NOT NULL,
  `message_contact` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `objet_contact` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4C62E638D519E75C` (`utilisateur_contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `utilisateur_contact_id`, `message_contact`, `objet_contact`) VALUES
(1, 1, 'je trouve que mon avis que j\'ai déposer est très constructif', 'avis constructif'),
(2, 2, 'je trouve que l\'avis de jack est très peu constructif personnellement', 'retour l\'avis peu constructif de richard');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250930083051', '2025-09-30 08:34:10', 178),
('DoctrineMigrations\\Version20250930083651', '2025-09-30 08:36:56', 80),
('DoctrineMigrations\\Version20250930083824', '2025-09-30 08:38:29', 144);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

DROP TABLE IF EXISTS `information`;
CREATE TABLE IF NOT EXISTS `information` (
  `id` int NOT NULL AUTO_INCREMENT,
  `text_accueil` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `text_accueil`) VALUES
(1, '                                    bonjour mon site est vraiment chouette mais pas que car j\'ecrit un texte vraiment long pour voir si mon bloc grandit en fonction de la taille du texte mais cela demande beaucoup de texte pour voir le changement alors j\'ecrit tout ce qui se passe mais je n\'ai plus beaucoup d\'idée mais je vient de revenir pour avoir plus d\'idée d\'exemple gjerjgiurd\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

DROP TABLE IF EXISTS `presentation`;
CREATE TABLE IF NOT EXISTS `presentation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `introduction` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `texte` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presentation`
--

INSERT INTO `presentation` (`id`, `introduction`, `texte`, `photo`) VALUES
(1, 'voici un exemple d\'introduction possible', 'le texte ici est très intéressant ', 'photo.png\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `prestation`
--

DROP TABLE IF EXISTS `prestation`;
CREATE TABLE IF NOT EXISTS `prestation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre_presta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_presta` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prestation`
--

INSERT INTO `prestation` (`id`, `titre_presta`, `description_presta`, `prix`) VALUES
(1, 'prestation cui cui', 'description de cette prestation vachement intéressant', 10),
(2, 'prestation ', 'decription de presta super intéressant vraiment faut payer la', 3);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifiant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `num_tel`, `identifiant`, `mot_de_passe`, `est_admin`) VALUES
(1, 'Pastel', 'Richard', 'RichardPastel@gmail.com', '06476288', 'richardP', 'TEST', 1),
(2, 'Boulon', 'Jack', 'JackBoulon@gmail.com', '06882255', 'BoulonJ', 'TEST', 0),
(3, 'chevalier', 'arthur', 'emailtest@fr', 'MDP', 'identifiant', 'MDP', 0),
(4, 'fezfezf', 'fzafazfz', 'eazeazeaz', 'azerty', 'azerty', 'azerty', 0),
(5, '123', '456', '789', 'TEST', 'TEST', 'TEST', 0),
(6, 'CHEVALIER', 'Arthur', 'informatique@stadjutor.com', '123', 'id', '$2y$13$XvVX0pKNRYgzsBVQcFlH..114O7Pl71wHog0HoWh8jz6ueAEmQNZq', 1),
(7, 'CHEVALIER', 'Arthur', 'informatique@stadjutor.com', '123', 'user', '$2y$13$hxAlAKxNZ.Mc0e2F6jiquu/ReD0tiVqSlvNs.N8Mq2zm4xH0f9nH2', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `FK_8F91ABF06375870D` FOREIGN KEY (`utilisateur_avis_id`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_4C62E638D519E75C` FOREIGN KEY (`utilisateur_contact_id`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
