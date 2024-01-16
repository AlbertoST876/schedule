CREATE DATABASE `es_schedule`;
USE `es_schedule`;

----------------------------------------------------------

CREATE TABLE `categories` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(20) NOT NULL
);

CREATE TABLE `events` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user` int NOT NULL,
  `category` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `lastEdition` datetime DEFAULT NULL,
  `registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `users` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lastAccess` datetime DEFAULT NULL,
  `registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

----------------------------------------------------------

INSERT INTO `categories` (`name`) VALUES
('Nota'),
('Tarea'),
('Evento'),
('Recordatorio');

----------------------------------------------------------

ALTER TABLE `events` 
  ADD CONSTRAINT `fk_events_category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_events_user` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
