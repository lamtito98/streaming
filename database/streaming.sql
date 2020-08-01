-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 01 août 2020 à 04:27
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `streaming`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Action & adventure'),
(2, 'Classic'),
(3, 'Comedies'),
(4, 'Dramas'),
(5, 'Horror'),
(6, 'Romantic'),
(7, 'Sci - Fi & Fantasy'),
(8, 'Sports'),
(9, 'Thrillers'),
(10, 'Documentaries'),
(12, 'Teen'),
(13, 'Children & family'),
(14, 'Anime'),
(15, 'Independent'),
(16, 'Foreign'),
(17, 'Music'),
(18, 'Christmas'),
(19, 'Others'),
(20, 'Cartoon');

-- --------------------------------------------------------

--
-- Structure de la table `entities`
--

CREATE TABLE `entities` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `entities_name` varchar(250) NOT NULL,
  `thumbnail` varchar(250) NOT NULL,
  `preview_video` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entities`
--

INSERT INTO `entities` (`id`, `category_id`, `entities_name`, `thumbnail`, `preview_video`) VALUES
(1, 3, 'Friends', 'entities/thumbnails/friends.jpg', 'entities/previews/1.mp4'),
(2, 20, 'The Simpsons', 'entities/thumbnails/thesimpsons.jpg', 'entities/previews/6.mp4'),
(3, 13, 'Toy Story', 'entities/thumbnails/toystory.jpg', 'entities/previews/1.mp4'),
(4, 3, 'Inbetweeners', 'entities/thumbnails/inbetw.jpg', 'entities/previews/2.mp4'),
(5, 4, 'Suits', 'entities/thumbnails/Suits.jpg', 'entities/previews/3.mp4'),
(6, 13, 'Captain Underpants', 'entities/thumbnails/cu.jpg', 'entities/previews/4.mp4'),
(7, 3, 'Brooklyn Nine-Nine', 'entities/thumbnails/bnn.jpg', 'entities/previews/5.mp4'),
(8, 3, 'That 70s Show', 'entities/thumbnails/tss.jpg', 'entities/previews/6.mp4'),
(9, 20, 'Pokemon', 'entities/thumbnails/pok.jpg', 'entities/previews/2.mp4');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwordd` varchar(255) NOT NULL,
  `sign_up_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_subscribe` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `passwordd`, `sign_up_date`, `is_subscribe`) VALUES
(1, 'Lamson', 'Estimond', 'Lamtito', 'lamsonestimond2@gmail.com', '123456', '2020-07-24 16:37:44', 0),
(3, 'Oralie', 'Nacius', 'Oralie2016', 'oralie@gmail.com', 'A09E45F3E62E2B328E69AF2BF6E2682548531BCD6736D476612D0A5E6A4683AF101BB05E21B1141EFAC8B2B9097F529E876836D579FEE7E456573FFB77B5BB5C', '2020-07-24 19:51:02', 0);

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `description_video` varchar(1000) NOT NULL,
  `file_path` varchar(250) NOT NULL,
  `is_movie` tinyint(1) NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `release_date` date NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `duration` varchar(10) NOT NULL,
  `season` int(11) DEFAULT '0',
  `episode` int(11) DEFAULT '0',
  `entity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description_video`, `file_path`, `is_movie`, `upload_date`, `release_date`, `views`, `duration`, `season`, `episode`, `entity_id`) VALUES
(1, 'Light in the Mage', 'Interdum nulla at quis phasellus ornare habitasse dictumst vehicula aliquet senectus. Dolor vestibulum luctus feugiat tincidunt facilisis nunc quisque', 'entities/videos/6.mp4', 0, '2019-10-12 22:07:53', '2006-02-10', 0, '47:13', 1, 1, 1),
(2, 'Some Sliver', 'Adipiscing id est porttitor vivamus nostra magna porta potenti accumsan eros. Sit nullam dictumst libero sociosqu accumsan sem. Interdum egestas apten', 'entities/videos/4.mp4', 0, '2019-10-12 22:07:53', '2002-12-09', 0, '41:46', 1, 2, 1),
(3, 'The Dreamer\'s Flame', 'Fusce et eu, at auctor hendrerit pharetra aptent himenaeos nisl. Placerat at ultrices habitasse rhoncus eros dignissim senectus. A vivamus fermentum p', 'entities/videos/6.mp4', 0, '2019-10-12 22:07:53', '2014-10-17', 0, '22:31', 1, 3, 1),
(4, 'Sliver in the Weeping', 'Dolor maecenas mauris massa et augue litora. Maecenas commodo donec potenti sodales sem. Malesuada tincidunt a integer nullam euismod pretium vulputat', 'entities/videos/6.mp4', 0, '2019-10-12 22:07:53', '2014-05-14', 0, '31:24', 1, 4, 1),
(5, 'The Female of the Twins', 'Interdum etiam finibus facilisis pulvinar venenatis pharetra class ad litora duis diam ullamcorper senectus cras. Non eleifend tempor nisi primis phar', 'entities/videos/4.mp4', 0, '2019-10-12 22:07:53', '2001-05-11', 0, '30:13', 1, 5, 1),
(6, 'Seventh Fire', 'Lacus tellus felis curae ornare euismod pretium inceptos sodales congue eros risus. Amet non nulla volutpat metus molestie urna tempus vivamus rhoncus', 'entities/videos/3.mp4', 0, '2019-10-12 22:07:53', '2002-07-19', 0, '28:47', 1, 6, 1),
(7, 'Sliver in the Weeping', 'Suspendisse eget curabitur sodales. Malesuada lobortis dui fermentum dignissim nisl, non sed a gravida. Dictum phasellus quam libero.', 'entities/videos/6.mp4', 0, '2019-10-12 22:07:53', '2007-06-03', 0, '39:26', 1, 7, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entities`
--
ALTER TABLE `entities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_entity_id` (`entity_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `entities`
--
ALTER TABLE `entities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `entities`
--
ALTER TABLE `entities`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `fk_entity_id` FOREIGN KEY (`entity_id`) REFERENCES `entities` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
