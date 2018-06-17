-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2015 at 02:26 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bd1`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `isbn` char(14) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `serie` varchar(20) DEFAULT NULL,
  `scenariste` varchar(20) DEFAULT NULL,
  `dessinateur` varchar(20) DEFAULT NULL,
  `coloriste` varchar(20) DEFAULT NULL,
  `editeur` varchar(20) NOT NULL,
  `pays` char(1) DEFAULT NULL,
  `annee_edition` int(11) DEFAULT NULL,
  `prix` double NOT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`isbn`, `titre`, `serie`, `scenariste`, `dessinateur`, `coloriste`, `editeur`, `pays`, `annee_edition`, `prix`) VALUES
('2-152-12345-X', 'Les aventures complètes d''Oumpah-Pah', 'oumpah pah', 'Goscinny', 'Uderzo', NULL, 'Le Lombard', 'b', 1979, 12),
('2-203-00103-8', 'Les Cigares du Pharaon', 'Tintin', 'Hergé', 'Hergé', 'Hergé', 'Casterman', 'b', 1955, 8),
('2-203-00105-4', 'L''Oreille Cassée', 'Tintin', 'Hergé', 'Hergé', 'Hergé', 'Casterman', 'b', 1979, 8),
('2-203-00107-0', 'Le Sceptre d''Ottokar', 'Tintin', 'Hergé', 'Hergé', 'Hergé', 'Casterman', 'b', 1947, 8),
('2-203-00109-0', 'Coke en Stock', 'Tintin', 'Hergé', 'Hergé', 'Hergé', 'Casterman', 'b', 1958, 8),
('2-203-00117-8', 'L''Affaire Tournesol', 'Tintin', 'Hergé', 'Hergé', 'Hergé', 'Casterman', 'b', 1956, 8),
('2-203-00123-2', 'Tintin et les Picaros', 'Tintin', 'Hergé', 'Hergé', 'Hergé', 'Casterman', 'b', 1976, 8),
('2-203-12345-6', 'Vol 714 pour Sydney', 'Tintin', 'Hergé', 'Hergé', 'Hergé', 'Casterman', 'b', 1968, 8),
('2-205-00096-9', 'Astérix le gaulois', 'Astérix', 'Goscinny', 'Uderzo', NULL, 'Dargaud', 'f', 1975, 6),
('2-205-00230-9', 'Astérix légionnaire', 'Astérix', 'Goscinny', 'Uderzo', NULL, 'Dargaud', 'f', 1976, 6),
('2-205-00517-0', 'Canyon Apache', 'Lucky Luke', 'Goscinny', 'Morris', NULL, 'Dargaud', 'f', 1975, 8),
('2-205-00585-5', 'Ma Dalton', 'Lucky Luke', 'Goscinny', 'Morris', NULL, 'Dargaud', 'f', 1980, 5),
('2-205-00600-2', 'Les lauriers de César', 'Astérix', 'Goscinny', 'Uderzo', NULL, 'Dargaud', 'f', 1978, 6),
('2-205-00920-6', 'La guérison des Dalton', 'Lucky Luke', 'Goscinny', 'Morris', NULL, 'Dargaud', 'f', 1978, 5),
('2-205-00921-4', 'Obélix et compagnie', 'Astérix', 'Goscinny', 'Uderzo', NULL, 'Le Lombard', 'b', 1976, 6),
('2-205-01144-8', 'Le Fil qui chante', 'Lucky Luke', 'Goscinny', 'Morris', NULL, 'Dargaud', 'f', 1977, 5),
('2-205-01150-2', 'Astérix chez les Belges', 'Astérix', 'Goscinny', 'Uderzo', 'Uderzo', 'Dargaud', 'f', 1979, 4),
('2-205-03043-4', 'La fiancée de Lucky Luke', 'Lucky Luke', 'Guy Vidal', 'Morris', NULL, 'Dargaud', 'f', 1985, 5),
('2-258-03431-0', 'Adieu Monde Cruel!', 'Calvin et Hobbes', NULL, NULL, NULL, 'Watterson', 'a', 1991, 9),
('2-8001-0015-X', 'Le voyageur du mésozoïque', 'Spirou', NULL, 'Franquin', NULL, 'Dupuis', 'b', 1977, 7),
('2-8001-0017-6', 'Z comme Zorglub', 'Spirou', NULL, 'Franquin', NULL, 'Dupuis', 'b', 1977, 7),
('2-8001-0018-4', 'L''ombre du Z', 'Spirou', 'Jidehem', 'Franquin', NULL, 'Dupuis', 'b', 1976, 7),
('2-8001-0019-2', 'Spirou et les hommes-bulles', 'Spirou', 'Franquin', 'Franquin', NULL, 'Dupuis', 'b', 1989, 7),
('2-8001-0091-5', 'LE CAS LAGAFFE', 'Gaston', NULL, 'Franquin', NULL, 'Dupuis', 'b', 1977, 6),
('2-8001-0955-6', 'LA SAGA DES GAFFES', 'Gaston', 'Franquin', 'Franquin', NULL, 'Dupuis', 'b', 1982, 6),
('2-8001-2900-x', 'Zeke raconte des histoires', NULL, 'Cosey', 'Cosey', 'Cosey', 'Dupuis', 'b', 1999, 14),
('2-8021-3900-x', 'Spirou et Fantasio à Tokyo', 'Dupuis', NULL, 'Benoît', NULL, 'Dargaud', 'f', 2001, 14),
('2-8031-3900-6', 'Une dernière aventure d''Astérix', 'Astérix', NULL, 'Dupuis', NULL, 'Dargaud', 'f', 2006, 14),
('2-8035-0029-9', 'Modeste et Pompon', 'Modeste', NULL, 'Franquin', NULL, 'Magic Strip', 'b', 1981, 12),
('2-86497-004-X', 'L''odyssée d''Astérix', 'Astérix', 'Uderzo', 'Uderzo', NULL, 'Albert René', 'f', 1981, 6),
('2-86497-020-1', 'Astérix chez Rahazade', 'Astérix', 'Uderzo', 'Uderzo', NULL, 'Albert René', 'f', 1987, 6),
('2-87097-002-1', 'Le Secret de l''Espadon tome 1', 'Blake et Mortimer', 'Jacobs', 'Jacobs', NULL, 'Blake et Mortimer', 'b', 1984, 9),
('2-87097-004-8', 'Le Secret de L''Espadon tome 2', 'Blake et Mortimer', 'Jacobs', 'Jacobs', NULL, 'Blake et Mortimer', 'b', 1985, 9),
('2-87097-005-6', 'Le Secret de L''Espadon tome 3', 'Blake et Mortimer', 'Jacobs', 'Jacobs', NULL, 'Blake et Mortimer', 'b', 1986, 9),
('2-87097-008-0', 'Le mystère de la grande pyramide', 'Blake et Mortimer', 'Jacobs', 'Jacobs', NULL, 'Blake et Mortimer', 'b', 1986, 10),
('2-87097-009-9', 'Le mystère de la grande pyramide', 'Blake et Mortimer', 'Jacobs', 'Jacobs', NULL, 'Blake et Mortimer', 'b', 1987, 10),
('2-87097-010-2', 'La marque jaune', 'Blake et Mortimer', 'Jacobs', 'Jacobs', NULL, 'Blake et Mortimer', 'b', 1987, 9),
('2-87097-017-X', 'Les 3 Formules du Professeur Sato', 'Blake et Mortimer', 'Jacobs', 'de Moor', 'de Moor', 'Blake et Mortimer', 'b', 1990, 12),
('2-87097-043-9', 'L''Affaire Françis Blake', 'Blake et Mortimer', 'Benoît', 'Van Hamme', NULL, 'Blake et Mortimer', 'b', 1996, 14),
('2-87097-052-8', 'La Machination Voronov', 'Blake et Mortimer', 'Sente', 'Juilliard', 'DeMille', 'Blake et Mortimer', 'b', 2000, 14),
('2-87097-055-9', 'Joyeux Noël, May', NULL, 'Cosey', 'Cosey', 'Cosey', 'Dupuis', 'b', 1998, 7),
('2-88257-000-4', 'Nitroglycérine', 'Lucky Luke', 'Guy Vidal', 'Morris', NULL, 'Dargaud', 'f', 1987, 5),
('2-895-000123', 'Idées Noires', NULL, NULL, 'Franquin', NULL, 'Fluide Glacial', 'f', 1981, 10),
('2-908-46271-0', 'FAITES GAFFE A LAGAFFE', 'Gaston', 'Franquin', 'Franquin', 'Fanny', 'Dupuis', 'b', 1996, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
