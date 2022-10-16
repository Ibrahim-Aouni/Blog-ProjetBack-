-- Adminer 4.8.1 MySQL 5.5.5-10.9.3-MariaDB-1:10.9.3+maria~ubu2204 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(3,	'boubou',	'bobo2@gmail.com',	'$2y$10$VSUwiDUu/wMMXULVCKiQB.AKVnVTqFKI.B8BU4LSgqqVWgnrCR4Rm'),
(11,	'boubo',	'bobo@gmail.com',	'$2y$10$UMNIORiu26IftihNZetGFuKpizDPyeSD2eXrCdqKAhawfzR0Ep4pq'),
(14,	'boub',	'bobopol@gmail.com',	'$2y$10$KVY1SCDwmtgkuf7EvbYjxux9QYmyAx2GCbnd/QoQpK3RWM9CaeJm.');

-- 2022-10-16 16:44:10