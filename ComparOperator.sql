-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 21 juin 2020 à 13:22
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `comparoperator`
--

-- --------------------------------------------------------

--
-- Structure de la table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(10) NOT NULL,
  `location` varchar(150) NOT NULL,
  `price` int(10) NOT NULL,
  `operator_id` int(10) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `destinations`
--

INSERT INTO `destinations` (`id`, `location`, `price`, `operator_id`, `img`, `description`) VALUES
(72, 'Los Angeles', 1500, 172, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(73, 'Paris', 500, 172, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(74, 'New York', 1200, 172, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(75, 'Rome', 750, 172, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(76, 'Berlin', 800, 173, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(77, 'Lisbonne', 450, 173, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(78, 'Prague', 599, 173, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(79, 'Barcelone', 999, 173, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(80, 'Paris', 300, 171, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(81, 'Prague', 420, 171, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(82, 'Berlin', 500, 171, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(83, 'Rome', 600, 171, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(84, 'Los Angeles', 1200, 174, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(85, 'Paris', 800, 174, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(86, 'New York', 1300, 174, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(87, 'Rome', 750, 174, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(88, 'Prague', 300, 175, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(89, 'Londres', 750, 175, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(90, 'Budapest', 700, 175, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(91, 'New York', 890, 175, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(92, 'Londres', 560, 176, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(93, 'Budapest', 600, 176, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(94, 'Prague', 299, 176, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(95, 'Los Angeles', 1200, 176, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');

-- --------------------------------------------------------

--
-- Structure de la table `operators`
--

CREATE TABLE `operators` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `rate` float DEFAULT '0',
  `link` varchar(255) NOT NULL,
  `is_premium` int(11) NOT NULL DEFAULT '0',
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `operators`
--

INSERT INTO `operators` (`id`, `name`, `rate`, `link`, `is_premium`, `logo`) VALUES
(171, 'Club Med', 0, 'https://www.clubmed.fr/', 1, '../assets/images/operators_logos/Club Med.jpg'),
(172, 'TUI', 0, 'https://www.tui.fr', 1, '../assets/images/operators_logos/TUI.jpg'),
(173, 'Thomas Cook', 0, 'https://www.thomascook.com/holidays', 0, '../assets/images/operators_logos/Thomas Cook.jpg'),
(174, 'Expédia', 0, 'https://www.expedia.fr/', 1, '../assets/images/operators_logos/Expédia.jpg'),
(175, 'Trivago', 0, 'https://www.trivago.fr/', 0, '../assets/images/operators_logos/Trivago.jpg'),
(176, 'Trip Advisor', 0, 'https://www.tripadvisor.fr/', 0, '../assets/images/operators_logos/Trip Advisor.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `author` varchar(150) NOT NULL,
  `operator_id` int(10) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `message`, `author`, `operator_id`, `ip_address`) VALUES
(13, 'Super agence! J\'ai pu profiter de mes tongues au soleil ! :)', 'Alexandre', 171, '127.0.0.1'),
(14, 'Un voyage merveilleux allant bien au delà de nos attentes pour notre voyage de noces. Un pays splendide rempli de couleurs, de paysage à couper le souffle, d\'une histoire riche et d\'une population souriante et accueillante.', 'Justine', 171, '127.0.0.1'),
(15, 'Merci pour cet incroyable et inoubliable voyage de 3 semaines à Rome ! Prix attractif ', 'Matt', 171, '127.0.0.1'),
(16, 'Agence organisee et disponible avant et durant le voyage. Merci ', 'Anto', 172, '127.0.0.1'),
(17, 'Ravis de notre séjour à Paris. Comme d habitude, tout était très bien : voyage, location de voiture. Hôtel fabuleux.\r\nMerci à toute l\'équipe de nous avoir organisé ce beau voyage', 'Jacques', 174, '127.0.0.1'),
(18, 'Comme d\'habitude super voyage et merveilleuses activités proposées !!!', 'Laetitia', 173, '127.0.0.1'),
(19, 'Organisation impeccable, hormis le retard du chauffeur à notre arrivée à l\'aéroport de Prague ...', 'Momo', 175, '127.0.0.1'),
(20, 'Découverte originale entre modernité et tradition dans un pays peu ouvert au tourisme. Guide francophone sur place offre un vrai plus.', 'Toto', 176, '127.0.0.1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_operator` (`operator_id`);

--
-- Index pour la table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tour_operator` (`operator_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT pour la table `operators`
--
ALTER TABLE `operators`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `fk_operator` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_tour_operator` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
